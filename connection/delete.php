<?php
session_start();
include('connect.php');
$delete = $_SESSION['user']['id'];

$check = "DELETE FROM users WHERE ID = '$delete'";

$del = mysqli_query($connect, $check);

if($del)
{
    session_destroy();
    mysqli_close($connect); // uzdarom konekcija
    header("location:../index.php"); // nukreipimas i pradini
    exit;	
}
else
{
    echo "Error deleting record" . mysqli_error($connect); // Rodom klaida jei nepavyksta istrinti
}
