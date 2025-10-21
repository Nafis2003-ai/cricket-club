<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="logbody">
    <!-- <div class="navbar">
        <a href="club.php" class="club">
            <li>Clubs</li>
        </a>
        <a href="player.php">
            <li>Players</li>
        </a>
        <a href="mstatistics.php">
            <li>Match Statistics</li>
        </a>
        <a href="coach.php">
            <li>Coaches</li>
        </a>
        <a href="venue.php">
            <li>Venue</li>
        </a>
        <a href="sponsor.php">
            <li>Sponsors</li>
        </a>
        <a href="login.php">
            <li>Admin Login</li>
        </a>
    </div> -->
    <div class="login">
    <h2>Login</h2>
        <form action="login.php" method="POST" >
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit" name="submit">Login</button>
        </form>
        <h2>Don't have an account? <a href="registration.php">Join now</a></h2>
        <button type="submit" class="backbtn"><a href="index.php">Go Back</a></button>
    </div>
        
    

</body>

</html>
<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from users where user='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            header("location: admin.php");
        } else {
            echo "email does not match";
        }
    } else {
        echo "email does not match";
    }
}

$conn->close();
?>