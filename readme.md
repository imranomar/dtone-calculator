<p align="center">
<h1>CalCo Calculator</h1>

<p align="center">
======


API Documentation
=============
Please feel free to contact me :

Imran Omar Bukhsh<br>
Email: imranomar@gmail.com<br>
Mobile: 00971 50 4225054<br>

NOTE: Has been created with Laravel 6.0.3

NOTE: The Calculator can be viewed at http://3.80.185.75/public/calculator

NOTE: The reports page can be viewed at http://3.80.185.75/public/reports


NOTE: api documentation can be found here at

https://documenter.getpostman.com/view/7566754/SVtPZBzc?version=latest

CONFIGURATION
-------------
Database configuration can be found in .env file in root
For the calculator front-end the api url is set in the main.js file as example below. This can be changed as per the server details.

e.g. : Vue.http.options.root = 'http://3.80.185.75/public/api/cal/';

HOW TO
-----
.For the reports page, the daily reprot can be selected by selecting a date from the drop down which says 'Select Date'. Once selected the page autmatically refreshes. For the week and month reports select the drop downs respectively. Note: when a date is selected for the week report then automatically the start and end date is calculated of the week.

.DO NOT FORGET to run 'npm run build' if you make any changes in the front-end javascript code.

VALIDATIONS CODE
-----------------
.can be found in http>requests folder

DATABASE
--------
.migrations can be found in database>migrations . Install with running php artisan migrate in root of app

.for this presentation the database can be accessed online at http://3.80.185.75/public/adminer.php

username: root

password: q0kYYdbtE3VH

database: calco


CODE DETAILS
------------
.SimpleCal class implments the iCalc interface

.The CalculatorController calls method of the SimpleCal

.API routes are routes/api.php


FILE PERMISSIONS
----------------
Make sure the following are writable:

/opt/bitnami/apache2/htdocs/storage/logs 

/opt/bitnami/apache2/htdocs/storage/framework


TO INSTALL
----------
Requirements: php7, composer, mysql, nodejs, npm

.run composer install

.run npm install

.setup the .env file for your database settings and create the database

.run the following in the root folder:

php artisan migrate


UNIT TESTS ( initial )
---------------------------
.can be found in /vendor/bin/phpunit

.can be run with 'phpunit' (/vendor/bin/phpunit) in the root

</p>
