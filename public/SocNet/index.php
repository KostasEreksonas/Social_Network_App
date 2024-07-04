<?php
require_once 'config.php';
require_once 'Database.php';

$conn = new Database();
$conn->query("INSERT INTO test VALUES (NULL, 'Darius', 'darius@gmail.com', 50)");
$conn->execute();
$name = 'KostasEreksonas';
$conn->query("SELECT * FROM test where name = '$name'");
$conn->execute();
$result = $conn->resultSet();
var_dump($result);
echo '<br>';
echo 'Name: ' . $result[0]->name;
echo '<br>';
echo 'Email: ' . $result[0]->email;
echo '<br>';
echo 'Age: ' . $result[0]->age;
echo '<br>';
