# CNPI Blog

### A blog website for college project


## Installation:
To install this project:
make a database and update it on `.env`, then follow bellow:

```bash
# clone the repo
git clone git@github.com:Almas-Ali/laravel-blog.git laravel-blog

# change directory to laravel-blog
cd laravel-blog

# install composer dependency
composer install

# create a environment file
cp .env.example .env

# set the Application key
php artisan key:generate

# set database details in .env & migrate database with this
php artisan migrate 
```
