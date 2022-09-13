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

- Easy to install with `make`


```bash
# Install all requirements with make
make install

# To see help type
make help
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



[1]: <https://github.com/Almas-Ali> "Md. Almas Ali Github"

