<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## `Tech Stack`

Styling using Tailwind CSS\
Backend using Laravel 11\
Database used: MariaDB\

## `References`

Laravel Docs: [URL](https://laravel.com/docs/11.x)\
Tailwind CSS Docs: [URL](https://tailwindcss.com/docs/font-weight)\
Flowbite for Tailwind CSS Components: [URL](https://flowbite.com/docs/components)\
Livewire Docs: [URL](https://livewire.laravel.com/docs)

## `Important Commands`

Initialize livewire: "composer require livewire/livewire".\
Make a livewire component: "php artisan make:livewire Counter".\
No ideas about livewire? Try to watch this [video](https://www.youtube.com/watch?v=hL7sVFSkph8) to have some.

> [!IMPORTANT]
> Steps to create laravel project

1. composer create-project laravel/laravel **_project_name_** \
2. Open config/app.php set **'timezone'=>'Asia/Manila'** \
3. Modify charset and collation in config/database.php **'charset'=>'utf8'** and **'collation'=>'utf8_general_ci'** \
4. Modify .env \
5. Create Model and Migration
    - php artisan make:model _modelName_ -m
6. Modify inside model
    - public $timestamps = true; /
    protected $fillable = [
        'prod_no',
        'category',
        'prod_name'
    ];/
    protected $guarded = [];/
    protected $primaryKey = 'you_primary_key';/