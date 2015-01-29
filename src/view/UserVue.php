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
         $html.=  ' <form  method="post" action="/enregistrement" class="form-horizontal" role="form">';
         $html.='<div class="form-group">';
         $html.='<label for="login">Login:</label>';
          $html.= "<input type='text' class='form-control' name='login' placeholder='Enter login' required></div>";
           $html.='<div class="form-group">';
           $html.='<label for="mail">E mail:</label>';
          $html.= "<input type='email' class='form-control' name='mail' placeholder='Enter Email' required></div>";
          $html.='<div class="form-group">';
          $html.='<label for="pwd">Password:</label>';
           $html.= "<input type='password' class='form-control' name='password' placeholder='Enter password' required> </div>";
           $html.= "<div class='form-group'>"
                   . "<label for='pwd2'>Confirmer le password:</label>"
                   . " <input type='password' class='form-control' name='password2' required></div>";
          $html.= "<input  type='submit' name='ok'  value='valider'  class='btn btn-info'>";           
          $html.="</form></div>";
            echo $html;
            $content=  ob_get_clean();
             include 'layout.php';
           
    }
    
    public function formLogin()
    {
         ob_start();
        $html='<br><br><div class="container">';
        $html.=  ' <form  method="post" action="/loginValidation" class="form-horizontal" role="form">';
         $html.='<div class="form-group">';
         $html.='<label for="login">Login:</label>';
          $html.= "<input type='text' class='form-control' name='login' placeholder='Enter login' required></div>";
           $html.='<div class="form-group">';
          $html.='<label for="pwd">Password:</label>';
           $html.= "<input type='password' class='form-control' name='password' placeholder='Enter password' required> </div>";
         $html.= "<input type='submit' name='ok'  value='valider' class='btn btn-info'>";           
         $html.="</form></div>";
          
          echo $html;
         $content=  ob_get_clean();
         include 'layout.php';
    }
    
    
}
