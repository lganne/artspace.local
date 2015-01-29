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
//              <!--***************** section  banner *************** -->
     
//                $html=' <section class="blanc"  id="pricing-banner"> <div class="container">'
//                            .'<h1>FREE 14 DAY TRIAL WITH 24/7 SUPPORT</h1><br/>'
//                            .'<a href="#" class="boutonArrondi btNoir">Get Started</a>'
//                            .'</div> </section><div class="container">';
//                 echo $html; 
            echo '</div> </section><div class="container">';
                      if ($menu!=null)
                        {
                          echo '<ul class="pager">';
                     
                                foreach ($menu as $unlien)
                                {
                                   
                                    echo '<li class="previous"><a href="../pricing/'.$unlien->id.'">'.$unlien->title.'</a></li>';
                                }
                           echo "</ul>";
                        }        

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
                        echo "</div>";
      
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
                          echo '<br><br><br><div class="container">';
                           echo  '<ul class="pager">';
                           echo  '<li class="previous"><a href="/ajoutPanier/'.$unProduit->id.'">Ajouter au panier</a></li></ul>';
//                         echo '<a href="http://artspace.local/ajoutPanier/'.$unProduit->id.'">Ajouter au panier</a>';
               //           $_SESSION['page']='pricing/'.$unProduit->reference."/".$unProduit->id;
                         echo "<div class=espPricing>";
                          echo " <div class='blockNoir'>";
                                            echo " <h1>".$unProduit->reference."</h1>";
                                            echo '<h2><strong><sup>$</sup>'.$unProduit->prix.'</strong>/Mo</h2>' 
                                                     . '  <p><em>Billed annulary or '.$unProduit->prix.'$ month-to-month</em></p></div>'  ; 
                                            echo '<ul class="listePricing">';
                                            $contenu=explode(",",$unProduit->contenu);
                                            for($i=0;$i<count($contenu);$i++)
                                            {
                                                     echo '<li>'.$contenu[$i].'</li>';
                                            }
                                             echo '<li><a href="#">24/7 support</a>'
                                                    . '  <div class="pastille">Free </div> </li>';
                                                 
                                                   echo  '</ul></div>';
                      }
                      echo '</div>';
                         $content=  ob_get_clean();
                           include 'layout.php';
                  }
    }
}
