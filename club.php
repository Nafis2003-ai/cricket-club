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
<body class="background">
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
<div class="tab">
<?php 
 echo "<table class='tabl' style='border-collapse: collapse; width: 70%;'>";
 echo "<thead>
         <tr>
             <th>Club ID</th>
             <th>Club Name</th>
             <th>Location</th>
             <th>Date of Establishment</th>

         </tr>
       </thead>";
 echo "<tbody>";

     $sql='SELECT * FROM club';
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$row["club_id"] . "</td>";
            echo "<td>" .$row["club_name"] . "</td>";
            echo "<td>" .$row["location"] . "</td>";
            echo "<td>" .$row["established_date"] . "</td>";

            echo "</tr>";
            
          
        };
    }
    
    echo "</tbody>";
    echo"</table>";
    mysqli_close($conn);
 ?>
 </div>
</body>
</html>