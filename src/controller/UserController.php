<?php
namespace controller;
/**
 * Description of UserController
 *
 * @author lganne
 */
class UserController 
{
    protected $user;
    protected $vue;
    
    public function __construct()
    {
       $this->user=new \modele\UserManager() ;
       $this->vue=new \view\UserVue();
    }
    
    public function formulaire()
    {
        $this->vue->form();
    }
    public function enregistrement()
    {
    
           if (isset($_POST['ok']))
          {
                  echo  $_POST['login'];
           }
    }
}
