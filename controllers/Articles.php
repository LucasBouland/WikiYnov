<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 09/05/2016
 * Time: 10:18
 */

require "models/Article.php";

class Articles
{

    public static function form_article(){
        require "views/articles/Add_article.php";
    }

    public function ajout_article(){
        if(!empty($_POST['title']) && !empty($_POST['article']) && $_POST['theme']!=0){
            Article::add_article($_POST['title'],$_POST['article'],$_POST['theme']);
            require 'views/Home.php';
        }
        else Articles::form_article();
    }

    public static function view_articles($choix = 0){
        $articles=Article::all_affiche($choix);
        require "views/articles/Recherche_article.php";
    }

    public static function search_articles(){
        if (isset($_POST['searching'])) {
            $choix = $_POST['searching'];
            Articles::view_articles($choix);
        }
    }

    public static function afficher_article(){
        require "views/articles/Article.php";
    }

    public static function delete_article(){
        Article::delete();
        require 'views/articles/Deleted.php';
    }
}