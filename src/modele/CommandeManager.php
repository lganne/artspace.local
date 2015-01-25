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
    
    public function updateTotal($total,$id)
    {
             $req = $this->pdo->prepare("UPDATE commandes set total = :total where id = :idCommande");
            $req->execute(array('total' => $total,'idCommande' => $id)) ;
       //     $this->pdo->query($);
       
    }
    
    public function commandUser($idUser)
    {
         $query = sprintf("
                SELECT *
                FROM `{$this->table}` 
                WHERE users_id=%d order by date_modif DESC", $idUser );
        // gestion des erreurs PDOException
        $stmt = $this->pdo->query($query);
        $data = $stmt->fetchall(\PDO::FETCH_OBJ);
        return $data;
    }
 
    
}
