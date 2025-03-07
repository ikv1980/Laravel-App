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

## Тема 7. Роутинг и [Маршрутизация](https://laravel.su/docs/11.x/routing)

---
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















### 1. Создание [контроллера](https://laravel.su/docs/11.x/controllers) через artisan. 
<details>
<summary>Подробнее</summary>

Сервис-провайдер создается через командную строку командой

```apacheconf 
php artisan make:controller UserController
```

При создании провайдер сразу регистрируется в файле `..\bootstrap\providers.php`

</details>

---
### 2. Настройка сервис-провайдера
<details>
<summary>Подробнее</summary>

При создании сервис-провайдер TestServiceProvider сохраняется по пути `\app\Providers\TestServiceProvider.php`

```php
<?php

namespace App\Providers;

use App\Services\Test;use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('test', function ($app) {
           return new Test(config('test'));
        });
    }

    public function boot(): void
    {
    }
}
```
</details>

---
### 3. Создание фасада для сервис-провайдера
<details>
<summary>Подробнее</summary>

Фасад создается вручную по пути `\app\Facades\TestFacade.php`

```php
<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'test'; // Это должно соответствовать ключу, указанному в bind()
    }
}
```
далее его нужно зарегистрировать в файле `\config\app.php`

```php
    'aliases' => [
        // Другие алиасы...

        'Test' => \App\Facades\TestFacade::class,
    ],
```
</details>

---
### 4. Создание самого сервиса
<details>
<summary>Подробнее</summary>

Создаем пользовательский сервис (класс Test) по адресу `\app\Services\Test\Test.php`

```php
<?php

namespace App\Services\Test;

class Test
{
    public function __construct(
        protected array $config = [],
    ) {}

    public function config(string $key)
    {
        return $this->config[$key] ?? null;
    }
}
```
</details>

---
### 5. Создание файла конфигурации сервиса
<details>
<summary>Подробнее</summary>

Файл конфигурации создается (при необходимости) по адресу `\config\test.php`

```php
<?php

return [
    'first' => env('EXAMPLE_FIRST', 'empty'),   # переменная окружения
    'second' => env('EXAMPLE_SECOND', 'empty'), # переменная окружения
];
```
</details>

---
### 6. Добавление переменных окружения
<details>
<summary>Подробнее</summary>

Переменные окружения добавляются в файлы `.env` и в `.env.example` по адресу `\config\test.php`

```apacheconf
TEST_FIRST=KONSTANTIN
TEST_SECOND=IVANOV
```
</details>

---

## Тема 7. (Роутинг)[] и маршрутизация
