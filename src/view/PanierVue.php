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
            $html.='<table border="solid 1 px black">';
            $html.='<th>Reference</th><th>contenu</th><th>prix</th><th></th>';
            //var_dump($donne);
       foreach($donne as $Produit)
       {
           foreach($Produit as $unProduit)
           {
                          
               $html.='<tr><td style="display: none;">'.$unProduit->id.'</td><td>'.$unProduit->reference.'</td><td>'.$unProduit->contenu.'</td><td>'.$unProduit->prix.'</td><td><a href="">supprimer</a></td></tr>';
           }
       }
       $html.='</table>';
       echo $html;
       echo '<a href="">Valider la commande</a></div>';
       $content= ob_get_clean();
          include 'layout.php';
    }
    
}
