<?php

namespace controllers;

use utils\Template;
use models\AuthModel;
use utils\JsonHelpers;
use controllers\base\Web;
use utils\SessionHelpers;
use models\InscriptionModel;

class InscriptionWeb
{
    function redirect($to){
        header("Location: $to");
        die();
    }

    function __construct(){
        $this->InscriptionModel = new InscriptionModel();
    }

    function inscription()
    {
        Template::render("views/global/inscription.php");   
    }

    function newUser($login = "", $password = ""): void
    {
        if(!empty($login) && !empty($password))
        {
            $inscriptionController = new \models\InscriptionModel();
            $requete = $inscriptionController->createAccount($login,$password);
            $this->redirect("/connexion");
        }
        else{
            $this->redirect("/inscription");
        }

    }
    
    function logout(): void
    {
        SessionHelpers::logout();
        $this->redirect("/");
    }
}