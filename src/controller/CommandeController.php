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
    private $command;
    
    public function __construct() {
        $this->produit=new \modele\ProduitManager();
        $this->command=new \modele\CommandeManager();
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
         $total=0;
         $detail=new \modele\DetailCommandes();
         
        if (empty($_SESSION['user']))
        {
            header("Location: http://artspace.local/login"); 
        }
        $idcommand=$this->command->insert($_SESSION['user']);
        foreach ($_SESSION['panier'] as $idproduit)
        {
               $produit=$this->produit->find($idproduit);
              foreach ($produit as $unProduit)
              {
                  $total=$total+$unProduit->prix;
                  $detail->insert($unProduit,$idcommand);
              }
                        
          }
             $this->command->updateTotal($total,$idcommand);
           $_SESSION['panier']=[];
           header('location:http://artspace.local/historique');
           
    }
    
    public function annulerCommand()
    {
        $_SESSION['panier']=[];
        header('location:http://artspace.local/pricing/2');
    }
          
    public function historique()
    {
             $detail=new \modele\DetailCommandes();
              $data=$this->command->commandUser($_SESSION['user'][0]);
              $tabProduit=[];
              foreach ($data as $detailCd)
              {
                  array_push($tabProduit,$detailCd->date_created,$detailCd->total);
                  $idp=$detail->findByCommand($detailCd->id);
                   array_push($tabProduit, $idp);
              }
        //      var_dump($tabProduit);
                $this->view->historique($tabProduit);
    }
        
    
}
