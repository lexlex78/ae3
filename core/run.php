<?php

$temp_debug = include'app/ini.php';
if ($temp_debug['debug'] == 1) {
    error_reporting(E_ALL);
    include 'debug.php';
} else {
    error_reporting(0);
}



include 'function.php';
include 'request.php';
include 'ini.php';
include 'router.php';
include 'db.php';
include 'language.php';

class app {

    /** @var ini */
    public static $ini;
    
    /** @var request */
    public static $request ;

    /** @var router */
    public static $router;
    
    public static $stack;

    

// Старт приложения
    function run() {

        // загружаем все ини файлы
        self::$ini = new ini;

        // разбираем и обробатывем запрос
       self::$request = new request;

        // загружаем все роутеры
       self::$router = new router;

        // print_a(self::$ini->ini);
        // работа с базой
        // кеширование
        //язык
        //доступы
        // запуск очереди на выполнение (стек выполнения)


         print_a(self::$stack);




        echo 'ok';
    }

}