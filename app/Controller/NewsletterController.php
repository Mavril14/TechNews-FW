<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Db\DBFactory;
use ORM;
/**
 *
 */
class NewsletterController extends Controller
{

  public function addToNewsletter(){
    $EMAIL = $_POST['email'];
    if (isset($EMAIL) && !empty($EMAIL)) {
      $emailRegExpr = preg_match("/^([\w-\.]+@([\w-]+\.)+[\w-]{2,7})$/",$EMAIL);
      if ($emailRegExpr) {
        DBFactory::start();
        $mail_exists = ORM::for_table('newsletter')->where('EMAIL', $EMAIL)->count();

        if ($mail_exists) {
          $result = ['msg' => "Cet email existe dejà"];
        }
        else {
          $newsletter = ORM::for_table('newsletter')->create();
          $newsletter->EMAIL = $EMAIL;
          $newsletter->save();
          $result = ['msg' => "Inscription réussi."];
        }
      }
      else {
          $result = ['msg' => "Cet email est invalide."];
      }
    } else {
          $result = ['msg' => "Veuiller saisir votre adresse mail."];

    }
    $this->showJson($result);
  }
}
