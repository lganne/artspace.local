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
                    . '<td><a href="/admin/usersSup/'.$unUser->id.'">Supprimer</a></td></tr>';
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
                    . '<td><a href="/admin/sup/Produit/'.$unUser->id.'">Supprimer</a></td></tr>';
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
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
        $html.="<table border=solid 1px black><tr><th>Nom</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->title."</td>" . '<td><a href="">Modifier</a></td>'
                    . '<td><a href="/admin/usersSup/'.$unUser->id.'">Supprimer</a></td></tr>';
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
        if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
        $html.="<table border=solid 1px black><tr><th>Nom</th><th></th><th></th></tr>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->date_created."</td>" . '<td><a href="">Modifier</a></td>'
                    . '<td><a href="/admin/usersSup/'.$unUser->id.'">Supprimer</a></td></tr>';
         }
         $html.="</table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
}
