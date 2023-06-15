<?php 
namespace app\models\authorsModel;

function findAllPopulars(\PDO $connexion )
{
    $sql = "SELECT a.*, AVG(n.note) AS notation, a.*
            FROM authors a
            JOIN books b ON b.author_id = a.id
            LEFT JOIN users_notations n ON n.book_id = b.id
            GROUP BY a.id
            ORDER BY notation DESC
            LIMIT 3
            ;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
