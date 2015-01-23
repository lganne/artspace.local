<?php
namespace modele;
/**
 * Description of CommandeManager
 *
 * @author lganne
 */
class CommandeManager extends EntiteManager
{
    protected $table="commandes";
    
    
    public function insert()
    {
    $user=$_SESSION['user'][0];
        $sql=sprintf("INSERT INTO `commandes`( `users_id`, `total`, `date_created`, `date_modif`) "
                . "VALUES ('%s','%d',NOW(),NOW())",$user,0);
               
         $this->pdo->query($sql);
        $idCommand=$this->pdo->lastInsertId();
        return $idCommand;
        
    }
 
    
}
