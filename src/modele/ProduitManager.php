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
    
    public function query($query) {
        echo 'a faire';
    }
}
