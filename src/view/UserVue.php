<?php
namespace view;
/**
 * Description of UserVue
 *
 * @author lganne
 */
class UserVue {
    
    
    public function form()
    {
         ob_start();
         $html='<br><br><div class="container">';
         $html.=  ' <form  method="post" action="/enregistrement">';
          $html.= " Login :  <input type='text' name='login'  required> <br>";
          $html.= "Password: <input type='password' name='password' required><br>";
           $html.= "Confirmer le password: <input type='password' name='password2' required><br>";
          $html.= "<input type='submit' name='ok'  value='valider'>";           
          $html.="</form></div>";
            echo $html;
            $content=  ob_get_clean();
             include 'layout.php';
             
    }
}
