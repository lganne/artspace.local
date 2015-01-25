<?php

namespace controller;
/**
 * Description of AdminController
 *
 * @author lganne
 */
class AdminController 
{
   private $view;
   
   public function __construct() 
  {
      $this->view=new \view\AdminVue() ;
   }
    public function admin()
    {
        $this->view->home();
    }
}
