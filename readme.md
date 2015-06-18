# laravel-blog

[![GitHub release](https://img.shields.io/github/release/xsen/laravel-blog.svg?style=flat-square)](https://github.com/xsen/laravel-blog/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)



## Installation

Github 
``` bash
$ git clone git@github.com:xsen/laravel-blog.git projectname
$ cd projectname
$ composer install
```
create database and update .env file

``` bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed #add test data

```

Default user ['admin@admin.com' => '123456']  

>redis or memcached cache is required.

>homestead is recommended.


## Credits

- Evgeny Leshchenko (https://github.com/xsen)
- gantoday (https://github.com/gantoday)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.