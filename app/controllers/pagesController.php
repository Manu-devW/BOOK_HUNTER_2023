<?php 

namespace app\controllers\pagesController;

use app\models\booksModel;
use app\models\authorsModel;

function homeAction(\PDO $connexion){
    //1 On charge le modèle et on lui demande les livres que l'on met dans $books
    include_once '../app/models/booksModel.php';
    $books = booksModel\findAllPopulars($connexion);

    include_once '../app/models/authorsModel.php';
    $authors = authorsModel\findAllPopulars($connexion);

    //2 On charge la vue pages/home dans $content
    global $content, $title, $books_title, $authors_title;
    $title = "Accueil";
    $books_title = "Popular Books";
    $authors_title = "Popular Authors";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}


    
