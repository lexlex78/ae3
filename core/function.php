<?php
// авто загрузка файлов
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
?>
