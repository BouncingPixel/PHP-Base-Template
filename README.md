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
├── mockups/ ( PSD / EPS GRAPHICS FILES )
├── working/ ( PSD / EPS GRAPHICS FILES )
├─┬ www/ (web root)
│ ├─┬ assets/ (All site assets and scripts)
│ │ ├── images/
│ │ ├── scripts/
│ │ └── styles/
│ ├── libs/ (Any extra libraries or scripts)
│ ├── pieces/ (The helper files directory)
│ ├── partials/ (Directory of any server-side includes)
│ ├── templates/
│ ├── .htaccess (Apache config and re-write rules)
│ ├── config.php (Site-wide Database Connection values)
│ └── index.php
├── .gitignore
├── .slugignore (Heroku ignored files and directories)
├── Procfile (Heroku Config File)
└── composer.json (Additional Tools and dependency)
```

 #### Directory / File Descriptions

  **libs** : _This directory is where we place extra PHP (or JavaScript) libraries. Typically these sort of tools/dependencies are now installed via Composer.  However, there are times when it's beneficial to store authentication or self-defined tools here._

  **pieces** : _This directory is where all the helper and database usability files are stored.  The_ **helpers.php** _file contains a helpers class, along with a series of public functions that help display the template-based pages and other useful functions to make coding easier.  The_ **msqliData.php** _has several pre-defined MySQL queries to help in accessing data and displaying it on a page easier._

  **templates** : _Where the page templates for the site are stored. Typically, the page templates are the outer shell of the page (containing the_ **HTML, HEAD & BODY** _tags). The stylesheets, JavaScripts and any analytics tags are placed in the template files. The individual pages themselved (_ **IE - index.php** _) define the interior content of each the page._

  **config.php** : _This file serves a couple different functions.  First, it is used to establish the site directory/file_ **BASE** _via the helpers.php file. It also servers as the main file to define_ **$GLOBAL** _variables for the site. The most important global variables that are defined are the_ **$PIECES** _which are used to define the database connection values for authentication.  This file can also be used to define session names and error reporting for development enviorments._
