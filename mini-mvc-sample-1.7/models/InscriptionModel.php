<?php
namespace models;

use models\base\SQL;

class InscriptionModel extends SQL
{
    public function __construct()
    {
        parent::__construct('utilisateur', 'id');
    }
    
    public function createAccount(string $login, string $password)
    {
        $mdp = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare('INSERT INTO `utilisateur`(`login`, `password`) VALUES (?, ?)');
        $stmt->execute([$login, $mdp]);
        $user= $stmt->fetch(\PDO::FETCH_ASSOC); 
    }

}