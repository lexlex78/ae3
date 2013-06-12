<?php
// include vs re

// клас замера времени работы скрипта
require 'timer.php';
$timer = new timer();
$timer->start_timer();

$a=10000;

for ($index = 0; $index < $a; $index++) {
 
    include '../core/core.php';   
    
}


// выыод времени работы
echo  $timer->end_timer().'<br>';

$timer->start_timer();

for ($index = 0; $index < $a; $index++) {
 
    
    require '../core/core.php'; 
    
}

echo  $timer->end_timer().'<br>';

echo "ok";

