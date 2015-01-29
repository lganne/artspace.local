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
         'CommandeController_annulerCommand' => [
        'pattern' => '\/annulerCommand',
        'connect' => 'controller\CommandeController:annulerCommand'
        ],
      'CommandeController_historique' => [
        'pattern' => '\/historique',
        'connect' => 'controller\CommandeController:historique'
        ],
          'AdminController_admin' => [
        'pattern' => '\/admin',
        'connect' => 'controller\AdminController:admin'
        ],
          'AdminController_liste' => [
        'pattern' => '\/admin\/liste\/(?P<entite>[a-zA-Z]*)',
        'connect' => 'controller\AdminController:liste',
         'params' =>'entite'
         ],
        'AdminController_supUsers' => [
        'pattern' => '\/admin\/usersSup\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\AdminController:supUsers',
        'params' =>'id'
        ],
          'AdminController_supRubrique' => [
        'pattern' => '\/admin\/supRubrique\/(?P<id>[1-9][0-9]*)',
        'connect' => 'controller\AdminController:supRubrique',
         'params' =>'id'
         ],
          'AdminController_rubEnregistrement' => [
           'pattern' => '\/admin\/rubrique\/enregistrement',
            'connect' => 'controller\AdminController:rubEnregistrement'
           ],
            'AdminController_cdeEnregistrement' => [
           'pattern' => '\/admin\/cde\/enregistrement',
            'connect' => 'controller\AdminController:cdeEnregistrement'
           ],
             'AdminController_form' => [
           'pattern' => '\/admin\/form\/[a-zA-Z0-9\-_\.]+\/(?P<id>[0-9][0-9]*)',
            'connect' => 'controller\AdminController:form',
           'params' =>'id'
         ],
         'AdminController_produitEnregistrement' => [
           'pattern' => '\/admin\/produit\/enregistrement',
            'connect' => 'controller\AdminController:produitEnregistrement'
           ],
         'AdminController_supProduit' => [
         'pattern' => '\/admin\/supProduit\/(?P<id>[1-9][0-9]*)',
         'connect' => 'controller\AdminController:supProduit',
         'params' =>'id'
         ],
           'AdminController_listeCommande' => [
        'pattern' => '\/admin\/listeCommande',
        'connect' => 'controller\AdminController:listeCommande'
         ],
     'AdminController_enregistrementUser' => [
        'pattern' => '\/admin\/user\/enregistrement',
        'connect' => 'controller\AdminController:enregistrementUser'
         ]
    
];