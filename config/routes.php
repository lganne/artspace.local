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
        'UserController_inscription' => [
        'pattern' => '\/inscription',
        'connect' => 'controller\UserController:inscription'
      
    ],
     'UserController_enregistrement' => [
        'pattern' => '\/enregistrement',
        'connect' => 'controller\UserController:enregistrement'
     ],
    'UserController_login' => [
        'pattern' => '\/login',
        'connect' => 'controller\UserController:login'
     ],
    'UserController_loginValidation' => [
        'pattern' => '\/loginValidation',
        'connect' => 'controller\UserController:loginValidation'
     ],
     'UserController_logout' => [
        'pattern' => '\/logout',
        'connect' => 'controller\UserController:logout'
     ],
     'CommandeController_ajoutPanier' => [
        'pattern' => '\/ajoutPanier\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\CommandeController:ajoutPanier',
        'params' =>'id' 
       ],
         'CommandeController_Panier' => [
        'pattern' => '\/Panier',
        'connect' => 'controller\CommandeController:Panier'
        ],
    'CommandeController_panierSup' => [
        'pattern' => '\/panierSup\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\CommandeController:panierSup',
        'params' =>'id'
        
        ],
          'CommandeController_validCommand' => [
        'pattern' => '\/validCommand',
        'connect' => 'controller\CommandeController:validCommand'
        ],
      'CommandeController_historique' => [
        'pattern' => '\/historique',
        'connect' => 'controller\CommandeController:historique'
        ]
    
];