# Platest

Проект для прохождения пробного тестирования

## Сторонние библиотеки
- https://github.com/RobinHerbots/Inputmask
- https://datatables.net/
- doctrine/dbal
- [Fine uploader](https://github.com/FineUploader/php-traditional-server) 

## StackoverFlow Driven Development
- [Ключ](http://stackoverflow.com/questions/23786359/laravel-migration-unique-key-is-too-long-even-if-specified) миграции для MySQL
- Ключ слишком [длинный](https://laravel-news.com/laravel-5-4-key-too-long-error)
- [Авторизация](http://stackoverflow.com/questions/39196968/laravel-5-3-new-authroutes/39197278#39197278)  в laravel 5.3
- [Обновление](http://stackoverflow.com/questions/22405762/laravel-update-model-with-unique-validation-rule-for-attribute) модели с уникальным полем
- [Аякс](https://laracasts.com/discuss/channels/requests/laravel-5-cant-use-ajax-post-request) запросы
- [Как](http://stackoverflow.com/questions/37474887/how-to-use-a-vendor-class-in-laravel) использовать сервер fine-uploader'а

## Полезные команды студии/фреймворка
``
php artisan ide-helper:models "App\Models\Document"
``

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
