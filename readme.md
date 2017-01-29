#Solat Jakim REST API (Unofficial) For Laravel 5

Solat Jakim REST API web site is an unoffical site for serving public REST API for Waktu Solat in Malaysia provided by Jakim. The website source codes was purposely made public in GitHub so that anybody interested in this project could contribute to the work.

The website was built using Laravel MVC, with Eloquant as the database provider for MySQL and Blade as the template engine.

##Laravel 4
For Laravel 4 Installation see [version-1.0](https://github.com/kayrules/solatjakim-api-site/tree/version-1.0) branch.


##Live Website
The latest version of the website will always be available at http://api.kayrules.com/solatjakim

##Installation

###1. Manual Install

You can manually install by cloning this repo or download the zip file from this repo, and run composer install.
```
$ git clone https://github.com/kayrules/solatjakim-api-site.git .
$ composer install
```

###2. Install via composer

Alternatively, you can use composer create-project to install without downloading zip or cloning this repo.
```
$ composer create-project kayrules/solatjakim-api-site --stability="dev"
```

###3. Setup Permission

After composer finished install the dependencies, it should automatically change the storage folder permission to 777. Just incase if it's not did as expected, you need to manually change it recursively as command below.
```
$ chmod -R 777 storage/
```

###4. Artisan Command

Execute artisan command to execute migration files, create required tables, seed zone information
```
$ php artisan migrate
$ php artisan db:seed
```

##Crawler

Crawler scripts is not attached to laravel framework / eloquent. Triggering the script will directly insert prayer times record into database. You will need to enable php cli and trigger it from command line as follows.
```
$ cd crawler
$ php crawler.php
```
