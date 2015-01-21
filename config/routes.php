<?php

return [
    
    'DefaultController_affiche' => [
        'pattern' => '\/',
        'connect' => 'controller\DefaultController:affiche'
    ],
    'PricingController_detail' => [
        'pattern' => '\/pricing\/[a-zA-Z0-9\-_\.]+\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\PricingController:detail',
        'params' =>'id'
    ],
     'PricingController_liste' => [
        'pattern' => '\/pricing\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\PricingController:liste',
         'params' =>'id'
    ],
    'PanierController_user' => [
        'pattern' => '\/user\/[a-zA-Z0-9\-_\.]+\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\PanierController:user',
        'params' =>'id'
    ]
];