# First Proposal

One serious, one fun.

## Tutorial Title

_Preparing to Scale: How to Offload Your Nexmo Number Insights in PHP_

## Tutorial Abstract

> Typos happen. In this tutorial we validate user-entered phone numbers using the Nexmo
> Number Insights API from our PHP web application. Once that's in place, we'll use CloudAMQP's
> RabbitMQ as a Service to move our requests offline. We'll learn how to use this powerful 
> technique for scaling-out a web application. We'll see how Conway's Law informs our decisions 
> as we separate user-facing web functionality from offline API use.

## About the App

The app is a small PHP/MySQL website allowing us to create user records that include a phone number.
We use the Nexmo Insights API to format and validate the supplied phone number. During the tutorial
we separate the Nexmo requests/responses from the website to run them offline. We use the 
Producer/Consumer programming pattern, passing messages via RabbitMQ.

## Target Audience

 - This tutorial informs solution architects of specific techniques and capabilities suitable for
   any programming language supported by the Nexmo and RabbitMQ APIs
 - This tutorial teaches intermediate and advanced back end developers (in PHP) validation
   techniques using the Nexmo API, and specific methodologies for scaling-out a web application

## Prerequisites

Readers should have 

 - Intermediate or advanced knowledge of PHP
 - Basic knowledge of MySQL and MySQL table design
 
Familiarity with the CakePHP framework is helpful but not required.

## Learning Objectives

