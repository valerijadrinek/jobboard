<?php
class Database {

    public const APPURL = "http://localhost/newApps/udemy/jobboard/api/";

    private ?PDO $conn = null;

    public function __construct(
        private string $host,
        private string $name,
        private string $user,
        private string $password
        ){

    }

    public function getConnectionToDb() : PDO 
    {
        if($this->conn === null) {

            $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8";
            $this->conn = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            

        }

        return $this->conn;

       
    }
}