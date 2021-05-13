<?php

include "connect.php";

$id = $_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM tasks where ID='$id'");
$date = date('Y-m-d H:i:s');

$projectID = mysqli_query($connect, "SELECT projectID FROM tasks WHERE ID='$id'");
$result1 = mysqli_fetch_array($projectID);
$previousPriority = mysqli_query($connect, "SELECT priority FROM tasks WHERE ID='$id'");
$result2 = mysqli_fetch_array($previousPriority);

$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    $edit = mysqli_query($connect, "UPDATE tasks SET name = '$name', description = '$description', priority = '$priority', modifiedDate = '$date' WHERE ID='$id'");

    if ($edit) {
        header('Location: ../tasks.php?id=' . $result1['projectID']);
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
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../css/style2.css" rel="stylesheet">
</head>
<div>
    <center>
        <h2>EDIT TASK</h2>
    </center>
    <form method="POST">
        <div>
            <center><label>Change task name</label></center><br>
            <center><input name="name" type="text" value="<?php echo $data['name'] ?>" Required></center>
        </div><br>
        <div>
            <center><label>Edit task description</label></center>
            <center><textarea name="description" type="text" Required><?php echo $data['description'] ?></textarea></center>
        </div><br>
        <div>
            <label>Define priority</label>
            <select name="priority" id="priority">
                <option value="" disabled selected><?php echo $result2['priority']; ?></option>
                <option value="high">HIGH</option>
                <option value="medium">MEDIUM</option>
                <option value="low">LOW</option>
            </select>
        </div><br>
        <br>
        <center><input id="upd" type="submit" name="update" value="Update"></center>
    </form>
    <a href="javascript: history.back()" class="back2work">BACK</a>
</div>
<script src="js/script.js"></script>