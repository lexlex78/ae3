<?php
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
