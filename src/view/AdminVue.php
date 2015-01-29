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
        $html.='<h2>Liste des utilisateurs</h2>';
          $html.=  '<ul class="pager">';
          $html.=  '<li class="previous"><a href="/admin/form/User/0">Ajouter </a></li></ul>';
          $html.='<table class="table table-hover">';
   
        $html.="<thead><tr><th>Nom</th><th>E-mail</th><th>Date de creation</th><th>Role</th><th></th><th></th></tr></thead>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->username."</td><td>".$unUser->email."</td>"
                    . "<td>".$unUser->date_created."</td>"
                    . "<td>".$unUser->role."</td>"
                    . '<td><a href="/admin/form/User/'.$unUser->id.'">Modifier</a></td>'
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
        $html.='<h2>Liste des produits</h2>';
        $html.=  '<ul class="pager">';
        $html.=  '<li class="previous"><a href="/admin/form/Produit/0">Ajouter </a></li></ul>';
        $html.='<table class="table table-hover">';
        $html.="<thead><tr><th>Nom</th><th>detail</th><th>Prix</th><th></th><th></th></tr></thead><tbody>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->reference."</td>"
                    . "<td>".$unUser->contenu."</td>"
                    . "<td>".$unUser->prix."</td>"
                    . '<td><a href="/admin/form/Produit/'.$unUser->id.'">Modifier</a></td>'
                    . '<td><a href="/admin/supProduit/'.$unUser->id.'">Supprimer</a></td></tr>';
        }
         $html.="</tbody></table></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php';
    }
    
    public function listeRubrique($data)
    {
        ob_start();
        $html='<br><br><div class="container">';
        $html.='<h2>Liste des rubriques</h2>';
         $html.=  '<ul class="pager">';
         $html.=  '<li class="previous"><a href="/admin/form/Rubrique/0">Ajouter </a></li></ul>';
           if(!empty( $_SESSION['mess']))
        {
            echo '<p>'.$_SESSION['mess'].'</p>';
            $_SESSION['mess']="";
        }
         $html.='<table class="table table-hover">';
        $html.="<thead><tr><th>Nom</th><th></th><th></th></tr></thead><tbody>";
        foreach ($data as $unUser)
        {
            $html.="<tr><td>".$unUser->title."</td>" . '<td><a href="/admin/form/Rubrique/'.$unUser->id.'">Modifier</a></td>'
                    . '<td><a href="/admin/supRubrique/'.$unUser->id.'">Supprimer</a></td></tr>';
         }
         $html.="</tbody></table></div>";
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
        $html.='<h2>Liste des commandes</h2>';
        $html.='<table class="table table-hover">';
        $html.="<thead><tr><th>Numero</th><th>Login</th><th>Date</th><th>Total</th><th>Status</th></tr></thead><tbody>";
        foreach ($data as $unCde)
        {
            $date = new \DateTime($unCde->date_created);
            $html.="<tr><td>".$unCde->id."</td>"
                    . "<td>".$unCde->username."</td>"
                    . "<td>".$date->format('d/m/Y H:i')."</td>"
                    . "<td>".$unCde->total."</td>"
                    . "<td>".$unCde->status."</td>"
                    . '<td><a href="/admin/form/Commande/'.$unCde->id.'">Modifier</a></td></tr>';
         }
         $html.="</tbody></table></div>";
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
              $html.='<div class="form-group">';
                $html.='<label for="titre">Titre:</label>';
            $html.='<input type="text" class="form-control" name="titre" placeholder=" Nom de la rubrique" required></div>';
        }
