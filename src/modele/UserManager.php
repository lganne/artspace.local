<?php

namespace modele;


class UserManager extends \modele\EntiteManager
{

    protected $table = 'users';

//    public function postsUserId($id)
//    {
//        $results = [];
//
//        $query = sprintf("
//                 SELECT p.id, p.title,p.content, u.username, p.user_id, p.excerpt
//                 FROM `%s` as u 
//                 INNER JOIN `posts` as p 
//                 ON p.user_id = u.id
//                 WHERE u.id=%d;
//            ",  $this->table, $id
//        );
//
//        $stmt = $this->pdo->query($query);
//
//        while ($data = $stmt->fetch(\PDO::FETCH_OBJ)) {
//            $results[] = $data;
//        }
//        return $results;
//    }

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
