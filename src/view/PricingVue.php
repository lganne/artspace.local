<?php
namespace view;
/**
 * Description of PostVue
 *
 * @author lganne
 */
class PricingVue  
{
    protected $entite;
    
     function liste($menu,$donnee)
    {
        ob_start();
        
                      if ($menu!=null)
                        {
                          echo "<ul>";
                     
                                foreach ($menu as $unlien)
                                {
                                    echo '<li><a href="../pricing/'.$unlien->id.'"/>'.$unlien->title."</a></li>";
                                }
                           echo "</ul>";
                        }        
//             echo '<a href="http://miniblog.local/index.php/post/form">Ajouter un post</a>';
                        if ($donnee!=null)
                        {
                                foreach ($donnee as $unProduit)
                                     {
                                            echo " <div class='blockNoir'><div class=espPricing>";
                                            echo " <h1>".$unProduit->reference."</h1>";
                                            echo '<h2><strong><sup>$</sup>'.$unProduit->prix.'</strong>/Mo</h2>' 
                                                     . '  <p><em>Billed annulary or '.$unProduit->prix.'$ month-to-month</em></p>'    
                                                    . '<br><a href="http://artspace.local/pricing/'.$unProduit->reference.'/'.$unProduit->id.'">en savoir plus</a>'
                                                    . '</div></div>';
                                       }
                        }
      
         $content= ob_get_clean();
          include 'layout.php';
    }
    
    
  function detail ($produit)
  {
       ob_start();
         
                if($produit!=null)
                  {
                      foreach ($produit as $unProduit)
                      {
                          echo "<div class=espPricing>";
                          echo " <div class='blockNoir'>";
                                            echo " <h1>".$unProduit->reference."</h1>";
                                            echo '<h2><strong><sup>$</sup>'.$unProduit->prix.'</strong>/Mo</h2>' 
                                                     . '  <p><em>Billed annulary or '.$unProduit->prix.'$ month-to-month</em></p></div>'  ; 
                                            echo '<ul class="listePricing">'
                                                      .'<li>'.$unProduit->contenu.'</li>';
                                                   echo  '</ul></div>';
                      }
                         $content=  ob_get_clean();
                           include 'layout.php';
                  }
    }
}
