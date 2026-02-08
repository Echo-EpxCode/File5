<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed");
}

$sql = "CREATE DATABASE IF NOT EXISTS php_login_database";
mysqli_query($conn, $sql);

mysqli_select_db($conn, "php_login_database");

$table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);";

mysqli_query($conn, $table);
