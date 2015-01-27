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
    
    public function supRubrique($id)
    {

        $produit=new \modele\ProduitManager();
       $tabprod= $produit->findby($id);
        if(!empty($tabprod))
        {
            $_SESSION["mess"]=" Cette rubrique a des produits associé, vous ne pouvez pas le supprimer";
           $this->liste("Rubrique");
           exit;
        }
              $entite=new \modele\RubriqueManager();
            $data=$entite->delete($id);
             $this->liste("Rubrique");
    }
    
    public function Rubrique($id)
    {
        $data=[];
        if($id!=0)
        {
            $rub=new \modele\RubriqueManager();
            $data=$rub->find($id);
        }
        $this->view->rubrique($data);
    }
    
    public function rubEnregistrement()
    {
       $rub=new \modele\RubriqueManager();
       // modification  
       if ($_POST['id']!=0)
       {
           $rub->update($_POST['id'], $_POST['titre']);
         }
         //ajout
     else
       {
            $rub->insert($_POST['titre']) ;
       }
        $this->liste("Rubrique");
    }
}
   