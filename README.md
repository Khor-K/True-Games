<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Проект Laravel

Это проект, который использует фреймворк Laravel для создания веб-приложения. В проекте рассматриваются такие темы, как маршрутизация, контроллеры, представления, базы данных и др.

## Инструкции по установке

1. Склонируйте репозиторий к себе на компьютер:
    
    ```
    git clone https://github.com/Khor-K/True-Games
    
    ```
    
2. Перейдите в директорию проекта:
    
    ```
    cd project
    
    ```
    
3. Установите зависимости проекта:
    
    ```
    composer install
    
    ```
    
4. Создайте файл `.env` из файла `.env.example`:
    
    ```
    cp .env.example .env
    
    ```
    
5. Сгенерируйте ключ приложения:
    
    ```
    php artisan key:generate
    
    ```
    
6. Настройте подключение к базе данных в файле `.env`.
7. Запустите миграции:
    
    ```
    php artisan migrate
    
    ```
    
8. Запустите приложение:
    
    ```
    php artisan serve
    
    ```
    
9. Перейдите в браузере по адресу [http://localhost:8000](http://localhost:8000/) и убедитесь, что приложение успешно запущено.

## Как использовать

Проект включает в себя примеры кода для маршрутизации, контроллеров, представлений и базы данных. Вы можете использовать этот код как отправную точку для создания своего веб-приложения на Laravel.

## Лицензия

Этот проект распространяется под лицензией MIT. Вы можете использовать его для любых целей, включая коммерческие.
