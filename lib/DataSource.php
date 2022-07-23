<?php
namespace Urenah;
class DataSource
{

    function getConnection()
    {
        $database_username = 'miny';
        $database_password = '';

        $pdo_conn = new \PDO('mysql:host=localhost;dbname=search', $database_username, $database_password);
        return $pdo_conn;
    }
}
?>