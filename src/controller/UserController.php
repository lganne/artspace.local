<?php
namespace controller;
/**
 * Description of UserController
 *
 * @author lganne
 */
class UserController 
{
    protected $user;
    protected $vue;
    
    public function __construct()
    {
       $this->user=new \modele\UserManager() ;
       $this->vue=new \view\UserVue();
    }
    
    public function formulaire()
    {
        $this->vue->form();
    }
    public function enregistrement()
    {
    
           if (!empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['password'])  )
          {
               $var=new \service\DiverService();
               $salt=$var->generateRandomString(30);
               $token=$var->generateRandomString(50);
               // on rajoute le salt au mot de passe
               $password=$salt.$_POST['password'].$salt;
               // on crypte le mot de passe
               $pwd=$var->codepassword($password);
               $dat;
               $data=array('username'=>$_POST['login'],'password'=>$pwd,'email'=>$_POST['mail'],'salt'=>$salt,'token'=>$token,'role'=>'visitor');
               $this->user->save($data);
           }
    }
}
