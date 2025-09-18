<?php

final class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "globleng_db";
    public $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            die("Erro na conexão ao banco de dados: " . $this->connection->connect_error);
        }
    }
}

?>