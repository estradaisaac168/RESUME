<?php

namespace Controllers;

use App\Router;
use Models\Level;
use Helpers\Email;
use Models\Contact;
use Models\Profile;
use Models\Knowless;
use Models\Languaje;
use Models\PersonalSkill;

class ErrorController
{
    public static function error404(Router $router)
    {
        $router->render('errors/error404', []);
    }

}
