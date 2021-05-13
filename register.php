<?php
session_start();
if (@$_SESSION['user']) {
    header('Location: workspace.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Spectral+SC&display=swap" rel="stylesheet">
</head>

<body>
    <form action="connection/signup.php" method="POST" enctype="multipart/form-data">
        <label>REGISTRATION</label><br>
        <input type="email" name="login" placeholder="Enter Your email" pattern="|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i" title="Input your Email" required="required">
        <br>
        <input type="password" name="password" placeholder="Create the password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!%*#?&/\])" title="Must contain at least one number and one uppercase and lowercase letter, special character" required="required">
        <br>
        <input type="password" name="password_confirm" placeholder="Repeat the password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!%*#?&/\])" title="Must contain at least one number and one uppercase and lowercase letter, special character" required="required">
        <br>
        <button type="submit">Join up!</button>
        <br>
        
        <?php
            if(isset($_SESSION['registerError'])){
                echo $_SESSION['registerError'];
            }
        ?>
        
        <h3>Registered user?</h3>
        <a href="index.php">Back to Login</a>
       
    </form>
</body>

</html>