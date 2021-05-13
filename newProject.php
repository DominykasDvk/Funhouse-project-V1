<?php
session_start();
require_once 'connection/connect.php';
if (!@$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight&display=swap" rel="stylesheet">
    <link href="css/newproj.css" rel="stylesheet">
</head>

<body>
    <div class="background"></div>
    <div class="newprojbox">
        <center>
            <h1>NEW PROJECT</h1>
        </center>
        <form action="connection/addProject.php" method="POST">
            <div id="projname">
                <label>Project name</label>
                <input name="name" type="text">
            </div><br>
            <div id="projdes">
                <center><label>Project description</label></center>
                <textarea name="description" type="text"></textarea>
            </div><br>
            <center><button type="submit" id="init">INITIATE</button></center>
        </form>
    </div>
    <div class="theuser">
        <center>
            <h2 class="username"><?= $_SESSION['user']['login'] ?></h2>
        </center>
        <p id="loginmessage">is connected to the system</p>
        <a href="connection/logout.php" class="logout">Logout</a>
    </div>
    <a href="workspace.php"><button class="back2work">
            <h2>BACK</h2>
        </button></a>
    <script src="js/script.js"></script>
</body>

</html>