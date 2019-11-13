Site:
=======
 - Site / Domain Name - URL (http://www.example.com/)
 - Build - PHP _and_ (Version Number)
 - ( CMS / Development URL's and Info. -  _IF NEEDED_ )

    CMS URL:  http://www.example.com/

    Username:  user

    Password:  password

 - ( Development Site Info. -  _IF NEEDED_ )

    DEV URL:  http://dev.example.com/

 HOSTING / REGISTRAR:
 ====================
 - Hosting - [Service Name w/ link](link) ( Paid / Free )
 - Domain Registrar - [Service Name w/ link](link) ( Paid / Free )
 - DNS Configuration - [Service Name w/ link](link) ( Paid / Free )

 SERVICES:
 =========

 ( Heroku Services )

 - Web Service - App Type w/ # of dynos ( Paid / Free )
 - Any Heroku Add-on Service - [Service Name w/ link](link) ( Paid / Free )

 ( Other Services )

 - Database Type - MySQL / MongoDB
 - Database Service - [Service Name w/ link](link) ( Paid / Free )
 - SSL Certificate Service - [Service Name w/ link](link) ( Paid / Free )
 - CDN - [Service Name w/ link](link) ( Paid / Free )
 - Site Monitor / Debugging / Logging Service - [Service Name w/ link](link) ( Paid / Free )
 - Email Service - [Service Name w/ link](link) ( Paid / Free )
 - Site Analytics - [Service Name w/ link](link) Tracking ID: UA-00000-1 ( Paid / Free )
 - Any Additional Service - [Service Name w/ link](link) ( Paid / Free )

 REQUIREMENTS:
 ==============
 ( PHP Basic Template: _STRUCTURE AND SETUP_ )

 ### Folder & Directory Structure:

```
/ (project root)
├── Procfile (Heroku Config File)
├── .gitignore
├── .slugignore (Heroku ignored files and directories)
├── README.md
├── composer.json (Additional Tools and dependency)
├── composer.lock (Additional Tools and dependency)
├── config/ (Site-wide Database Connection values & helper functions) 
│   ├── config.php
│   ├── dataStore.php
│   ├── helpers.php
│   ├── mongoData.php
│   └── stateHelper.php
├── mockups/ ( PSD / EPS GRAPHICS FILES )
├── working/ ( PSD / EPS GRAPHICS FILES )
└── www/
    ├── .htaccess (Apache config and re-write rules)
    ├── assets/ (All site assets and scripts)
    │   ├── images/
    │   ├── scripts/
    │   └── styles/
    ├── index.php
    ├── partials/ (Directory of any server-side includes)
    └── templates/
        └── template-basic.php
```

 **Directory / File Descriptions:**

  **libs** : _This directory is where we place extra PHP (or JavaScript) libraries. Typically these sort of tools/dependencies are now installed via Composer.  However, there are times when it's beneficial to store authentication or self-defined tools here._

  **pieces** : _This directory is where all the helper and database usability files are stored.  The_ **helpers.php** _file contains a helpers class, along with a series of public functions that help display the template-based pages and other useful functions to make coding easier.  The_ **msqliData.php** _has several pre-defined MySQL queries to help in accessing data and displaying it on a page easier._

  **templates** : _Where the page templates for the site are stored. Typically, the page templates are the outer shell of the page (containing the_ **HTML, HEAD & BODY** _tags). The stylesheets, JavaScripts and any analytics tags are placed in the template files. The individual pages themselved (_ **IE - index.php** _) define the interior content of each the page._

  **config.php** : _This file serves a couple different functions.  First, it is used to establish the site directory/file_ **BASE** _via the helpers.php file. It also servers as the main file to define_ **$GLOBAL** _variables for the site. The most important global variables that are defined are the_ **$PIECES** _which are used to define the database connection values for authentication.  This file can also be used to define session names and error reporting for development enviorments._



### Other Tools & Dependencies:

  **Swiftmailer** : _A free, feature-rich PHP mailer. Swift Mailer integrates into any web app written in PHP 5, offering a flexible object-oriented approach to sending emails with a multitude of features. We have used Swift Mailer on previous projects with good results.  Swift Mailer's library can be installed using Composer._

  [Documentation](http://swiftmailer.org/docs/introduction.html)

  **Example:**

```
// Adding vendor autoload to access the Swift Mailer vendor
require_once 'vendor/autoload.php';

// Setting up the SMTP server, port, SSL, email-username and password
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
              ->setUsername('user@gmail.com')
              ->setPassword('password');

// Setting the mailer instance
$mailer = Swift_Mailer::newInstance($transport);

// Defining who the message is from, who it's going to and the message body
$message = Swift_Message::newInstance('New Message')
						  ->setFrom(array('user@gmail.com' => 'From Email Common Name'))
						  ->setTo(array('to-email@gmail.com'))
						  ->setBody('Put The Email Message Here');

// Sending the message
$result = $mailer->send($message);
```

 **Rackspace/PHP-Opencloud** : _A Rackspace library for PHP that offers a wide range of services.  We have used the_ **object-store** _service for uploading images and assets to Rackspace containers._

 [Object-store Documentation](http://docs.php-opencloud.com/en/latest/services/object-store/index.html)

 **Example: upload-object.php**

 ```
 // Adding the vendor autoload.php and accessing the php-opencloud vendor
 require dirname(__DIR__) . '/../vendor/autoload.php';
 use OpenCloud\Rackspace;

 // 1. Instantiate a Rackspace client. You can replace {authUrl} with
 // Rackspace::US_IDENTITY_ENDPOINT or similar
 $client = new Rackspace(Rackspace::US_IDENTITY_ENDPOINT, array(
     'username' => 'username',
     'apiKey'   => 'apikey',
 ));

 // 2. Obtain an Object Store service object from the client.
 $objectStoreService = $client->objectStoreService(null, 'DFW');

 // 3. Get container.
 $container = $objectStoreService->getContainer('container-name');

 // 4. Check if the file exists in Rackspace
 $exists = $container->objectExists($values["image"]);

 // 5. Open local file
 $fileData = fopen($_FILES["image"]["tmp_name"], 'r');

 // 6. Upload it! Note that while we call fopen to open the file resource, we do
 // not call fclose at the end. The file resource is automatically closed inside
 // the uploadObject call.
 if(!isset($exists) || $exists == false) {
   $container->uploadObject($values["image"], $fileData);
 }
 ```

  **Example: delete-object.php**

  _(Repeat steps 1 - 4 in upload-object.php)_

 ```
 // 5. If object exists, Delete object.
 if(isset($exists) && $exists == true) {
   $container->deleteObject($image);
 }
 ```


 **Twig** : _The flexible, fast, and secure template engine for PHP. The Twig library is backed by the creators of the Symfony framework. We have used Twig templates in specific situations, where building an unlimited amount of pages, dynamically, based on data is necessary._

 [Twig Documentation](http://twig.sensiolabs.org/doc/1.x/)

 **Example: Configure Twig Views**

 ```
 // Setting Up Twig Templates
 require_once '../vendor/autoload.php';
 Twig_Autoloader::register();

 // Establish and load the views directory.
 // The views directory is where the ".twig" files are served from
 $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');

 // Adding Twing setting for a template cache
 $twigSettings = array(
   'cache' => __DIR__ . '/path/to/compilation/cache'
 );

 // Using the twigSettings and loader to establish a new Twig instance
 $twig = new Twig_Environment($loader, $twigSettings);

 // Render (output) a Twig template
 // An Example of values that could be passed into the render array
 echo $twig->render('index.twig', array(
    'title' => 'My First Twig Template',
    'content' => 'Hello World!'
  ));
 ```
