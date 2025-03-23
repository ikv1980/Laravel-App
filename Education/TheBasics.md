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

`php artisan down` - перевод в режим обслуживания  
`php artisan up` - возобновление работы
Настройка фильтра страниц для режима обслуживания в файле `\bootstrap\app.php`
```php
// список доступных URL
$middleware->preventRequestsDuringMaintenance(except: ['admin*', 'test']);
```

---
### 1. Контроллеры (Controllers)
<details>
<summary>Подробнее (`app\Http\Controllers`)</summary>

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
### 2. Маршрутизация (Route)
<details>
<summary>Подробнее(`routes`)</summary>

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

---
### 3. Посредники (Middleware)
<details>
<summary>Подробнее (`app\Http\Middleware`)</summary>

Официальная документация [тут](https://laravel.com/docs/11.x/middleware), русскоязычная [тут](https://laravel.su/docs/11.x/middleware).  
Посредник создается через командную строку командой и хранятся в каталоге `\app\Http\Middleware`
```php
php artisan make:middleware LogMiddleware
```
**Посредники (middleware)**:  
- непосредственная регистрация на маршруте  
```php
// в файле `routes\web.php`
Route::get('/test', [TestController::class, 'index'])->name('test')->middleware(\App\Http\Middleware\LogMiddleware::class);
```
- глобальная регистрация посредника   
```php
// в файле `bootstrap/app.php`
->withMiddleware(function (Middleware $middleware) {
    $middleware->append(\App\Http\Middleware\LogMiddleware::class);
})
```
- удаление глобального посредника
```php
// в файле `bootstrap/app.php`
->withMiddleware(function (Middleware $middleware) {
    $middleware->remove(Illuminate\Foundation\Http\Middleware\TrimStrings::class);
})
```
- регистрация alias и затем устанавливаем на маршрут
```php
// в файле `bootstrap/app.php`
$middleware->alias([
    'my_log' => LogMiddleware::class,
]);
// в файле `routes\web.php`
Route::middleware(['my_log'])->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('blog');
    Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
    Route::put('blog/{blog}/like', [BlogController::class, 'like'])->name('blog.like');
});
```
- настройки глобального посредника
```php
->withMiddleware(function (Middleware $middleware) {
    // настройки режима обслуживания
    $middleware->preventRequestsDuringMaintenance(except: ['admin*', 'test']);
})
```



В файле `.ENV` указываем какие логи необходимо писать
- **debug**: Все сообщения (по умолчанию)  
- **info**: Только информационные сообщения и выше  
- **notice**: Только заметки и выше  
- **warning**: Только предупреждения и выше  
- **error**: Только ошибки и выше  
- **critical**: Только критические ошибки и выше  
- **alert**: Только экстренные сообщения  
- **emergency**: Только чрезвычайные ситуации  

*Очистка логов через консоль*
- `echo "" > storage/logs/laravel.log`
- 
</details>

---
### 4. Отображение (Views)
<details>
<summary>Подробнее (`resources\views`)</summary>

Полезный ресурс для разработки [https://cdnjs.com/](https://cdnjs.com/)  
**CDN** — это распределённая сеть серверов, которая позволяет доставлять контент пользователям быстрее за счёт использования серверов, расположенных ближе к конечному пользователю.
Вместо загрузки библиотек на сервер, можно просто подключить их через URL.

</details>
