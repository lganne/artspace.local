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
      $rep=\service\DiverService::verifUser($_SESSION['user']);
      if( $rep==true)
      {
          if ($_SESSION['user'][3]!="administrator")
          {
              header("location:http://artspace.local/");
          }
      }
      else
      {
           header("location:http://artspace.local/");
      }
   }
    public function admin()
    {
        $this->view->home();
    }
    
   
    public function supUsers($id)
    {
        
        $command=new \modele\CommandeManager();
        $tab=$command->commandUser($id);

        if(!empty($tab))
        {
            $_SESSION["mess"]=" Cette utilisateur a passé des commandes, vous ne pouvez pas le supprimer";
           $this->liste("User");
           exit;
        }
        $user=new \modele\UserManager();
        $data=$user->delete($id);
        $this->liste("User");
    }
    
     public function ModifUsers($id)
    {
         // a faire
     }
     
     //******************************   generique **********************************//
     public function liste($entite)
    {
        $nom='modele\\'.$entite.'Manager';
        $user=new  $nom;             //modele\UserManager;
        $data=$user->all();
        $nomVue="liste".$entite;
        $this->view->{$nomVue}($data);
    }
    
    public function suppression($id)
    {
        $uri=  parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $arrayChaine=explode("/",$uri);
        $var=$arrayChaine[3];
        $nom='modele\\'.$var.'Manager';
         $entite=new $nom;
         $data=$entite->delete($id);
          $nomVue="liste".$var;
        $this->liste($var);
    }
}
   