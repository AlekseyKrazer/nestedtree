# nestedtree
Разветвленное дерево с Doctrine

# Установка

Инструкция по установке.

PHP должно быть не ниже 7.1 

1) Заходим в config/config.php и выбиваем актуальные данные: имя бд, юзер, пароль, хост

2) Заходим в корень каталога и выполняем команду:
php composer.phar install

3) После установки, так же из корня выполняем команду выполнения миграций
./vendor/bin/doctrine-migrations migrate

P.S. composer сразу залил в проект, чтоб не заморачивались установкой, если нет.
