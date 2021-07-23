### CSE 446 : Web Technologies

# SUST CSE RESOURCE ARCHIEVE


[![N|Solid](https://github.com/CSE-446-2016/group_47/blob/main/Capture.PNG)]()



It's a web project build by Laravel for the course CSE 446 : Web Technology. The owner of this project are:



- Ananta Akash Podder
  
  Reg No: 2016331102,
  
  Student of CSE, SUST
  
  Email: anantaakash.podder@gmail.com
  
  Github: https://github.com/RatedRAkash
  
  

- MD. NAHID REZA SHOVO
  
  Reg No: 2016331008,
  
  Student of CSE, SUST
  
  Email: shovo1999@gmail.com
  
  Github: https://github.com/NahidReza08



## Motivation

Students of CSE, SUST are renowned for their project and resource works. But it is a matter of sorrow that, we don't have any platform to store their works. As a result, many potential works have been lost over time. But if we could store them maybe students from next year could extend these works, develop their ideas, get essential helps etc. 



So, our plan is to develop a website that will store the project and resource works of the students in google drive and display them through our site. 




## Features


- User register and login
- Google captcha for preventing unauthorized sign-up.

- Beatiful user profile where users can upload profile photos, add websites and edit informatin. There is also option to view their own and favourite projects.

- Option to manually add project categories and view the projects of each category.
 User can create project workspace by form to store their projects. They can also add partner and supervisor.

- CK-Editor is implemented to add more features in description section.

- User can upload PDF, Presentation slide and source code. Slide can be presented in google slide. Files are uploaded in google drive.

- Owner can edit their project. Users can request for editing access.

- A user can add a project to the favourite list. Any update on the project will be notified to the users via email.
- A user can rate or comment on any project.

- From the mail, the user can automatically visit the site.
- There are features for filtering and sorting the projects.

- For any query users can contact from the contact us section.


## Requriments

SUST CSE RESOURCS ARCIEVE is a web application, built in Laravel. So, we need following requirements to run our project.

- PHP  >= 7.2.5

We also need some PHP extension they are basically integreted with PHP.
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

Apart from these we also need:
- Composer
- Xampp
- MySQL
- Laravel
- Google Captcha API
- Google Drive API
- Source Code Editor: Visual Studio Code

## PHP Version Check
To check if PHP is already install in the system or to check the version we can run the simple command:

```sh
php --version
```

To install PHP we can simply follow the instructions of this site:
https://www.sitepoint.com/how-to-install-php-on-windows/

## XAMPP Istallation
To install XAMPP, we need to visit the following link:
https://www.apachefriends.org/index.html

From there, we have to download appropriate XAMPP version.

## Composer Istallation

To manually download composer, we need to visit the following link and download exe file:
https://getcomposer.org/download/

For command line installation, we need to run the following commands:

```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## LARAVEL Istallation
First, download the Laravel installer using Composer:
```sh
composer global require laravel/installer
```

To create new project , we can run the following command:
```sh
composer create-project --prefer-dist laravel/laravel:^7.0 sust_cse_resource_archieve
```

To run project, we can run the following command:

```sh
php artisan serve
```

To know more about laravel, we can follow the instructions of this link:
https://laravel.com/docs/7.x

## Integrete Google Recaptcha
To get a new google recaptcha api, we can follow this link:
https://developers.google.com/recaptcha/docs/display

We need to add 
CAPTCHA_KEY, 
CAPTCHA_SECRET 
variable and their value in .env file.

We need to run following command, to add dependancies of google recaptcha:

```sh
composer reqire google/recaptcha '~1.1'
```

To get more details, we can follow this tutorial:
https://www.youtube.com/watch?v=mE6NU5ABel4

## Integrete Google Drive
To get a new google drive api, we can follow this link:
https://developers.google.com/drive

We need to add 
GOOGLE_DRIVE_CLIENT_ID,
GOOGLE_DRIVE_CLIENT_SECRET,
GOOGLE_DRIVE_REFRESH_TOKEN,
GOOGLE_DRIVE_FOLDER_ID 
variables and their value in .env file.

To  get a PHP client library for accessing Google APIs, we need to run the following command:
```sh
composer require google/apiclient:^2.10
```

To get a Flysystem Adapter for Google Drive, we need to run the following command:
```sh
composer require nao-pon/flysystem-google-drive:~1.1
```

To get more details, we can follow this tutorial:
https://www.youtube.com/watch?v=dVUGVmJdJ1A&t=517s

## Sending Mail through Gmail:
To send an email through gmail, we need to send some values in .env file:

To get more details, we can follow this tutorial:
https://www.youtube.com/watch?v=kWEvrHVg8kI&t=59s

## Clone and run project from Github:
We can follow this tutorial, to clone and run project from github:
https://www.youtube.com/watch?v=D5MZaCmpxvM
