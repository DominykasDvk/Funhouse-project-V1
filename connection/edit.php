<?php

include "connect.php";

$id = $_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM projects where ID='$id'");

$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $edit = mysqli_query($connect, "UPDATE projects SET name='$name', description='$description' WHERE ID='$id'");

    if ($edit) {
        mysqli_close($connect);
        header("location:../workspace.php");
        exit;
    } else {
        echo mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/9d544f030b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../css/style2.css" rel="stylesheet">
</head>
<div id="editprojbox">
    <center>
        <h2>EDIT PROJECT</h2>
    </center>
    <form method="POST">
        <div id="projname">
            <center><label>Change project name</label></center><br>
            <center><input name="name" type="text" value="<?php echo $data['name'] ?>" Required></center>
        </div><br>
        <div id="projdes">
            <center><label>Edit project description</label></center>
            <center><textarea name="description" type="text" Required><?php echo $data['description'] ?></textarea></center>
        </div><br>
        <center><input id="upd" type="submit" name="update" value="Update"></center>
    </form>
    <a href="../workspace.php" class="back2work">BACK</a>
</div>
<script src="js/script.js"></script>