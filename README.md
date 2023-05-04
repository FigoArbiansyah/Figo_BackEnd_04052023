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
