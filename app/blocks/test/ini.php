<?
return array(
    'rules' => array( 
        array('uri' => '.*','run' => 'moadul/modul'),
        array('uri' => '^/test/(\w+)/(\w+)/(\d*)$','ajax'=>false,'run' => '$1/$2','get' => 'send=5','var'=>array('id'=>'$3')),
        array('php' => 'php/index'),
        array('get' => 'send=5', 'run' => 'get/index'),
        array('post' => 'set' ,'run' => 'post/index'),
        )
);
