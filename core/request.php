<?php

class request {

    public 
            $uri,
            $get,
            $post,
            $cookie,
            $files,
            $url_array,
            $url_file,
            $url_ext,
            $url_static;

    // public $server;



    function __construct() {

        $this->uri = $_SERVER['REQUEST_URI'];
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);

        $this->array_url();

        //   $this->server = $this->clean($_SERVER);
    }

    private function array_url() {
        $a = explode('?', $this->uri);
        $this->url_static = $a[0];
        $this->url_array= explode('/',substr($a[0], 1));
        $c = explode('.', end($this->url_array));
        if (isset($c[1])){
        $this->url_file = $c[0];
        $this->url_ext = $c[1];
        array_pop($this->url_array);
        }
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