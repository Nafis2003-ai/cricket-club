<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="background">
    <!-- navbar start -->
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
<!-- navbar end -->
<div class="subnav">
    <a href="player.php"><li>All Player</li></a>
    <a href="bowler.php"><li>Bowler</li></a>
    <a href="batsman.php"><li>Batsman</li></a>
</div>

<!-- data show -->
 <div class="tab">
 <?php 
 echo "<table class='tabl' style='border-collapse: collapse; width: 70%;'>";
 echo "<thead>
         <tr>
             <th>Player ID</th>
             <th>Player Name</th>
             <th>Average Score</th>
             <th>Strike Rate</th>
             <th>Total Run</th>

         </tr>
       </thead>";
 echo "<tbody>";

     $sql='SELECT * FROM player,batsman WHERE player.player_id=batsman.player_id';
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["player_id"] . "</td>";
            echo "<td>" .$row["player_name"] . "</td>";
            echo "<td>" .$row["average_score"] . "</td>";
            echo "<td>" .$row["strike_rate"] . "</td>";
            echo "<td>" . $row['total_run'] . "</td>";

            echo "</tr>";
            
          
        };
    }
    
    echo "</tbody>";
    echo"</table>";
    
 ?>
 </div>


<!-- data show end -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>