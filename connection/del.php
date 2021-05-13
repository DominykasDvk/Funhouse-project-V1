<?php

include "connect.php"; 

$id = $_GET['id']; 

$del = mysqli_query($connect,"DELETE FROM projects where ID = '$id'");

if($del)
{
    mysqli_close($connect);
    header('Location: ../workspace.php'); 
    exit;	
}
else
{
    echo "Error deleting record " . mysqli_error($connect); 
}
