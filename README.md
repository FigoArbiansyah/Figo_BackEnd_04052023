<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Description

Website ini adalah website yang dibuat untuk memenuhi tes pemrograman


## Installation

Ketik perintah berikut pada terminal untuk meng-clone nya kedalam laptop anda

``` 
git clone https://github.com/FigoArbiansyah/Figo_BackEnd_04052023.git
```

kemudian masuk ke dalam folder proyek yang telah di clone

```
cd Figo_Backend_04052023
```

lalu,

```
composer install
```

ubah file .env.example menjadi .env secara manual atau bisa menggunakan perintah

```
cp .env.example .env
```

dan jalankan beberapa perintah dibawah ini

```
php artisan key:generate
```

```
php artisan migrate
```

```
php artisan serve
```
