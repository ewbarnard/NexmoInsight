# Second Proposal

## Tutorial Title

_Learn the Nexmo SMS APIs by Playing the 1986 Swiss Text Adventure Game_

## Tutorial Abstract

> When integrating with any 3rd-party API, it's important to understand the complete
> sequence of events. Modern browsers, and tools like the Charles Web Debugging Proxy,
> show us client-side traffic (requests and responses). It can be more difficult and
> frustrating to observe server-side interactions. We'll implement a text Adventure
> game from 1986 using text messages as our "operator console." Watch the server-side
> interactions via web page as we play the game with our smart phone.

## About the App

The original "Swiss Adventure" (1986) was written for the Cray mainframe operator
console. This port uses a PHP application as the game engine and the user's smart
phone text messaging app as the operator console. Commands and responses are by
text message. The accompanying web page displays the Nexmo API requests and responses
in real time

## Target Audience

Software developers with 

 - Intermediate knowledge of PHP
 - Basic knowledge of MySQL and MySQL table design
 
Basic familiarity with the CakePHP framework is helpful but not required.

## Learning Objectives

Readers of the tutorial can learn:

 - How to use the Nexmo Verify API for two-factor authentication
 - How to send a text message using the Nexmo SMS API
 - How to receive a text message using the Nexmo SMS API
 - How to receive a delivery receipt using the Nexmo SMS API
 - The sequencing and request/response content of the above API usage
 - How to use web sockets for inbound information from Nexmo
 
## Language and Framework

PHP 7.2 and CakePHP 3 using MySQL 5.6.

## Specific Nexmo/TokBox APIs

 - Nexmo SMS (send SMS; delivery receipt; inbound SMS)

## Related Reading

 - [Nexmo SMS API Reference](https://developer.nexmo.com/api/sms)
 - [Nexmo Verify API Reference](https://developer.nexmo.com/verify/overview)
 - [cURL, HTTPS & the Nexmo SMS API Behind the Scenes](https://www.nexmo.com/blog/2018/11/06/curl-https-nexmo-sms-api-behind-the-scenes-dr/)
 - [Receiving SMS Delivery Receipts with PHP](https://www.nexmo.com/blog/2018/06/25/receiving-sms-delivery-receipts-with-php-dr/)
 - [Connect your local development server to the Nexmo API using an ngrok tunnel](https://www.nexmo.com/blog/2017/07/04/local-development-nexmo-ngrok-tunnel-dr/)
 - [Receiving an SMS with PHP](https://www.nexmo.com/blog/2018/06/19/receiving-an-sms-with-php-dr/)
 - [Two-way SMS for customer engagement](https://developer.nexmo.com/tutorials/two-way-sms-for-customer-engagement)
 - [Sending SMS Messages with PHP](https://www.nexmo.com/blog/2017/09/20/sending-sms-messages-with-php-dr/)
 - [How to Show SMS Notifications in the Browser with Angular, Node.JS, and Ably](https://www.nexmo.com/blog/2018/08/07/sms-notifications-browser-with-angular-node-ably-dr/)
 - [Create Your Own Adventure](https://github.com/nexmo-community/create-your-own-adventure)
 - [Swiss Adventure](https://github.com/ewbarnard/InsidePHP/blob/master/APML/swiss.txt) - the original
   text adventure, written in Cray I/O Subsystem Assembly Language
   
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

1. Retro Computing: Learn the @Nexmo SMS API by playing a 1986 text Adventure game that takes you around Switzerland!

2. "You have found the highest rail station in Europe. The Jungfrau, Eiger, and Monch display their deadly beauty." - learn how @Nexmo APIs work while you play the 1986 Adventure game using text messages to simulate your mainframe operator console.

3. "As you climb through the trap door..." - Let's learn about text messages the fun way! This tutorial uses a 1986 adventure game to teach how to use the @Nexmo 2-factor verification and SMS APIs. Your phone becomes the operator console.
