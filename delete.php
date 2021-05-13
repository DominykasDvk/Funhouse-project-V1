<?php
session_start();

include "connection/connect.php"; // konekcijos failiukas

$id = $_POST['id']; // randam id per uzklausos stringa

$del = mysqli_query($connect,"delete from users where login = '".$_SESSION['user']['login']."'"); // delete uzklausa

if($del)
{
    session_unset();
    session_destroy();
    mysqli_close($connect); // uzdarom konekcija
    
    header("location:index.php"); // redirectinam i kur reikia
	//echo '<script type="text/javascript">alert("Istrinta")</script>';// neveikia, nes sesija sunaikinta, todel reiks rasti kita buda pranesimui, manau cookies message.
    exit;	
}
else
{
    echo '<script type="text/javascript">alert("nepavyko istrinti")</script>'; // klaida jei nepavyksta istrinti
}
?>

