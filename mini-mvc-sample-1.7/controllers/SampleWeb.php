<?php

namespace controllers;

use utils\Template;
use utils\JsonHelpers;
use controllers\base\Web;

class SampleWeb extends Web
{
    function home()
    {
        Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
    }
    function about()
    {
        Template::render("views/global/about.php", array("titre" => "A propos", "date" => date("d-m-Y à H:i:s")));   
    }
    function sample($id)
    {
        echo "Vous consulter l'identifiant $id";
    }
}

           