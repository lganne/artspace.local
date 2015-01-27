<?php
namespace modele;
/**
 * Description of ProduitManager
 *
 * @author lganne
 */
class ProduitManager extends EntiteManager
{
    protected $table="produits";
    
   public function findby($id)
    {
        $results = [];
   $query = sprintf(' SELECT *  FROM `%s` WHERE rubriques_id = :id', $this->table);
   // on securise la requete avec prepare
    $stmt=$this->pdo->prepare($query);
    $stmt->execute(array(':id'=>$id));
       
    while ($data = $stmt->fetch(\PDO::FETCH_OBJ)) 
   {
            $results[] = $data;
    }
        return $results;
    }
    
public function insert($data)
    {
        $sql = "insert into {$this->table}(rubriques_id,reference,prix,contenu,date_created,date_modif)"
        . " value (:rubrique,:ref,:prix,:contenu,NOW(),NOW())";
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(':rubrique'=>$data["rubrique"],
            ':ref'=>$data["reference"],
            ':prix'=>$data["prix"],
            ':contenu'=>$data["contenu"]));
        
    }
    
    public function update($data)
    {
        $sql = "update {$this->table} set rubriques_id= :rubrique ,reference=:ref,prix=:prix,contenu=:contenu,date_modif=NOW()"
        . "where id= :id";
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(':rubrique'=>$data["rubrique"],
            ':ref'=>$data["reference"],
            ':prix'=>$data["prix"],
            ':contenu'=>$data["contenu"],
            ':id'=>$data['id']));
    }
}
