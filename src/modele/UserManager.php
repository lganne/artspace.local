<?php

namespace modele;


class UserManager extends \modele\EntiteManager
{

    protected $table = 'users';

public function save($tabDonne)
{
     $sql=sprintf("insert into ".$this->table.
             " (username,password,email,salt,token,date_created,date_modif,role) values ('%s','%s','%s','%s','%s',NOW(),NOW(),'%s')",
                           $tabDonne['username'],
                            $tabDonne['password'],
                            $tabDonne['email'],
                            $tabDonne['salt'],
                            $tabDonne['token'],
                            $tabDonne['role']);

                   return  $req=$this->pdo->query($sql);
}

    public function query($password)
    {
        $results = [];
        $query = sprintf("SELECT * FROM `users` WHERE password='%s'", $password);

        $stmt = $this->pdo->query($query);
        while ($data = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $results[] = $data;
        }
        return $results;
    }

}