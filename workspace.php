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
    <script src="https://kit.fontawesome.com/9d544f030b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="css/style2.css" rel="stylesheet">
</head>

<body>
    <div id="blurbg"></div>
    <div id="theuser">
        <center><h4 class="username"><?= $_SESSION['user']['login'] ?></h4></center>
        <p id="loginmessage">is connected to the system</p>    
        <a href="delete.php" class="d_user" onclick="return confirm('Are you sure? After deletion you will be redirected to home page.')"><i id="delacc" class="fas fa-trash fa-sm"></i></a>
    <a href="connection/logout.php" class="logout">Logout</a>    
    </div>	
	    
    <div class="searchbox">
        <i class="fas fa-search fa-2x"></i>
        <input type="text" id="search" placeholder="FIND PROJECT">
    </div>
    <div id="projheader">
             <h1 id="">Projects list</h1>
            <div id="tableheader">
             <table id="subtable">
              <tr class="theder">
                 <th class="projectrow">Project</th>
                 <th class="description">Description</th>
                 <th class="status">Status</th>
                 <th id="alltasks">All Tasks</th>
                 <th id="remtasks">Remaining Tasks</th>
                 <th id="write"> </th>
                 <th id="delete"> </th>
              </tr>
             </table>
                </div>
    </div>
        <div id="allprojects">
        <table>
<!--               <tr class="theder">
                 <th class="projectrow">Project</th>
                 <th class="description">Description</th>
                 <th class="status">Status</th>
                 <th id="alltasks">All Tasks</th>
                 <th id="remtasks">Remaining Tasks</th>
             </tr>-->

            <?php
            $query = "SELECT * FROM projects";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

            ?>
                    <tr>
                        <td class="name"><a href="tasks.php?id=<?php echo $row['ID'];?>"><?php echo $row["name"]; ?></a></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["status"]; ?></td>
                        <td><?php echo $row["taskQuantity"]; ?></td>
                        <td><?php echo $row["taskLeft"]; ?></td>
                                           
                        
                        <td class="icspace"><a id="edit"  href="connection/edit.php?id=<?php echo $row['ID'];?>"><i class="far fa-edit fa fa-lg"></i></a></td>
                        
                        <td class="icspace"><a href="connection/del.php?id=<?php echo $row['ID']; ?>"><i class="fas fa-trash fa-lg"></i></a></td>
                        <td hidden><?php echo $row["ID"]; ?></td>  
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <center><a href="#" onclick="toggle()" class="newproj"><h2>NEW PROJECT</h2></a></center>
    </div>
    
            <div id="newprojbox">    
            <center><h2>NEW PROJECT</h2></center>
        <form action="connection/addProject.php" method="POST">
            <div id="projname">
                <center><label>Enter the project name</label></center><br>
                <center><input name="name" type="text"></center>                
            </div><br>            
            <div id="projdes">
                <center><label>Enter the project description</label></center>
                <center><textarea name="description"  type="text"></textarea></center>
            </div><br> 
            <center><button type="submit" id="init">INITIATE</button></center>
        </form>                          
            <a href="#" onclick="toggle()" class="back2work">BACK</a>
    </div>    

    
<!--    <div class=" buttons">
        <button>
            <h2>EXPORT TO CSV</h2>
        </button>
    </div>-->

    <script src="js/script.js"></script>
</body>
</html>