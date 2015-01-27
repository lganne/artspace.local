<?php

namespace modele;
/**
 * Description of RubriquesManager
 *
 * @author lganne
 */
class RubriqueManager extends EntiteManager
{
    
   protected  $table="rubriques";
   
    public function insert($titre)
    {
        $sql = "insert into {$this->table}(title) value (:titre)";
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(':titre'=>$titre));
        
    }
    
    public function update($id,$titre)
    {
        $sql = "update {$this->table} set title= :titre where id= :id";
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(':titre'=>$titre,':id'=>$id));
    }
}
