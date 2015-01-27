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
        $html.="<table border=solid 1px black><tr><th>Nom</th><th>E-mail</th><th>Date de creation</th><th>Role</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->username."</td><td>".$unUser->email."</td>"
                    . "<td>".$unUser->date_created."</td>"
                    . "<td>".$unUser->role."</td>"
                    . '<td><a href="">Modifier</a></td>'
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
        $html.="<table border=solid 1px black><tr><th>Nom</th><th>detail</th><th>Prix</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->reference."</td>"
                    . "<td>".$unUser->contenu."</td>"
                    . "<td>".$unUser->prix."</td>"
                    . '<td><a href="">Modifier</a></td>'
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
            $html.="<tr><td>".$unUser->title."</td>" . '<td><a href="/admin/Rubrique/'.$unUser->id.'">Modifier</a></td>'
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
        $html.='<a href="http://artspace.local/admin/ajoutComande/0">Ajouter</a>';
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
        $html.="<table border=solid 1px black><tr><th>Nom</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->date_created."</td>" . '<td><a href="">Modifier</a></td>'
                    . '<td><a href="/admin/supCommande/'.$unUser->id.'">Supprimer</a></td></tr>';
         }
         $html.="</table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
    
    public function rubrique($data)
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
                 $html.='<input type="hidden" name="id" value="'.$rub->id.'" >';
                $html.='Nom<input type="text" name="titre" value="'.$rub->title.'" >';
            }
       }
        $html.='<input type="submit" name="submit" value="valider" >';
       $html.='</form></div>';
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
}
