# Laravel-App
##### 1.1 Установка через Composer; 
- Прежде чем создавать приложение Laravel, необходимо установить [PHP](https://php.net/), [Composer](https://getcomposer.org/) и установщик [Laravel](https://github.com/laravel/installer). Кроме того, следует установить [Node и NPM](https://nodejs.org/), чтобы можно было компилировать ресурсы внешнего интерфейса приложения.
После всех приготовленний разворачиваем проект командой
`laravel new lara-app` - тут выбираем вариант развертывания.

После установки в .ENV установить параметры подключения к БД. Например:
``` env
DB_CONNECTION=mysql
DB_HOST=555.555.55.55
DB_PORT=3306
DB_DATABASE=lara_app
DB_USERNAME=root
DB_PASSWORD=password
```
__Запуск сервера(останов):__
```
composer run dev
Ctrl + C
```
