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

## Тема 6. Создание [Cервис-провайдеров](https://laravel.su/docs/11.x/providers) и [Фасадов](https://laravel.su/docs/11.x/facades) для него:

---
### 1. Создание сервис-провайдера через artisan. 
<details>
<summary>Подробнее</summary>

Сервис-провайдер создается через командную строку командой

```apacheconf 
php artisan make:provider TestServiceProvider
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
        // bind - каждый раз создается новый объект
        // singleton - объект создается только один раз
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
далее его нужно зарегистрировать в файле `\app\Providers\TestServiceProvider.php` в методе `register()`

```php
    // Регистрация фасада
    $this->app->booted(function () {
        class_alias(\App\Facades\TestFacade::class, 'Test');
    });
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
