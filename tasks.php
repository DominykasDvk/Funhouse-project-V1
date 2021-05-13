<?php
session_start();
require_once 'connection/connect.php';
if (!@$_SESSION['user']) {
    header('Location: index.php');
}
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://kit.fontawesome.com/9d544f030b.js" crossorigin="anonymous"></script>
        <link href="css/tasks.css" rel="stylesheet">
</head>

<body>
    <div id="blurbg"></div>
    <div class="searchbox">
        <center>
            <h2>Find Task</h2>
        </center>
        <input type="text" id="filter" placeholder="">
    </div>
    <div id="alltasks">
        <h1>Taskboard</h1>
        <div class="taskboard">
            <div id="todo">
                <h2>Tasks</h2>
                <?php
                $query = "SELECT * FROM tasks WHERE status = 'todo' AND projectID = '$id'";
                $result = mysqli_query($connect, $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                ?>
                        <div class="task" id="taskcard">
                            <form>
                                <label><?php echo $row["ID"]; ?>.</label>
                                <label><?php echo $row["name"]; ?></label>
                            </form>
<!--                            <p><?php echo $row["ID"]; ?></p>-->
<!--                            <p><?php echo $row["name"]; ?></p>-->
                            <p><?php echo $row["description"]; ?></p>
                            <p><?php echo $row["priority"]; ?></p>
                            <p><?php echo $row["startDate"]; ?></p>
                            <p><?php echo $row["modifiedDate"]; ?></p>
                            <div id="editdelete">
                            <a href="connection/editTask.php?id=<?php echo $row['ID']; ?>"><i class="far fa-edit fa fa-lg"></i></a>
                            <a href="connection/delTask.php?id=<?php echo $row['ID']; ?>"><i class="fas fa-trash fa-lg"></i></a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div id="inprogress">
                <h2>Tasks in progress</h2>
                <?php
                $query2 = "SELECT * FROM tasks WHERE status = 'in progress' AND projectID = '$id'";
                $result2 = mysqli_query($connect, $query2);

                if (mysqli_num_rows($result2) > 0) {

                    while ($row2 = mysqli_fetch_array($result2)) {

                ?>
                        <div class="task">
                            <p><?php echo $row2["ID"]; ?></p>
                            <p><?php echo $row2["name"]; ?></p>
                            <p><?php echo $row2["description"]; ?></p>
                            <p><?php echo $row2["priority"]; ?></p>
                            <p><?php echo $row2["startDate"]; ?></p>
                            <p><?php echo $row2["modifiedDate"]; ?></p>
                            <p><a href="connection/editTask.php?id=<?php echo $row2['ID']; ?>">edit</a></p>
                            <p><a href="connection/delTask.php?id=<?php echo $row2['ID']; ?>">delete</a></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div id="done">
                <h2>Completed tasks</h2>
                <?php
                $query3 = "SELECT * FROM tasks WHERE status = 'completed' AND projectID = '$id'";
                $result3 = mysqli_query($connect, $query3);

                if (mysqli_num_rows($result3) > 0) {

                    while ($row3 = mysqli_fetch_array($result3)) {

                ?>
                        <div class="task">
                            <p><?php echo $row3["ID"]; ?></p>
                            <p><?php echo $row3["name"]; ?></p>
                            <p><?php echo $row3["description"]; ?></p>
                            <p><?php echo $row3["priority"]; ?></p>
                            <p><?php echo $row3["startDate"]; ?></p>
                            <p><?php echo $row3["modifiedDate"]; ?></p>
                            <p><a href="connection/editTask.php?id=<?php echo $row3['ID']; ?>">edit</a></p>
                            <p><a href="connection/delTask.php?id=<?php echo $row3['ID']; ?>">delete</a></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <a id="b2proj" href="workspace.php">PROJECTS</a>

    <a href="#" onclick="tasktoggle()" class="newtask">
        <h2>ADD TASK</h2>
    </a>

    <div id="newtaskbox">
        <center>
            <h2>NEW TASK</h2>
        </center>
        <form action="connection/addTask.php" method="POST">
            <div id="taskname">
                <center><label>Task Name</label></center>
                <center><input name="name" type="text"></center>
            </div><br>
            <div id="projdes">
                <center><label>Task Description</label></center>
                <center><textarea name="description" type="text"></textarea></center>
            </div><br>
            <div id="prio">
                <label for="priority">Define priority</label>
                <select name="priority" id="priority">
                    <option value="high">HIGH</option>
                    <option value="medium">MEDIUM</option>
                    <option value="low">LOW</option>
                </select>
            </div><br>
            <br>
            <center><input hidden name="id" value="<?php echo $id; ?>"></center>
            <center><button type="submit" id="addtask">Add Task</button></center>
        </form>
        <a href="#" onclick="tasktoggle()" class="back2work">CANCEL</a>
    </div>
    <script src="js/script.js"></script>
</body>

</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
