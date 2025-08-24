<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "globleng_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>