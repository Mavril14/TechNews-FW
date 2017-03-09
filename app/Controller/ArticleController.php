<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Db\DBFactory;
use Model\Shortcut;
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
    $FEATUREDIMAGEARTICLE =  $_POST['image'];
    $IDCATEGORIE = $_POST['categorie'];
    $IDAUTEUR = $_POST['auteur'];
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
    $article->IDARTICLE;
    $slug = Shortcut::generateSlug($article->TITREARTICLE);

    $this->redirectToRoute("default/article",["id" => $IDARTICLE, "slug" => $slug]);
    # code...
  }
  public function editArticle()
  {
    DBFactory::start();
    $categories = ORM::for_table("view_articles")->distinct()->select('LIBELLECATEGORIE')->find_many();
    $this->show('default/editArticle', ['categorie' => "Business", 'categories4form'=> $categories]);
  }
}