//        /**** modif **/
         else
       {
             foreach($data as $rub)
            {
                foreach($rub as $unRub)
                {  
                    $html.='<input type="hidden" name="id" value="'.$unRub->id.'" >';
                    $html.='<div class="form-group">';
                     $html.='<label for="titre">Titre:</label>';
                    $html.= "<input type='texte' class='form-control'  name='titre' value='".$unRub->title."' ></div>";
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
       $html.='<form action="/admin/produit/enregistrement" method="post" class="form-horizontal" role="form">';
       /*** ajout **/
       if(count($data)==1)
        {
            $html.='<input type="hidden" name="id" value="0">';
//            $html.='Selectionner la rubrique<select name="rubrique">';
             $html.='<div class="form-group">';
            $html.='<label for="rubrique">Rubriques</label> <select class="form-control" name="rubrique">';
             foreach ($data as $rub)
             {
                 foreach($rub as $unRub)
                 { $html.= '<option value="'.$unRub->id.'">'.$unRub->title.'</option>';}
             }
             $html.='</select></div>';
             $html.='<div class="form-group">';
             $html.='<label for="Nom">Nom : </label>';
             $html.='<input type="text" name="reference" class="form-control" placeholder=" Nom" required></div>';
             $html.='<div class="form-group">';
             $html.='<label for="Detail">Detail : </label>';
             $html.='<textarea  name="contenu" class="form-control" placeholder="" required >séparer les élements par des virgules</textarea></div>';
             $html.='<div class="form-group">';
             $html.='<label for="Prix">Prix : </label>';
             $html.='<input type="text" name="prix" class="form-control" placeholder="Prix en $" required></div>';
        }
        else
        {
                    $html.='<div class="form-group">';
                    $html.='<label for="name">Rubriques</label> <select class="form-control" name="rubrique">';
                     foreach($data[1] as $prod)
                      {
                          foreach ($data[0] as $rub)
                            {
                                if($prod->rubriques_id==$rub->id)
                                {
                                  $html.= '<option value="'.$rub->id.'" selected>'.$rub->title.'</option>';
                                }
                                else 
                                {   
                                  $html.= '<option value="'.$rub->id.'">'.$rub->title.'</option>';
                                 }
                            }
                            $html.='</select></div>';
                             $html.='<input type="hidden" name="id" value="'.$prod->id.'">';
                            $html.='<div class="form-group">';
                            $html.='<label for="Nom">Nom : </label>';
                            $html.='<input type="text" name="reference"  value="'.$prod->reference.'"  class="form-control" required></div>';
                            $html.='<div class="form-group">';
                            $html.='<label for="Detail">Detail : </label>';
                            $html.='<textarea  name="contenu" value="'.$prod->contenu.'"  class="form-control">'.$prod->contenu.'</textarea></div>';
                            $html.='<div class="form-group">';
                            $html.='<label for="Prix">Prix : </label>';
                            $html.='<input type="text" name="prix" value="'.$prod->prix.'"  class="form-control"></div>';
                      }
           }
          $html.='<input type="submit" name="submit" value="valider" >';
         $html.='</form></div>';
         echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php'; 
    }
    
    /******* user ***/
     public function formUser($data)
    {
         ob_start();
         $html='<br><br><div class="container">';
         $html.='<form action="/admin/user/enregistrement" method="post" class="form-horizontal" role="form">';
          $html.='<div class="form-group">';
         $html.='<label for="login">Login:</label>';
         /*** ajout **/
        if(empty($data))
        {
             $html.='<input type="hidden" name="id" value="0">';
            $html.='<input type="text" name="login" class="form-control" name="mail" placeholder="Enter Login" required >';
            $html.='</div><div class="form-group">';
             $html.='<label for="mail">E mail:</label>';
             $html.= "<input type='email' class='form-control' name='mail' placeholder='Enter Email' required>";
              $html.='</div><div class="form-group">';
              $html.='<label for="pwd">Password:</label>';
              $html.= "<input type='password' class='form-control' name='password' placeholder='Enter password' required> </div>";
             $html.= "<div class='form-group'>"
                   . "<label for='pwd2'>Confirmer le password:</label>"
                   . " <input type='password' class='form-control' name='password2' required></div>";
             $html.= '<div class="form-group">'
                .' <label for="sel1">Select list:</label>'
                 .' <select class="form-control" id="sel1" name="role">'
                .' <option value="visitor">visitor</option>'
                .'<option value="administrator">administrator</option>'
               .' <option value="editor">editor</option></select></div>';
                    
        }
        else
        {
            foreach($data[0] as $user)
            {
                 $html.='<input type="hidden" name="id" value="'.$user->id.'">';
                 $html.='<input type="text" name="login" class="form-control" name="mail" value="'.$user->username.'" required >';
                $html.='</div><div class="form-group">';
                 $html.='<label for="mail">E mail:</label>';
                 $html.= "<input type='email' class='form-control' name='mail' value='".$user->email."' required>";
                  $html.='</div><div class="form-group">';
                 $html.= '<div class="form-group">'
                    .' <label for="sel1">role :</label>'
                     .' <select class="form-control" id="sel1" name="role">';
                    switch ($user->role)
                    {
                        case 'visitor':
                                           $html .= ' <option value="visitor" selected>visitor</option>'
                                                       .'<option value="administrator">administrator</option>'
                                                      .' <option value="editor">editor</option></select></div>';
                                                    break;
                        case 'administrator':
                                             $html .= ' <option value="visitor" >visitor</option>'
                                                       .'<option value="administrator" selected>administrator</option>'
                                                      .' <option value="editor">editor</option></select></div>';     
                                                          break;
                        case 'editor':
                                           $html .= ' <option value="visitor">visitor</option>'
                               .'<option value="administrator">administrator</option>'
                              .' <option value="editor" selected>editor</option></select></div>';
                              break;
                    }
               
            }
            
        }
         $html.= "<input  type='submit' name='ok'  value='valider'  class='btn btn-info'>";     
          $html.="</div></form></div>";
        echo $html;
         $content=  ob_get_clean();
         include 'layout_admin.php';
     }
     
         public function formCommande($data)
    {
             ob_start();
            
            $html='<br><br><div class="container">';
            
          //   $html.='<div class="form-group">';
             foreach ($data[0] as $cde )
             {
                 $html.='<h3>Commande N° '.$cde->id.'</h3></br>';
                $html.='<form action="/admin/cde/enregistrement" method="post" class="form-horizontal" role="form">';
                  $date = new \DateTime($cde->date_created);
                 $html.='<input type="hidden" name="id" value="'.$cde->id.'">';
                 $html.='<div class="form-group">';
                  $html.='<label for="Date">Date:</label>';
              $html.= "<input type='texte' class='form-control' name='mail' value='".$date->format('d/m/Y H:i')."' disabled></div>";
              $html.='<div class="form-group">';
                  $html.='<label for="total">Total:</label>';
              $html.= "<input type='texte' class='form-control' name='mail' value='".$cde->total."' disabled></div>";
              $html.= '<div class="form-group">'
                            .' <label for="sel1">Status:</label>'
                             .' <select class="form-control" id="sel1" name="status">'
                             .' <option value="valider">valider</option>'
                             .'<option value="payer">payer</option>'
                             .' <option value="en attente">en attente</option>'
                            .'<option value="annuler">annuler</option></select></div>';
             }
              $html.= "<input  type='submit' name='ok'  value='valider'  class='btn btn-info'>";
             $html.='</form></div>';
             echo $html;
             $content=  ob_get_clean();
             include 'layout_admin.php';
      }
      
      
      
}
