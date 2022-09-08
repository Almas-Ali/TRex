# TRex CMS

A blog type CMS website for college project. Built using Laravel framework in PHP.

© All Copyrights reserved by author **[Md. Almas Ali][1]**

## Requirements
    
### Windows:

- XAMPP
- Git
- Composer


Need to change in XAMPP: 

    Goto : C:\xampp\php\php.ini
    change : ";extension=gd" to "extension=gd"

    Just remove the ";" from the line and save it carefully.


### Linux:

- Install PHP Git cURL Composer
- Install PHP extensions
- Fix PHP configurations


```bash
# Update source list
sudo apt update

# Install main apps
sudo apt install php git curl composer -y

# Install extensions
sudo apt install php-common php-curl php-json php-readline php-fpm php-cli php-xml php-zip php-mbstring php-gd build-essential php-pear php-dev libmcrypt-dev -y

# Install mcrypt extension
sudo pecl channel-update pecl.php.net
sudo pecl update-channels
sudo pecl search mcrypt
sudo pecl install mcrypt
sudo phpenmod mcrypt

# Clear all caches
sudo apt autoremove
```


## Installation:

To install this project:
make a database and update it on `.env.example` on project folder, then follow bellow:

```bash
# clone the repo
git clone git@github.com:Almas-Ali/TRex.git TRex

# change directory to TRex
cd TRex

# install this project with CLI command and fill all requirements.
install

# start the server with php
php artisan serve
```

## Some commands that you will need:

To get the updated version of this project download it using git commands. <br>

Fresh installation : `git clone git@github.com:Almas-Ali/TRex.git TRex`

Use this command in any where you want.

Update old project : `git pull`

You have to use it on project folder.




<br>

### Credits:
<p>Frontend & Backend Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
<p>Navbar By <a href="https://codepen.io/acarlie/pen/JjPKmmV">Codepen</a></p>
<p>Login By <a href="https://codepen.io/KY64/pen/jJdwBp">Codepen</a></p>
<p>Framework By <a href="https://laravel.com">Laravel</a></p>


[1]: <https://github.com/Almas-Ali> "Md. Almas Ali Github"

