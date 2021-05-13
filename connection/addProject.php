<?php
session_start();
require_once 'connect.php';

$description = $_POST['description'];
$name = $_POST['name'];

$sql = "INSERT INTO projects (id, name, description) VALUES (NULL, '$name', '$description')";
mysqli_query($connect, $sql);
header('Location: ../workspace.php');
?>