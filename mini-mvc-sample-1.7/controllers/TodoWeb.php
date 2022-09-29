<?php
namespace controllers;

use utils\Template;
use models\TodoModel;
use controllers\base\Web;
use utils\SessionHelpers;

class TodoWeb extends web
{
    private $todoModel;

    function __construct(){
        $this->todoModel = new TodoModel();
    }
    function liste()
    {
        $todos = $this->todoModel->getAll();
        Template::render("views/todos/liste.php", array("todos" => $todos));
    }
    function ajouter($texte="")
    {

        if ($texte != '')
        {
            $utilisateur = SessionHelpers::getConnected();
            $this->todoModel->ajouterTodo($texte);
            
        }
        $this->redirect("./liste");

    }
    function terminer($id = ''){
        if($id != ""){
            $this->todoModel->marquerCommeTermine($id);
        }
    
        $this->redirect("./liste");
    }
    function supprimer($id = '', $termine = ''){
        if($id != "" && $termine = 1){
            $this->todoModel->supprimerListe($id);
        }
    
        $this->redirect("./liste");
    }
    function affichage($id = '', $termine = '')
    {
        if($id != "" && $termine = 1){
            $this->todoModel->afficheTodo($id);
        }
    }

    
}