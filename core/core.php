<?php

function __autoload($class_name) {
    $a = explode('_', $class_name);
    include app::$ini['site_path'] . 'moduls/' . $a[0] . '/' . $a[1] . '.php';
}

// печать массива
function print_a($a) {

    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

class app {

    static $ini;

// Старт приложения
    function run() {


        self::$ini = new ini;
        self::$ini->load();
        print_a(self::$ini->ini);
      //  self::$ini->save_ini('app/ini.php');

        


        echo 'ok';
    }

}

class ini {
    public $ini;
// загружаем в массив ini файл

    function load_ini($path) {
        return include $path;
    }

// сохроняем массив в ini файл

    function save_ini($ini) {
        file_put_contents($path, '<? return ' . var_export($ini, true).';');
    }
    
    // загрузка всех ини приложения
    function load () {
     $this->ini=$this->load_ini ('app/ini.php');
    foreach ($this->ini['blocks'] as $v) {
    $this->ini['blocks_ini'][$v]=  $this->load_ini ('app/blocks/'.$v.'ini.php');   
    }
    }

}