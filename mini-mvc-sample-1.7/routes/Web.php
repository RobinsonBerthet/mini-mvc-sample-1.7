<?php

namespace routes;

use routes\base\Route;
use controllers\Account;
use controllers\AuthWeb;
use controllers\TodoWeb;
use controllers\VideoWeb;
use utils\SessionHelpers;
use controllers\SampleWeb;
use controllers\InscriptionWeb;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();
        $todo = new TodoWeb();
        $conn = new AuthWeb();
        $inscription = new inscriptionWeb();
        
        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/todo/liste', [$todo, 'liste']);
            Route::Add('/todo/ajouter', [$todo, 'ajouter']);
            Route::Add('/todo/terminer', [$todo, 'terminer']);
            Route::Add('/todo/supprimer', [$todo, 'supprimer']);
            Route::Add('/sample/{id}', [$main, 'sample']);
        }

        Route::Add('/connexion', [$conn, 'connexion']);
        Route::Add('/deconnexion', [$conn, 'deconnexion']);
        Route::Add('/AuthWeb', [$conn, 'Auth']);

        Route::Add('/inscription', [$inscription, 'inscription']);
        Route::Add('/inscription/ajout', [$inscription, 'newUser']);

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

