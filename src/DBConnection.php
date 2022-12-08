<?php

namespace Sukhrob\DbConnector;

use PDO;
use PDOException;

class DBConnection
{
    private string $db;
    private string $hostname;
    private string $dbname;
    private string $username;
    private string $password;
    private PDO $conn;

    public function __construct($db, $hostname, $dbname, $username, $password)
    {

        $this->db = $db;
        $this->hostname = $hostname;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->conn = new PDO("$this->db:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }

}