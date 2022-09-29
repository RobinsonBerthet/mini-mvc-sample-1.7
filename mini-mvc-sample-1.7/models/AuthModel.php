<?php
namespace models;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateur', 'id');
    }
    
    public function login(string $login, string $password): mixed
    {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE login = ?');
        $stmt->execute([$login]);
        $user= $stmt->fetch(\PDO::FETCH_ASSOC); 

        if (password_verify($password, $user['password'])) {
            return $login;
        } else {
            return null;
        }
    }
    function getInfoUser($login){
        $stmt = $this->pdo->prepare("SELECT id, login, password FROM utilisateur WHERE login = ?");
        $stmt -> execute([$login]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}