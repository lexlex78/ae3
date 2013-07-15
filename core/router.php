<?php

class router {

    function __construct() {
        
        $this->run_router();   
        
    }

    function run_router (){
        
        //  обходим все маршруты всех модулей
        foreach (app::$ini->ini['blocks_ini'] as $k=>$v) {
            
            foreach ($v['rules'] as $vv) {
                
            unset($c,$a,$var);
            
            if ($vv['uri']){
                 
                    if(preg_match('~'.$vv['url'].'~',app::$request->uri, $pvar)){
                    $t=explode('/', $vv['run']);
                    if (strstr($t[0],'$')!=FALSE) $t[0]=$pvar[substr($t[0], 1)]; 
                    if (strstr($t[1],'$')!=FALSE) $t[1]=$pvar[substr($t[1], 1)];
                    $c=$t[0];
                    $a=$t[1];
                    foreach ($vv['var'] as $kkk=>$vvv){
                    $var[$kkk]=$pvar[substr($vvv, 1)] ;  
                    }
                                            
                    } else unset($c,$a,$var);
                 
             }
             
             
         if ($c and $a) app::$stack[]=array($k,$c,$a,$var); 
            }
            
        }   
        
        print_a(app::$stack);
        
    }
    
}