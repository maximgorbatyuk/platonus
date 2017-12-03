# Platest

Проект для прохождения пробного тестирования

## Сторонние библиотеки
- https://github.com/RobinHerbots/Inputmask
- https://datatables.net/
- doctrine/dbal
- [Fine uploader](https://github.com/FineUploader/php-traditional-server) 

## StackOverFlow Driven Development
- [Ключ](http://stackoverflow.com/questions/23786359/laravel-migration-unique-key-is-too-long-even-if-specified) миграции для MySQL
- Ключ слишком [длинный](https://laravel-news.com/laravel-5-4-key-too-long-error)
- [Авторизация](http://stackoverflow.com/questions/39196968/laravel-5-3-new-authroutes/39197278#39197278)  в laravel 5.3
- [Обновление](http://stackoverflow.com/questions/22405762/laravel-update-model-with-unique-validation-rule-for-attribute) модели с уникальным полем
- [Аякс](https://laracasts.com/discuss/channels/requests/laravel-5-cant-use-ajax-post-request) запросы
- [Как](http://stackoverflow.com/questions/37474887/how-to-use-a-vendor-class-in-laravel) использовать сервер fine-uploader'а
- [Решение](https://laracasts.com/discuss/channels/laravel/parse-error-syntax-error-unexpected-expecting-or-variable-t-variable-in-pathsitevendorlaravelframeworksrcilluminatefoundationhelpersphp-on-line-475) ошибки синтаксиса в либовсом файле
- [Инструкция](http://stackoverflow.com/questions/38104348/install-php-zip-on-php-5-6-on-ubuntu) по установке zip-либы
 - [Как](http://stackoverflow.com/questions/9847177/datatables-width-not-being-set-correctly) сделать таблицу dataTables во всю ширину родителя

## Полезные команды студии/фреймворка
````
php artisan key:generate
php artisan migrate
php artisan ide-helper:models "App\Models\Document"
````

## Создание сервера на деве
- Установить XAMPP (PHP 7 + MySQL)
- Перейти в папку xampp\htdocs
- клонировать с помощью git проект по ссылке https://github.com/maximgorbatyuk/platonus.git
- В файле C:\xampp\apache\conf\extra\httpd-vhosts.conf сделать запись
````
<VirtualHost *:80>
  DocumentRoot "C:\xampp\htdocs\platonus\public"
  ServerAdmin platonus
  <Directory "C:\xampp\htdocs\platonus">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>
````
- Установить [Composer](https://getcomposer.org/)
- Установить зависимости проекта. Перейти в папку приложения и выполнить команду
``
composer update
``
- Создать базу данных через phpmyadmin
- Создать файл .env по примеру файла .env.example
- ввести настройки БД в файл .env
- выполнить команду генерации ключа приложения
``
php artisan key:generate
``
- Прогнать все миграции вверх командой
``
php artisan migrate
``
- ???
- PROFIT?

## Обновление сервера
Инструкция по обновлению сервера из мастера
````
artisan down

composer self-update
composer update

git checkout -f
git pull origin master

artisan migrate --force
artisan cache:clear

rm -rf public/assets
mkdir public/assets

artisan up
````


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
