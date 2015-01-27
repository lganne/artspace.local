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
                   $html.='<table border="solid 1 px black">';
                    $html.='<th>Reference</th><th>contenu</th><th>prix</th><th></th>';
               foreach($donne as $Produit)
                {
                    foreach($Produit as $unProduit)
                    {

                        $html.='<tr><td>'.$unProduit->reference.'</td><td>'.$unProduit->contenu.'</td><td>'.$unProduit->prix.'</td><td><a href="/panierSup/'.$i.'">supprimer</a></td></tr>';
                        $i++;
                       }
                }
                 $html.='</table>';
                 $html.=  '<a href="/validCommand">Valider la commande</a>';
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
//         foreach($data as $unproduit)
//         {
//            $html.="<table border=solid 1px green><tr><td>$unproduit->id</td><td>$unproduit->date_created</td><td>  $unproduit->total</td>";
//         
            foreach ($tabdetail as $detail)
            {
                if  (is_array($detail))
                {    
                        if (!empty($detail))
                        { $html.='<table border="solid 1px black"><th>numero</th><th>Nom</th><th>detail</th><th>prix</th>'; }
                        foreach ($detail as $produit)
                       {
                   //         var_dump($produit);
                             $html.='<tr><td>'.$produit->commandes_id.'</td><td>'.$produit->reference.'</td><td>'.$produit->contenu.'</td><td>'.$produit->prix.'</td></tr>';
                       }
                       $html.="</table>";
                 }
                 else 
                 {
                      if (\strpos($detail,"."))
                     {
                         $html.=" <h4>Total : ".$detail."</h4>";
                     }
                     else
                     {
                         $date = new \DateTime($detail);
                         $html.=" <h4>Commande du : ".$date->format('d/m/Y H:i:s')."</h4>";
                     }
                    
                 }
     
 }
                  
         $html.='</div>';
         echo $html;
          $content= ob_get_clean();
          include 'layout.php';
    }
    
}
