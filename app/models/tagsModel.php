<?php 

function findAllByBookId(\PDO $connexion, int $bookId)
{
    $sql = "SELECT t.id, t.name
            FROM tags t
            INNER JOIN book_tag bt ON t.id = bt.tag_id
            WHERE bt.book_id = :bookId
            ORDER BY t.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':bookId', $bookId);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}