<?php

class router {

    function __construct() {
        
        $this->run_router();   
        
    }

    function run_router (){
        
        //  обходим все маршруты всех модулей
        foreach (app::$ini->ini['blocks_ini'] as $k=>$v) {
            
            foreach ($v['rules'] as $vv) {
                
            //     
            if ($vv['url']){
                 
                    if(preg_match('~'.$vv['url'].'~',app::$request->uri, $pvar)){
                    $t=explode('/', $vv['run']);
                    if (strstr($t[0],'$')!=FALSE) $t[0]=$pvar[substr($t[0], 1)]; 
                    if (strstr($t[1],'$')!=FALSE) $t[1]=$pvar[substr($t[1], 1)];
                    $c=$t[0];
                    $a=$t[1];
                    $var=1;
                                            
                    }
//                    print_a ($pvar);
//                    echo $k.'<hr>';
                 
             } else unset($c,$a,$var);
             
             echo $c.' - '.$a;
             print_a ($var);
             echo '<hr>';
             
                  
            }
            
        }   
        
        
        
    }
    
}