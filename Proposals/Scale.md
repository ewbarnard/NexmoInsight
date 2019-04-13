# First Proposal

## Tutorial Title

_Preparing to Scale: How to Offload Your Nexmo Number Insights in PHP_

## Tutorial Abstract

> Typos happen. In this tutorial we validate user-entered phone numbers using the Nexmo
> Number Insights API from our PHP web application. Once that's in place, we'll use CloudAMQP's
> RabbitMQ as a Service to move our requests offline. We'll learn this powerful technique for
> scaling-out a web application. We'll see how Conway's Law informs our decisions as we separate
> user-facing web functionality from offline API use.

## About the App

The app is a simple PHP/MySQL website allowing us to create "user" records including a phone number.
We use the Nexmo Insights API to format and validate the supplied phone number. During the tutorial
we separate the Nexmo requests/responses from the website to run offline. We use the Producer/Consumer
programming pattern, passing messages via RabbitMQ.

## Target Audience

Software developers with 

 - Intermediate or advanced knowledge of PHP
 - Basic knowledge of MySQL and MySQL table design
 
Basic familiarity with the CakePHP framework is helpful but not required.

## Learning Objectives

Readers of the tutorial can learn:

 - How to use the Nexmo Number Insights API in PHP
 - That the Nexmo Number Insights API has three levels (basic, standard, advanced)
 - The Producer/Consumer programming pattern 
 - That typical PHP-centric Producer/Consumer use cases deal with traffic increases (or spikes)
   and related database congestion
 - This example of creating a new PHP-based microservice
 
## Language and Framework

PHP 7.2 and CakePHP 3 using MySQL 5.6. The principles taught with this tutorial apply to any 
language supported by the Nexmo and RabbitMQ APIs.

## Specific Nexmo/TokBox APIs

The Nexmo Number Insights API (each of the three levels).

## Related Reading

 - [How-To Build a REST Implementation that Scales Better than SMPP](https://www.nexmo.com/blog/2016/03/25/build-rest-implementation-scales-better-smpp/)
 - [Number Insight API Overview](https://developer.nexmo.com/number-insight/overview)
 - [How to Use The Number Insight API with PHP](https://www.nexmo.com/blog/2019/03/29/how-to-use-number-insight-with-php-dr/)
 - [The Official RabbitMQ Tutorials](https://www.rabbitmq.com/getstarted.html)
 - [I'm British So I Know How to Queue](https://leanpub.com/im_british_so_i_know_how_to_queue)
   by Stuart Grimshaw, solid technique and background theory building messaging systems with
   PHP and RabbitMQ
   
## External Submissions

 - [PHP Architect Magazine](https://www.phparch.com/) - for any PHP-centric projects that teach concepts
 - [freeCodeCamp](https://medium.freecodecamp.org/) - any developer-centric articles/tutorials
 - [Dev.to](https://dev.to/) - any developer-centric articles/tutorials
 - [codementor](https://www.codementor.io/community/trending) - any developer-centric tutorials
 - [scotch.io](https://scotch.io/) - any web development tutorials, thus plausibly anything PHP-centric
 - [Digital Ocean Community](https://www.digitalocean.com/community/tutorials) - any developer-centric tutorials
 - [LinkedIn](https://www.linkedin.com/) - anything purporting to be informative
 - [CakePHP Blog](https://bakery.cakephp.org/) - Anything built as a demo project with the CakePHP framework
   could be a topic for the FriendsOfCake group or the CakePHP Bakery blog. I can check with the core development
   team when the time comes.
   
## Three Tweets

The following tweets should include an image; perhaps even just a screen shot of the code.

1. Typos happen. Validate user-entered phone numbers with the @Nexmo Number Insights API. This PHP tutorial shows you how, step by step.

2. Learn a powerful technique for scaling-out your PHP application using @CloudAMQP's RabbitMQ as a Service and the @Nexmo Number Insights API. Producer/Consumer Programming for the win!

3. Conway's Law helps us keep a separation of concerns. In this tutorial we'll see Conway's Law in action as we learn how to use a @Nexmo API asynchronously, separating it from the main web site.

