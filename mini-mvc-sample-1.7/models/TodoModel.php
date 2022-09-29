<?php
namespace models;

use PDO;
use models\base\SQL;
use utils\SessionHelpers;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
    function ajouterTodo($texte)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (texte) VALUES (?)");
        $stmt->execute([$texte]);
    }
    function supprimerListe($id){
        $stmt = $this->pdo->prepare("DELETE FROM `todos` WHERE id = ? AND termine = 1");
        $stmt->execute([$id]);
    }
    function afficheTodo($id){
        $stmt = $this->pdo->prepare("SELECT id FROM `todos` WHERE termine = 1");
        $stmt->execute([$id]);
    }
}