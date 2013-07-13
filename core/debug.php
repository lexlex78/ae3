<?php
class app_debug {
     
    public $start_time;

    public function get_time()
	{
		list($usec, $seconds) = explode(" ", microtime());
		return ((float)$usec + (float)$seconds);
	}

        public function start_timer()
	{
		$this->start_time = $this->get_time();
	}

	public function end_timer()
	{
		return ($this->get_time() - $this->start_time);
	}

    

}

$app_debug = new app_debug;
  $app_debug->start_timer();
  
  function app_stop() {
      global $app_debug;
         
      echo '<div style="position: fixed;z-index: 99999;
    padding: 6px; bottom:10px;left: 10px;  opacity: 0.7;
    color: #0066FF; background: #fff;
    border: #ccc 1px solid;" >Режим разработки<br>';
echo round($app_debug->end_timer(),6);
echo  ' сек <br>';
echo memory_get_peak_usage();
echo  ' байт <br>';


//$tt='нет';if (app::$db->con==1)$tt='да';
//echo 'БД подключение - '.$tt.'<br>';
//echo 'БД запросов - '.app::$db->i.'<br>';
//echo '<div style="color: #f00;">'.app::$eror.'</div>';
echo "</div>";
  }


  register_shutdown_function('app_stop');
