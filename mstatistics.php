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
<div class='mstats'>
<?php 


     $sql='
    SELECT 
        m.match_id, 
        hc.club_name AS home_club, 
        m.home_score, 
        ac.club_name AS away_club, 
        m.away_score
    FROM match_score m 
    JOIN club hc ON m.home_id = hc.club_id
    JOIN club ac ON m.away_id = ac.club_id';
    
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            
            echo'<div class="statistics">';
            echo'<div class="names"><b>'.$row['home_club'].'<br>'.$row['away_club'].'</b></div>';
            echo'<div class="stats">'.($row['home_score'] !== null ? $row['home_score'] : 'Still not uploaded').'<br>'.($row['away_score'] !== null ? $row['away_score'] : 'Still not uploaded').'</div>';
            echo'</div> <br>';
            
            
          
        };
    }
    

    mysqli_close($conn);
 ?>
</div>




</body>
</html>