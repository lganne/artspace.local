<?php
namespace modele;
/**
 * Description of DetailCommandes
 *
 * @author lganne
 */
class DetailCommandes  extends EntiteManager
{
    protected $table="detailcommandes";
    
    /**
     * 
     * @param typed'object
     */
    public function insert($data,$idCommande)
    {
        //var_dump($data);

      $sql=sprintf("insert into ".$this->table.
             " (`commandes_id`, `reference`, `prix`, `contenu`, `date_created`) values ('%d','%s','%d','%s',NOW())",
                           $idCommande,
                            $data->reference,
                            $data->prix,
                            $data->contenu );
                                    
            $this->pdo->query($sql);
             $idDetail=$this->pdo->lastInsertId();
             return $idDetail;
    }
    
    public function findByCommand($idCd)
    {
        $tab=[];
        $idCd=  intval($idCd);
       $sql=$this->pdo->prepare("select * from detailcommandes where commandes_id= :idCd");
        $sql->execute(array('idCd'=>$idCd));
         $result= $sql->fetchAll(\PDO::FETCH_OBJ);
        
            return $result;
    }
}
