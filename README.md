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
