<?php
session_start();
require_once 'connect.php';

$id = $_POST['id'];
$description = $_POST['description'];
$name = $_POST['name'];
$priority = $_POST['priority'];

$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO tasks (projectID, ID, name, description, priority, status, startDate, modifiedDate) VALUES ($id, NULL, '$name', '$description', '$priority', 'todo', '$date', '$date')";
mysqli_query($connect, $sql);
header('Location:' . $_SERVER['HTTP_REFERER']);
