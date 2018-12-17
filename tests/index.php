<?php

require '../vendor/autoload.php';

$cookies = \Rabbit\Http\Cookies\Cookie::getInstance();

$cookies->add(new \Rabbit\Http\Cookies\CookieData('test', rand(0, 8)));

$cookies->get('test')->setExpiration(time()+50);

//var_dump($cookies->get('test'));

var_dump($_COOKIE);