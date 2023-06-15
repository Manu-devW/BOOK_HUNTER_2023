<?php 
namespace app\models\booksModel;

function findAllPopulars(\PDO $connexion)

{
    $sql = "SELECT bk.id AS book_id, a.firstname, a.lastname, bk.title, bk.resume, AVG(un.note) AS notation
    FROM books bk
    LEFT JOIN users_notations un ON un.book_id = bk.id
    JOIN authors a ON bk.author_id = a.id
    JOIN categories c ON bk.category_id = c.id
    GROUP BY bk.id
    ORDER BY notation DESC
    LIMIT 3;
    ";

    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