Readers of the tutorial can learn:

 - How to use the Nexmo Number Insights API in PHP
 - That the Nexmo Number Insights API has three levels (basic, standard, advanced) 
   and what the differences are
 - How to validate user-entered phone numbers using the Nexmo Insights API
   (Phone number _verification_, as opposed to _validation_, is covered in the second tutorial)
 - The Producer/Consumer programming pattern 
 - That typical PHP-centric Producer/Consumer use cases deal with web traffic increases (or spikes)
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
 - [Building Microservices: designing fine-grained systems](https://samnewman.io/books/building_microservices/)
   by Sam Newman, outstanding book aimed at both practitioners and architects, teaching patterns for designing
   distributed systems
   
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

I do long-form essays on Twitter, such as this 234-tweet epic: 
[Big Iron and the World War II Codebreakers](https://twitter.com/ewbarnard/status/1036992847940149249).

A 15-tweet thread might run as follows. (Numbering is correct in raw markdown, may render as 1. each time here.)

1. Typos happen. With phone numbers, that can get expensive. I've been thinking about this, and wrote a tutorial. THREAD

![Sorry, Wrong Number](figures/wrong-number.jpg)

_Photo from <https://www.amazon.com/Sorry-Wrong-Number-Barbara-Stanwyck/dp/B00K03Z6TM/>_

2. Web sites are getting more careful about personally identifiable information (PII), and rightly so. There's an important side issue, which is accidentally gathering information about the wrong person.

![Mistaken Identity](figures/mistaken-identity.jpg)

_Photo from <https://www.amazon.com/dp/B002QJZ9W2/>_

3. @Nexmo has a Number Insights API to help us with this situation. The API has three levels - basic, standard, advanced. <https://developer.nexmo.com/number-insight/overview#basic-standard-and-advanced-apis>

4. The basic level provides locale and formatting information. I found that useful when I fumbled the first digit of a phone number - I was suddenly routing to a different country! That would be expensive.

![Temple Wat Xieng Thong, Laos](figures/Laos.JPG)

_Public domain photo from <https://imagespublicdomain.wordpress.com/2009/11/25/cia-world-factbook-photos-6-laos-thailand-cambodia-vietnam-indonesia/>_

5. The standard level tells us whether the number belongs to a land line, mobile device, or is a virtual number. Depending on your situation this might be exactly what you need.

![Telephone](figures/black-vintage-telephone-3872x2592_97851.jpg)

_Free image from <http://absfreepic.com/free-photos/download/black-vintage-telephone-3872x2592_97851.html>_

6. The advanced level is for people or web sites who need to learn the risk associated with that number. We can determine, for example, whether the number is both valid and reachable (as of the time of the API call).

![Field Telephone](figures/15766183-old-military-field-telephone-isolated.jpg)

_Image from <https://www.123rf.com/photo_15766183_old-military-field-telephone-isolated.html>_

7. Now is a good time to distinguish between number VALIDATION and number VERIFICATION or AUTHENTICATION. (Image, "Dr. Livingstone, I presume?" from Stanley's 1872 book "How I Found Livingstone")

![Dr. Livingstone, I presume?](figures/Rencontre_de_Livingstone_-_How_I_found_Livingstone_(fr).png)

_Public domain <https://en.wikipedia.org/wiki/File:Rencontre_de_Livingstone_-_How_I_found_Livingstone_(fr).png>_

8. We've been talking about VALIDATION: Is this a real phone number? Is it for a cell phone? Is it reachable? That's what my tutorial covers.

![Telephone System](figures/Screen%20Shot%202019-04-14%20at%2012.08.17%20PM.png)

_U.S. Patent Office, publication US 2019/0110193 A1_

9. A related issue is VERIFICATION, that is, AUTHENTICATION that the phone number is available to the person we think it does. In other words, 2-Factor Authentication.

![Two Factor Authentication](figures/2FA.jpg)

_Wikimedia Commons <https://en.wikipedia.org/wiki/File:Diff%C3%A9rents_mod%C3%A8les_de_lecteurs_de_cartes_bancaires.jpg>_

10. @NexmoDev has the Verify API and workflow for this very situation, but that's a separate tutorial! <https://developer.nexmo.com/verify/overview>

11. I'm also reminded that software development doesn't happen in a vacuum. When we're collecting information such as phone numbers, there's a reason. We might be preparing for event or tournament registration, for example.

![Sporting Event](figures/crowded-indoor-sporting-event-hall-3264x2448_73418.jpg)

_Photo <https://en.wikipedia.org/wiki/File:Diff%C3%A9rents_mod%C3%A8les_de_lecteurs_de_cartes_bancaires.jpg>_

12. Registration periods can mean sudden traffic spikes. In fact you could even be dealing with bots sweeping up thousands of concert tickets for scalping on the secondary market.

![Ticket](figures/ticket.jpg)

_<http://clipart-library.com/tickets-cliparts.html>_

13. The problem, though, is not just the user-facing traffic surge. There could be major workflows behind this registration activity. We could have lots of database work, email verifications, opt in or out, reports to generate, and so on.

![Workflows](figures/workflows.png)

_<http://clipart-library.com/tickets-cliparts.html>_

14. So, I my tutorial explains and demonstrates a pattern allowing us to scale out and ride through the surge. The sample code is open source on GitHub.

![Server Room](figures/1280px-Inside_Suite.jpg)

_Public domain <https://commons.wikimedia.org/wiki/File:Inside_Suite.jpg>_

15. Funny thing, that... my tutorial has also just shown you how to build your first microservice. END <https://github.com/ewbarnard/NexmoInsight/tree/master/Articles/OfflineLocale>

## Call for Papers

I generally turn magazine articles into conference talks (and not the other way around). This one
is suitable as both a regular talk and a hands-on workshop. In the workshop (3 hours) we can take
on both validate (Number Insights API) and verify (Verify API and workflow) phone numbers.

### Talk Titles

 - Typos Happen: Validate User-Entered Phone Numbers (regular, 30 minutes, intermediate)
 - Producer/Consumer Programming: Offload 3rd-party API use (regular, 60 minutes, intermediate)
 - Full Throttle: Producer/Consumer Programming (regular, 60 minutes, intermediate)
 - Preparing to Scale: Offload to Microservices (regular, 60 minutes, intermediate)
 - Validate and Verify User-Entered Phone Numbers (workshop, 3 hours, intermediate)
 
### Talk Descriptions

I generally pick from one of several potential descriptions when submitting to a CFP. Since most conferences
that I've submitted to request multiple submissions, I try to make each _set_ of submissions as
much of a variety as possible. I can never predict what gets chosen by the organizers, and feedback
indicates that it's a matter of filling in pieces of the puzzle in relationship to other
speakers' talks.

The following descriptions assume submission is to a PHP-centric conference and thus there is no
need to mention that the application is in PHP.

Potential descriptions:

 - Learn how to validate user-entered phone numbers using the Nexmo Number Insights API.
   This step-by-step tutorial walks through signup and obtaining API keys, the API
   request and response, and what features are available in the basic, standard, and
   advanced API service levels. (regular talk, 30 minutes, intermediate)
   
 - Producer/Consumer programming is a great technique for offloading work from your main
   application. You can scale resources to meet increased demand. You can "smooth out"
   traffic spikes by placing your backlog in a queue. You can set aside long-running
   tasks such as thumbnail generation. We'll develop a bare-bones CakePHP application
   which uses Nexmo's Number Insights API for validating user-entered phone numbers.
   We then create a high-performance upstream/downstream workflow that produces and 
   consumes via a free CloudAMQP (RabbitMQ) account. We'll see a pattern for developing
   microservices as we offload work.
   
 - Typos happen. Mistyped phone numbers can cost money and potentially even trigger
   regulatory issues when contacting the wrong number by mistake. In this hands-on
   workshop we'll implement both validation and two-factor verification of a phone 
   number using the Nexmo API and best-practice workflows. We'll learn to use ngrok
   and webhooks for API callbacks.
    - Prerequisites: [ngrok](https://ngrok.com/) installed; local development
      environment (LAMP stack or the equivalent)
    - Workshop is hands-on (3 hours); you will be writing PHP code for your local
      environment