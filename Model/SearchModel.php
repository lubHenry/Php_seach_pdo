<?php
namespace Urenah;

class SearchModel
{

    private $ds;

    private $perPage;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $con = new DataSource();
        $this->ds = $con->getConnection();
    }

    function getCount($search_keyword = "")
    {
        if(!empty($search_keyword)) {
            $sql = 'SELECT * FROM posts WHERE post_title LIKE :keyword OR description LIKE :keyword OR post_at LIKE :keyword';
        } else {
            $sql = 'SELECT * FROM posts';
        }
        $pdo_statement = $this->ds->prepare($sql);
        if(!empty($search_keyword)) {
        $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', \PDO::PARAM_STR);
        }
        $pdo_statement->execute();
        $row_count = $pdo_statement->rowCount();
        return $row_count;
    }

    function getAllPosts($start, $perPage, $search_keyword = "")
    {
        if(!empty($search_keyword)) {
            $sql = 'SELECT * FROM posts WHERE post_title LIKE :keyword OR description LIKE :keyword OR post_at LIKE :keyword ORDER BY id ASC LIMIT ' . $start . ',' . $perPage;
        } else {
            $sql = 'SELECT * FROM posts ORDER BY id ASC LIMIT ' . $start . ',' . $perPage;
        }
        $pdo_statement = $this->ds->prepare($sql);
        if(!empty($search_keyword)) {
            $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', \PDO::PARAM_STR);
        }
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        return $result;
    }
}
