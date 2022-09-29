<?php

namespace controllers;

use utils\Template;
use models\AuthModel;
use utils\JsonHelpers;
use controllers\base\Web;
use utils\SessionHelpers;

class AuthWeb extends web
{


    function __construct(){
        $this->AuthModel = new AuthModel();
    }

    function connexion()
    {
        Template::render("views/global/Connexion.php");   
    }
    function deconnexion()
    {
        session_destroy(); 
        $this->redirect("./");
    }

    function Auth($login = "", $password = ""): void
    {
        if (!empty($login) && !empty($password)) {
            $authController = new \models\AuthModel();
            $requete = $authController->login($login,$password);
            if($requete != null)
            {
                SessionHelpers::init();
                SessionHelpers::login($requete);
                $this->redirect("./todo/liste");
                
            }
            else
            {
                $this->redirect("./connexion");
            }

        }
        Template::render("views/global/Connexion.php");
    }
    
    function logout(): void
    {
        SessionHelpers::logout();
        $this->redirect("/");
    }
}