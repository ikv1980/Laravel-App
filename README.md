# Laravel-App
##### 1.1 Установка через Composer
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
##### 1.2 Разворачивание проекта после скачивания с GitHub
``` conf
# Скачайте проект с GitHub
git clone https://github.com/ikv1980/Laravel-App.git
# Установите зависимости
composer install
# Создайте файл .env (или скопируйте нужный)
cp .env.example .env
# Выполните команду для генерации ключа приложения
# Этот ключ автоматически добавляется в файл .env проекта в переменную APP_KEY.
php artisan key:generate
# Если проект использует базу данных, выполните миграции (fresh - перезапись БД)
php artisan migrate
php artisan migrate:fresh
php artisan migrate:rollback    # откат последних изменений
php artisan migrate:reset       # откат всех миграций
# Для разработки вы можете использовать встроенный сервер
php artisan serve
--host=127.0.0.1    # адрес хоста, на котором будет запущен сервер (localhost)
--port=8080         # порт, который будет использоваться сервером (8000)
--no-reload         # отключает автоматическую перезагрузку сервера при изменении файлов
--quiet             # подавляет вывод сообщений об ошибках и логов в консоль
# Можно запускать и composer run dev, но тут следует учесть, эта команда запускает задачи, определенные в секции scripts файла composer.json
# По умолчанию сервер будет доступен по адресу http://localhost:8000
```
##### 1.3 Рекомендации для разработки
Во время разработки рекомендуется регулярно очищать кеш:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```
Так же можно отключить на время разработки кеш в браузере (Chrome, FireFox):
- Жмем `F12` или `Ctrl + Shift + I` (Windows/Linux);
- В открывшихся инструментах разработчика идем вкладку "Network"(Сеть); 
- На панели инструментов вкладки "Network"  найдите флажок (checkbox) с надписью "Disable cache (while DevTools is open)"  (Отключить кэш (при открытом DevTools)).