<?php
namespace controller;
/**
 * Description of CommandeController
 *
 * @author lganne
 */
class CommandeController {
    private $produit;
    private $view;
    public function __construct() {
        $this->produit=new \modele\ProduitManager();
         $this->view= new \view\PanierVue();
    }
    
    public function ajoutPanier($id)
    {
            if(!isset($_SESSION['panier'])) 
            {
                $_SESSION['panier']=[];
            }
           array_push ($_SESSION['panier'],$id);
            header("Location: $_SERVER[HTTP_REFERER]" );
    }
    
    public function panier()
    {
        $tabListe=[];
        foreach ($_SESSION['panier'] as $idproduit)
        {
            
              $id=$this->produit->find($idproduit);
              array_push($tabListe,$id);
        }
      //  var_dump($tabListe);
        $this->view->liste($tabListe);
    }
    
    public function panierSup($id)
    {
        unset($_SESSION['panier'][$id]);
      header("Location: $_SERVER[HTTP_REFERER]" );
    }
    
    public function validCommand()
    {
         $command=new \modele\CommandeManager();
         $detail=new \modele\DetailCommandes();
         
        if (empty($_SESSION['user']))
        {
            header("Location: http://artspace.local/login"); 
        }
        $idcommand=$command->insert($_SESSION['user']);
        foreach ($_SESSION['panier'] as $idproduit)
        {
               $produit=$this->produit->find($idproduit);
              foreach ($produit as $unProduit)
              {
                   $idDetail= $detail->insert($unProduit,$idcommand);
              }
              
          }
          
        
    }
}
