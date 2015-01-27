<?php
namespace view;
/**
 * Description of AdminVue
 *
 * @author lganne
 */
class AdminVue
{
    
    public function home()
    {
        ob_start();
         $html= '<br><br><br><div class="container">';
          $html.= 'admin</div>';
        echo $html;
        $content= ob_get_clean();
          include 'layout_admin.php';
    }
    
     public function listeUser($data)
    {
        ob_start();
        $html='<br><br><div class="container">';
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
         $html.=  '<a href="/admin/form/User/0">Ajouter</a>';
        $html.="<table border=solid 1px black><tr><th>Nom</th><th>E-mail</th><th>Date de creation</th><th>Role</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->username."</td><td>".$unUser->email."</td>"
                    . "<td>".$unUser->date_created."</td>"
                    . "<td>".$unUser->role."</td>"
                    . '<td><a href="/admin/form/User/'.$unUser->id.'">Modifier</a></td>'
                    . '<td><a href="/admin/supUser/'.$unUser->id.'">Supprimer</a></td></tr>';
        }
        $html.="</table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php';
    }
    
    public function listeProduit($data)
    {
        ob_start();
        $html='<br><br><div class="container">';
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
        $html.=  '<a href="/admin/form/Produit/0">Ajouter</a>';
        $html.="<table border=solid 1px black><tr><th>Nom</th><th>detail</th><th>Prix</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->reference."</td>"
                    . "<td>".$unUser->contenu."</td>"
                    . "<td>".$unUser->prix."</td>"
                    . '<td><a href="/admin/form/Produit/'.$unUser->id.'">Modifier</a></td>'
                    . '<td><a href="/admin/supProduit/'.$unUser->id.'">Supprimer</a></td></tr>';
        }
         $html.="</table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php';
    }
    
    public function listeRubrique($data)
    {
        ob_start();
        $html='<br><br><div class="container">';
         $html.='<a href="/admin/Rubrique/0">Ajouter</a>';
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
        $html.="<table border=solid 1px black><tr><th>Nom</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->title."</td>" . '<td><a href="/admin/form/Rubrique/'.$unUser->id.'">Modifier</a></td>'
                    . '<td><a href="/admin/supRubrique/'.$unUser->id.'">Supprimer</a></td></tr>';
         }
         $html.="</table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
    
    public function listeCommande($data)
    {
        ob_start();
        $html='<br><br><div class="container">';
        $html.='<a href="/admin/form/Commande/0">Ajouter</a>';
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
        $html.="<table border=solid 1px black><tr><th>Nom</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->date_created."</td>" . '<td><a href="/admin/form/Commande/'.$unUser->id.'">Modifier</a></td>'
                    . '<td><a href="/admin/supCommande/'.$unUser->id.'">Supprimer</a></td></tr>';
         }
         $html.="</table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
    
    public function formRubrique($data)
    {
        ob_start();
       $html='<br><br><div class="container">';
       $html.='<form action="/admin/rubrique/enregistrement" method="post" >';
       /*** ajout **/
        if(empty($data))
        {
            $html.='<input type="hidden" name="id" value="0">';
            $html.='Nom<input type="text" name="titre" >';
        }
//        /**** modif **/
         else
       {
             foreach($data as $rub)
            {
                foreach($rub as $unRub)
                {  
                    $html.='<input type="hidden" name="id" value="'.$unRub->id.'" >';
                    $html.='Nom<input type="text" name="titre" value="'.$unRub->title.'" >';
                }
            }
       }
        $html.='<input type="submit" name="submit" value="valider" >';
       $html.='</form></div>';
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
    
    public function formProduit($data)
    {
        ob_start();
       $html='<br><br><div class="container">';
       $html.='<form action="/admin/produit/enregistrement" method="post" >';
       /*** ajout **/
       if(count($data)==1)
        {
            $html.='<input type="hidden" name="id" value="0">';
            $html.='Selectionner la rubrique<select name="rubrique">';
             foreach ($data as $rub)
             {
                 foreach($rub as $unRub)
                 { $html.= '<option value="'.$unRub->id.'">'.$unRub->title.'</option>';}
             }
             $html.='</select><br>';
              $html.='Nom<input type="text" name="reference" required><br>';
             $html.='Detail<textarea  name="contenu" >séparer les élements par des virgules</textarea><br>';
             $html.='Prix<input type="text" name="prix" ><br>';
         }
        else
            {
                  
                  $html.='Selectionner la rubrique<select name="rubrique">';
                    foreach ($data[0] as $rub)
                    {
                        $html.= '<option value="'.$rub->id.'" >'.$rub->title.'</option>';
                     }
                         $html.='</select><br>';
                      foreach($data[1] as $prod)
                      {
                          $html.='<input type="hidden" name="id" value="'.$prod->id.'">';
                          $html.='Nom<input type="text" name="reference"  value="'.$prod->reference.'"required><br>';
                          $html.='Detail<textarea  name="contenu" value="'.$prod->contenu.'">'.$prod->contenu.'</textarea><br>';
                          $html.='Prix<input type="text" name="prix" value="'.$prod->prix.'"><br>';
                      }
                         
             }
         $html.='<input type="submit" name="submit" value="valider" >';
         $html.='</form></div>';
         echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
}
