<?php

namespace Controller;

use \W\Controller\Controller;
use \W\View\Plates;
use Model\Db\DBFactory;
use Model\Shortcut;
use Controller\DefaultController;
use ORM;
use Eventviva\ImageResize;
/**
 *
 */
class ArticleController extends Controller
{
  use Shortcut;

  public function addArticle()
  {
    $TITREARTICLE = $_POST['title'];
    $CONTENUARTICLE = $_POST['message'];
    $SPOTLIGHTARTICLE = $_POST['spotlight'];
    $SPECIALARTICLE = $_POST['special'];
    $FEATUREDIMAGEARTICLE =  $_FILES["image"]["name"];
    $IDCATEGORIE = $_POST['categorie'];
    $IDAUTEUR = $_POST['auteur'];
    //traitement image
    $target_dir = 'assets/images/product/';
    $target_file = $target_dir . basename($FEATUREDIMAGEARTICLE);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;


        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
            //
            $FEATUREDIMAGEARTICLE = "default.jpg";
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          copy($_FILES["image"]["tmp_name"], $target_file);
          $height = $check[1];
          $width = $check[0];
          if ($height > 550 || $width > 1000) {
            $image = new ImageResize($target_file);
            $image->resizeToBestFit(1000, 550);
            $image->save($target_file);
            }
        }

    //stockage db
    DBFactory::start();
    $article = ORM::for_table('article')->create();
    $article->TITREARTICLE = $TITREARTICLE;
    $article->CONTENUARTICLE = $CONTENUARTICLE;
    $article->SPOTLIGHTARTICLE = $SPOTLIGHTARTICLE;
    $article->FEATUREDIMAGEARTICLE = $FEATUREDIMAGEARTICLE;
    $article->IDCATEGORIE = $IDCATEGORIE;
    $article->IDAUTEUR = $IDAUTEUR;
    $article->SPECIALARTICLE = $SPECIALARTICLE;

    $article->save();
    $IDARTICLE = $article->IDARTICLE;
    $slug = Shortcut::generateSlug($article->TITREARTICLE);
    $this->redirectToRoute("default_article",["id" => $IDARTICLE, "slug" => $slug]);
    # code...
  }
  public function editArticle()
  {
    DBFactory::start();
    $categories = ORM::for_table("categorie")->find_many();
    $this->show('default/editArticle', ['categorie' => "Business", 'categories4form'=> $categories]);
  }
}
