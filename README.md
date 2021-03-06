Launcher
===========

A service launcher using a Symfony DependencyInjection Component.

[![Build Status](https://travis-ci.org/kumatch/php-launcher.png?branch=master)](https://travis-ci.org/kumatch/php-launcher)

Install
-----

    $ composer require kumatch/launcher


Example
-----

```php
<?php

use Kumatch\Launcher;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator());
$loader->load('/path/to/services.yml');

$service = $container->get('myapp_service'); // basic usage for DependencyInjection Container

$launcher = Launcher::createMethodLauncher($container);

$service = $launcher->getMyappService();  // gets service by specific method.

$launcher = Launcher::createPropertyLauncher($container);

$service = $launcher->MyappService;  // gets service by specific property.
```


Rules of property/method for getting service
--------------------------------------------

| service id | property | method |
| ------------- | ------------- | ----- |
| request      | $launcher->Request | $launcher->launchRequest() |
| mysql_session_storage | $launcher->MysqlSessionStorage | $launcher->launchMysqlSessionStorage() |
| symfony.mysql_session_storage | $launcher->Symfony_MysqlSessionStorage | $launcher->launchSymfony_MysqlSessionStorage() |

This camelization provides the Symfony DependencyInjection Component.



See also
-------

* [kumatch/launcher-generator](https://github.com/kumatch/php-launcher-generator)


License
--------

Licensed under the MIT License.

Copyright (c) 2014 Yosuke Kumakura

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
