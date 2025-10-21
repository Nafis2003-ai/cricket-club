<?php

include("database.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
    <img src="image/logo.png" alt="" srcset="" style="height: 3vh; margin-right:2rem;" href="index.php">
    <a href="club.php"><li>Clubs</li></a>
    <a href="player.php"><li>Players</li></a>
    <a href="mstatistics.php"><li>Match Statistics</li></a>
<a href="coach.php"><li>Coaches</li></a>
    <a href="venue.php"><li>Venue</li></a>
    <a href="sponsor.php"><li>Sponsors</li></a>
    <a href="login.php"><li>Admin Login</li></a>
</div>
    <div class="login">
        <h2>Register</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" >
        Username<input type="text" name="username">
        Password<input type="password" name="password">
        <button type="submit" name="submit">Register</button>
    </form>
    </div>

</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($username)){
            echo"enter username";
        }
        elseif (empty($password)) {
            echo"enter password";
        }
        else{
            try {
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO users(user,password) values ('$username','$hash')";
                mysqli_query($conn,$sql);
                
                header("location: login.php");
            } catch (mysqli_sql_exception) {
                echo" something is wrong";
            }

        }
    }
    mysqli_close($conn);
?>