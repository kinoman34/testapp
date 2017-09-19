# PHP Test Application without MVC framework's

Простое тестовое приложение для проверки текущего уровня навыков PHP
- [TestApp](https://github.com/kinoman34/testapp)

# Автор
- [Мистер Серый](https://github.com/kinoman34/)

# Для установки вам потребуется **GIT** и **Сomposer**

```sh
$ git clone https://github.com/kinoman34/testapp.git
$ cd testapp
$ php composer.phar install
```

# Далее работаем с БД

Обязательно не забудьте создать БД с названием "testapp"

# А так же доступы к вашей БД

В файле конфигурации App/Config.php необходимо добавить свои доступы к БД

```php
private $dbParams; /* DB params */ 

function __construct()
{
    // Init DB connection On Doctrine ORM
    $this->host = 'localhost';
    $this->login = '';
    $this->password = '';
    $this->driver = 'mysql';
```
# Если все было сделано правильно

TestApp - должен заработать и предложить вам усатановику, жмите на Install и приложение само развернет все необходимые ему штуки )))

# Composer и зависимости

Фреймворки по условиям юзать было нельзя, но все же что бы упростить и  ускорить процесс я решил подтянуть несколько полезных библиотек.

А именно: 

- [PHPRouter](https://github.com/dannyvankooten/PHP-Router) - простой маршрутизатор
- [TWIG](https://github.com/twigphp/Twig) - довольно клевый шаблонизатор
- [Illuminate Database](https://github.com/illuminate/database) - и вполне себе норм ORM

Совсем ничего не юзать было бы просто неудобно и долго (да и глупо как то)

# Вобщем то это все

Спасибо что заглянули!
