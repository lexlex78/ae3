<?

return array(
    'rules' => array(
        array('url' => '^/test/(\w+)/(\w+)/(\d*)$','run' => '$1/$2','var'=>array('id'=>'$3')),
        array('ajax' => '/shop/(:id)', 'run' => 'ajax/index'),
        array('php' => 'ajax/index'),
        array('get' => 'send="ok"', 'run' => 'ajax/index'),
        array('post' => 'set' ,'run' => 'ajax/index'),
    )
);
