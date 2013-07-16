<?

return array(
    'rules' => array( 
        array('uri' => '.*','run' => 'moadul/modul'),
        array('uri' => '^/test/(\w+)/(\w+)/(\d*)$','run' => '$1/$2','var'=>array('id'=>'$3')),
        array('ajax' => '/shop/', 'run' => 'ajax/index'),
        array('php' => 'ajax/index'),
        array('get' => 'send="ok"', 'run' => 'ajax/index'),
        array('post' => 'set' ,'run' => 'ajax/index'),
        )
);
