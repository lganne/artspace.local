<?php

namespace controller;
/**
 * Description of DefaultController
 *
 * @author lganne
 */
class DefaultController {
    
  protected $entite;

    public function __construct($entite) 
    {
        $this->entite = $entite;
    }
    
    public function affiche()
    {
        header('Location: http://artspace.local/tour.php');
    }
    
    
}
