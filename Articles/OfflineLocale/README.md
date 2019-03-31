---
Title: NexmoInsight  
Author: Edward Barnard  
Base Header Level: 2  
Copyright: Copyright 2019, Edward Barnard. All rights reserved.
---

# How to Offload Your Nexmo Number Insights in PHP #

> The abstract.

Today we're going to learn a powerful technique for scaling-out your web application. We'll use Nexmo's [Number Insight API](https://developer.nexmo.com/number-insight/overview) for obtaining locale-specific information. Once that's in place, we'll use CloudAMQP's [RabbitMQ as a Service](https://www.cloudamqp.com/) to move our requests offline. We'll be using no-cost services.

This tutorial uses PHP and the [CakePHP](https://cakephp.org/) framework. However, the techniques we're using here apply to any language supported by both Nexmo and RabbitMQ. This project's source code is available on GitHub at [ewbarnard/NexmoInsight](https://github.com/ewbarnard/NexmoInsight).

As your applications grow, this method of offline processing can reduce your server costs. It's the front-facing (user-facing or mobile-app-facing) web servers which tend to be the most expensive. It's this "front line" which has the most effort needed for firewalls, security patches, and so on. It's these servers which need the excess capacity for possible traffic spikes.

When we offload some of that work to a smaller local server inside the firewall, this allows our front-facing servers to be more responsive, thus providing a better user experience. The situation becomes particularly apparent during traffic spikes. The heavier traffic load generally means a heavier load on databases, third-party services, and so on. A "snowball effect" can occur as more requests get backed up. The more work we're able to offload to begin with, the lower the risk of degraded service due to increased traffic.

What's a good candidate for offloading? On a user-facing (or mobile-app-facing) web site, anything the user expects to see immediately is not a good candidate for offloading. When we purchase something online, for example, we expect to see some sort of confirmation. When we post something on social media, we expect to see that post immediately---or at least confirmation that it's being processed.

On the other hand, anything our user does not immediately expect could possibly be deferred for offline processing. Take the example of sending a text message via the Nexmo [SMS API](https://developer.nexmo.com/messaging/sms/overview). We would likely want to send the message immediately and confirm to our user that the message was successfully sent. However, suppose that we also want to log the Nexmo Message ID, time it was sent, and cost of sending. That sort of statistics-gathering can be moved offline.

There are a couple of more-subtle reasons for considering moving some processing offline.

The first is a separation of concerns. Web applications (and web services supporting mobile apps) are designed to be responsive to the user. These incidental processes, such as logging message statistics or gathering up-to-date locale information, are important to the web application but not important to the user. [Conway's Law](https://en.wikipedia.org/wiki/Conway%27s_law) applies here: It's likely the marketing department that requests changes to the user-facing web page, but the data scientist who requests changes to what's logged. Our code has a better chance of remaining clean when we keep these concerns physically separated in our code base.

The other reason is database congestion. This is the most difficult reason I've seen in practice. That is, the result is the most dramatic. As traffic builds, pressure on the "master" database builds regardless of how many read replicas are in use. The web site sees more and more "back pressure" from the master database. Slightly-slow queries become blockers, creating a snowball effect. In one particular case we realized that we were writing a lot of statistics to the master database, never to be seen by any site user. We moved the statistics out of the master database entirely. That by itself relieved our back-pressure situation.

So much for theory. Let's write some code.

## Before You Begin ##

This PHP project uses composer to manage its dependencies (packages). You will need:

* A Nexmo API key and secret. Sign up for free here: <https://dashboard.nexmo.com/sign-up>
* Composer. Get it here: <https://getcomposer.org/>
* We will use the CakePHP framework. Learn about it here: <https://cakephp.org/>
* A CloudAMQP account. Sign up for free here: <https://www.cloudamqp.com/>. We will walk through signup and configuration as part of this tutorial.
* Lorna Mitchell's tutorial [How to Use the Number Insight API with PHP](https://www.nexmo.com/blog/2019/03/29/how-to-use-number-insight-with-php-dr/) shows far more usage detail. We'll be building off of her insight.
* This project on GitHub [ewbarnard/NexmoInsight](https://github.com/ewbarnard/NexmoInsight). You're welcome to fork, download, or clone to your local development environment. However, this tutorial walks you through building your own project from scratch.

## Database Tables ##

Create two tables for our demo application. See the next listing.

	~~~~sql
	SET NAMES utf8mb4;
	SET FOREIGN_KEY_CHECKS = 0;

	CREATE TABLE `contacts` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `name` varchar(255) NOT NULL DEFAULT '',
	  `email` varchar(255) NOT NULL DEFAULT '',
	  `phone` varchar(255) NOT NULL DEFAULT '',
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

	CREATE TABLE `formattings` (
	  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `contact_id` int(10) unsigned NOT NULL DEFAULT '0',
	  `intl_format_number` varchar(255) NOT NULL DEFAULT '',
	  `natl_format_number` varchar(255) NOT NULL DEFAULT '',
	  `country_code` varchar(16) NOT NULL DEFAULT '',
	  `country_code_iso3` char(3) NOT NULL DEFAULT '',
	  `country_name` varchar(255) NOT NULL DEFAULT '',
	  `country_prefix` varchar(16) NOT NULL DEFAULT '',
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

	SET FOREIGN_KEY_CHECKS = 1;
	~~~~

