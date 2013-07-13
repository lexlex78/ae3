<?php

class request {
    public $uri;
    public $get;
    public $post;
    public $cookie;
    public $files;

    // public $server;



    function __construct() {
        
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);
        //   $this->server = $this->clean($_SERVER);
    }

    public function get_cookie() {
        if (!isset($this->cookie))
            $this->cookie = $this->clean($_COOKIE);
    }

    public function get_files() {
        if (!isset($this->files))
            $this->files = $this->clean($_FILES);
    }

    public function clean($data) {

        //заменить array_map
        //stripslashes

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

    public function is_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

}