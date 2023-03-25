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

class ProfileController
{

    public static function index(Router $router)
    {

        // obtengo el id del perfil
        $profile = Profile::find(1);
        $personalSkills = PersonalSkill::where('profile_id', $profile->id);
        $knowless = Knowless::where('profile_id', $profile->id);


        $query = "SELECT lan.id, lan.languaje, lev.id, lev.level";
        $query .= " FROM profiles as pro  ";
        $query .= " INNER JOIN languajes as lan ";
        $query .= " ON pro.id = lan.profile_id  ";
        $query .= " INNER JOIN levels as lev ";
        $query .= " ON lan.id = lev.languaje_id  ";
        $query .= " WHERE pro.id =  '{$profile->id}' ";

        $levForLans = Languaje::SQL($query);

        $router->render('profile/index', [
            'profile' => $profile,
            'personalSkills' => $personalSkills,
            'knowless' => $knowless,
            'levForLans' => $levForLans
        ]);
    }

    public static function certificates(Router $router)
    {
        $router->render('profile/certificates', []);
    }

    public static function contact(Router $router)
    {

        $contact = new Contact;
        $alerts = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contact->syncUp($_POST);

            // Validar
            $alerts = $contact->validateEmail();

            // $email = new Email($_POST['company'], $_POST['name'], $_POST['email'], $_POST['message']);
            if (empty($alerts)) {
                $email = new Email($contact->company, $contact->name, $contact->email, $contact->message);
                $email->sendMessage();

                header('Location: /notification');
            }
        }


        $router->render('contact/contact', [
            'alerts' => $alerts,
            'contact' => $contact
        ]);
    }

    public static function notification(Router $router)
    {
        $router->render('contact/notification', []);
    }
}
