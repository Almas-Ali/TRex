# TRex CMS

A blog type CMS website for college project. Built using Laravel framework in PHP.

© All Copyrights reserved by author **[Md. Almas Ali][1]**

## What is TRex project about ?

This project is about a CMS - Content Management software written in Laravel. This is just the starting of this project. More new feature is adding continuously. Learn more about this software can do from this documentation.

## Features


## Requirements

- XAMPP
- Git
- Composer


Need to change in XAMPP: 

    Goto : C:\xampp\php\php.ini
    change : ";extension=gd" to "extension=gd"

    Just remove the ";" from the line and save it carefully.


<div id="installation"></div>

## Installation:

To install this project:

```bash
# Clone the repository
git clone git@github.com:Almas-Ali/TRex.git TRex

# Change directory to TRex
cd TRex
```

make a database and update it on `.env.example` on project folder, then follow bellow:


```bash
# Install this project with CLI command and fill all requirements.
install
# Press y to continue.

# Start the server with php
php artisan serve
```

## Some commands that you will need:

To get the updated version of this project download it using git commands. <br>

### ***Fresh installation :***

Follow <a href="#installation">Installation</a>

Use this command in any where you want.

### ***Update old project :***

```bash
# Update code base 
git pull

# Migrate latest changes in database
php artisan migrate

# Start the server with php
php artisan serve

```

You have to use it on project folder.

*By default user login credentials as admin:*

    Email     : support@trex.com
    Password  : 12345678



<br>

### Credits:
<p>Frontend & Backend Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
<p>Navbar By <a href="https://codepen.io/acarlie/pen/JjPKmmV">Codepen</a></p>
<p>Login By <a href="https://codepen.io/KY64/pen/jJdwBp">Codepen</a></p>
<p>Framework By <a href="https://laravel.com">Laravel</a></p>


[1]: <https://github.com/Almas-Ali> "Md. Almas Ali Github"

