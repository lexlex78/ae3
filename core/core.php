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
    static $router;
    static $request

// Старт приложения
    function run() {
        // разбираем и обробатывем запрос
        self::$request = new request;
        
        // загружаем все ини файлы
        self::$ini = new ini;
        self::$ini->load();
        // print_a(self::$ini->ini);
        
        // работа с базой
        
        
        // кеширование
        
        // загружаем все роутеры
        self::$router = new router;

        //язык
        
        //доступы
        
        
       // запуск очереди на выполнение (стек выполнения)




        echo 'ok';
    }

}

class request {
    
    public $get = array();
    public $post = array();
	public $cookie = array();
	public $files = array();
	public $server = array();

    function __construct() {
        
        $this->get = $this->clean($_GET);
    	$this->post = $this->clean($_POST);
		$this->requestT = $this->clean($_REQUEST);
		$this->cookie = $this->clean($_COOKIE);
		$this->files = $this->clean($_FILES);
		$this->server = $this->clean($_SERVER);
	        
    }
    
    public function clean($data) {
        if (is_array($data)) {
	  		foreach ($data as $key => $value) {
				unset($data[$key]);
				
	    		$data[$this->clean($key)] = $this->clean($value);
	  		}
		} else { 
	  		$data = htmlspecialchars($data, ENT_COMPAT);
		}

		return $data;
	}

}

class router {

    function __construct() {
     app::$request= new  request
     
    }
    
    

}

class ini {

    public $ini;
    public $site_dir;
    public $site_url;

// загружаем в массив ini файл
    public function __construct() {
        $this->site_dir = $_SERVER['DOCUMENT_ROOT'];
        $this->site_url = $_SERVER['HTTP_HOST'];
    }

    function load_ini($path) {
        return include $path;
    }

// сохроняем массив в ini файл

    function save_ini($ini) {
        file_put_contents($path, '<? return ' . var_export($ini, true) . ';');
    }

    // загрузка всех ини приложения
    function load() {
        $this->ini = $this->load_ini($this->site_dir . '/app/ini.php');
        foreach ($this->ini['blocks'] as $v) {
            $this->ini['blocks_ini'][$v] = $this->load_ini($this->site_dir . '/app/blocks/' . $v . '/ini.php');
        }
    }

}
