<style>
  details {
    margin-left: 20px;
    padding: 0 5px;
  }
  summary {
    font-weight: bold;
    font-style: italic;
    cursor: pointer;
  }
</style>

## Тема 7. Маршрутизация, контроллеры и посредники

---
### 1. Контроллеры
<details>
<summary>Подробнее</summary>

Официальная документация [тут](https://laravel.com/docs/11.x/controllers), русскоязычная [тут](https://laravel.su/docs/11.x/controllers).  
Контроллер создается через командную строку командой и хранятся в каталоге `\app\Http\Controllers`
```php
php artisan make:controller TestController
```

Контроллер может содержать базовые методы для создания, чтения, обновления и удаления («CRUD»).  
Для создания такого контроллера используется команда
```php
php artisan make:controller TestController --resource
```

Контроллер может содержать любое количество публичных методов, которые будут отвечать на входящие HTTP-запросы.  
Так же можно создать контроллер, посвященный единственному действию командой
```php
php artisan make:controller TestController --invokable
```
</details>

---
### 2. Маршрутизация
<details>
<summary>Подробнее</summary>

Официальная документация [тут](https://laravel.com/docs/11.x/routing), русскоязычная [тут](https://laravel.su/docs/11.x/routing).  
Маршруты можно разделить на три части: *публичные, для пользователя, для админа*.  
Маршруты все прописываются в файле `\routes\web.php`
```php
// Главная страница сайта
Route::view('/', 'welcome')->name('home');

// Редирект (перенаправление)
Route::redirect('/back', '/')->name('redirect');

// Используется, если никакой маршрут не подошел. Размещать в самом низу
Route::fallback(function () {
    return 'Страницы не существует';
});
```
Так же можно сделать разграничение описания маршрутов по нескольким файлам (добавим файлы в папке `\routes\`:   
`admin.php` и `user.php`).
Далее зарегистрируем их в файле `\bootstrap\app.php`
```php
// было
web: __DIR__.'/../routes/web.php',

// стало
web: 
    [
        __DIR__.'/../routes/web.php',
        __DIR__.'/../routes/user.php',
        __DIR__.'/../routes/admin.php',
    ],
```
- Команды **artisan**:  
`php artisan route:list` - для просмотра списка [маршрутов](https://laravel.su/docs/11.x/routing#spisok-vasix-marsrutov)  
`php artisan route:cache` - кеширование маршрутов (обновление кэширования)
- Команды **tinker**:
`Route::has('test')` - проверить маршрут на существование
`Route::is('/posts*'` - проверка пути на существование

</details>






