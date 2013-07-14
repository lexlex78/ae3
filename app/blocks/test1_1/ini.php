<?

return array(
    'rules' => array(
        array('url' => '/test/','run' => 'index/action'),
        array('ajax' => '/shop/(:id)', 'run' => 'ajax/index'),
        array('php' => 'ajax/index'),
        array('get' => 'send="ok"', 'run' => 'ajax/index'),
        array('post' => 'set' ,'run' => 'ajax/index'),
    )
);
