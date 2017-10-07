<?php
namespace App\Model;
use PDO, PDOException;

class Database
{
    protected $dbh;
    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=atomic_project_b69", "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}