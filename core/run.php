<?php

include 'function.php';
include 'request.php';
include 'ini.php';
include 'router.php';
include 'db.php';
include 'language.php';

class app {

    static $ini;
    static $router;
    static $request;

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
 
      
  print_a(self::$request->server);


        echo 'ok';
    }

}