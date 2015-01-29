<?php
namespace view;
/**
 * Description of PanierVue
 *
 * @author lganne
 */
class PanierVue 
{
  
    public function liste($donne)
    {    ob_start();
            $html= '<br><br><br><div class="container">';
         
         $i=1;
           if (empty($donne))
           {
               $html.="<h3>Votre panier est vide</h3>";
           }
            else 
            {
                $cpt=0;
                   $html.='<table class="table">';
                    $html.='<thead><tr><th>Reference</th><th>contenu</th><th>prix</th><th></th></tr></thead><tbody>';
               foreach($donne as $Produit)
                {
                    foreach($Produit as $unProduit)
                    {

                        $html.='<tr><td>'.$unProduit->reference.'</td><td>'.$unProduit->contenu.'</td>'
                                . '<td>'.$unProduit->prix.'</td>'
                                . '<td><a href="/panierSup/'.$i.'">supprimer</a></td></tr>';
                        $i++;
                        $cpt+=$unProduit->prix;
                       }
                }
                $html.='<tr><td></td><td>Total</td><td>'.$cpt.' $ </td></tr>';
                 $html.='</tbody></table>';
                 $html.= '<ul class="pager">';
                 $html.=  '<li class="previous"><a href="/validCommand">Valider </a></li>';
                 $html.= '<li class="previous"><a href="/annulerCommand">Annuler</a></li></ul>';
            }
                 $html.='</div>';
       echo $html;
     
       $content= ob_get_clean();
          include 'layout.php';
    }
    
    public function historique($tabdetail)
    {
         ob_start();
         $i=0;
          $html= '<br><br><br><div class="container">';
          foreach ($tabdetail as $detail)
            {
                
                if  (is_array($detail))
                {    
                        if (!empty($detail))
                        { 
                            $html.=' <table class="table table-hover">'
                                    . '<thead><th>Numero</th><th>Nom</th><th>Detail</th><th>Prix</th></thead><tbody>';
                         }
                        foreach ($detail as $produit)
                       {
                            $html.='<tr><td>'.$produit->commandes_id.'</td><td>'.$produit->reference.'</td><td>'.$produit->contenu.'</td><td>'.$produit->prix.'</td></tr>';
                        }
                       $html.="</tbody></table>";
                 }
                 else 
                 {
                      if (\strpos($detail,"."))
                     {
                         $html.=" <label>Total : ".$detail."</label><br>";
                     }
                     else
                     {
                         $date = new \DateTime($detail);
                         $html.=" <label>Commande du : ".$date->format('d/m/Y H:i:s')."</label><br>";
                     }
                    
                 }
    }
          $html.='</div>';
         echo $html;
          $content= ob_get_clean();
          include 'layout.php';
    }
    
}
