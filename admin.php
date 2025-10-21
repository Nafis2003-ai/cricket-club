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
    <!-- accrodian begin -->
    <div class="accordion logbody" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Enter New Player Information
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <!-- form start -->

                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="player_name" name="player_name">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of birth</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile">
                        </div>
                        <div class="mb-3">
                            <label for="matchplay" class="form-label">Matches Played</label>
                            <input type="matchplay" class="form-control" id="matches_played" name="matches_played">
                        </div>
                        <div class="mb-3">
                            <label for="avg_run" class="form-label">Average Run</label>
                            <input type="number" class="form-control" id="avg_run" name="avg_run">
                        </div>
                        <div class="mb-3">
                            <label for="avg_wicket" class="form-label">Average Wicket</label>
                            <input type="number" class="form-control" id="avg_wicket" name="avg_wicket">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="batsman" value="batsman">
                            <label class="form-check-label" for="batsman">
                                Batsman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bowler" value="bowler" checked>
                            <label class="form-check-label" for="bowler">
                                Bowler
                            </label>
                        </div>
                        <div class="batman" id="batman" style="display: none;">
                            <div class="mb-3">
                                <label for="total_run" class="form-label">Total run</label>
                                <input type="number" class="form-control" id="total_run" name="total_run">
                            </div>
                            <div class="mb-3">
                                <label for="strike_rate" class="form-label">Strike Rate</label>
                                <input type="number" class="form-control" id="strike_rate" name="strike_rate">
                            </div>
                        </div>
                        <div class="boler" id="boler" style="display: none;">
                            <div class="mb-3">
                                <label for="total_wicket" class="form-label">Total Wicket</label>
                                <input type="number" class="form-control" id="total_wicket" name="total_wicket">
                            </div>
                            <div class="mb-3">
                                <label for="total_wicket" class="form-label">bowling_average</label>
                                <input type="number" class="form-control" id="total_wicket" name="bowling_average">
                            </div>
                            <div class="mb-3">
                                <label for="economic rate" class="form-label">Economic rate</label>
                                <input type="number" class="form-control" id="economic rate" name="economic_rate">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="psubmit">Submit</button>
                    </form>
                    <!-- form end -->
                </div>
            </div>
        </div>
        <!-- php for player input -->
        <?php
        if (isset($_POST["psubmit"])) {






            $name = $_POST['player_name'];
            $dob = $_POST['dob'];
            $mobile = $_POST['mobile'];
            $matches_played = $_POST['matches_played'];
            $avg_run = $_POST['avg_run'];
            $avg_wicket = $_POST['avg_wicket'];
            $strike_rate = $_POST['strike_rate'] ?? null; // Optional field

            if (isset($_POST['flexRadioDefault'])) {
                $role = $_POST['flexRadioDefault'];
            }

            $total_run = $_POST['total_run'] ?? null;
            $strike_rate = $_POST['strike_rate'] ?? null;
            $total_wicket = $_POST['total_wicket'] ?? null;
            $bowling_average = $_POST['bowling_average'] ?? null;
            $economic_rate = $_POST['economic_rate'] ?? null;


            mysqli_begin_transaction($conn);

            try {

                $psql = "INSERT INTO player (player_name, DOB, mobile) 
                 VALUES ('$name', '$dob', '$mobile')";
                mysqli_query($conn, $psql);

                $player_id = mysqli_insert_id($conn);
                $pssql = "INSERT INTO player_statistics (player_id,matches_played, avg_run, avg_wicket, strike_rate) 
                  VALUES ('$player_id','$matches_played', '$avg_run', '$avg_wicket', '$strike_rate')";
                mysqli_query($conn, $pssql);


                if (isset($role)) {
                    switch ($role) {
                        case 'batsman':
                            $btsql = "INSERT INTO batsman (player_id,average_score, strike_rate, total_run) 
                              VALUES ('$player_id','$avg_run', '$strike_rate', '$total_run')";
                            mysqli_query($conn, $btsql);
                            break;
                        case 'bowler':
                            $blsql = "INSERT INTO bowler (player_id,total_wicket, bowling_average, economic_rate) 
                              VALUES ('$player_id','$total_wicket', '$bowling_average', '$economic_rate')";
                            mysqli_query($conn, $blsql);
                            break;
                    }
                }

                // Commit transaction
                mysqli_commit($conn);
                echo "Data has been stored.";
            } catch (mysqli_sql_exception $e) {
                mysqli_rollback($conn);
                echo "An error occurred: " . $e->getMessage();
            }

            mysqli_close($conn);
        }
        ?>

        <!-- php end for player input -->

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Enter new club information
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label"> Club Name</label>
                            <input type="text" class="form-control" id="club_name" name="club_name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"> Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Established Date</label>
                            <input type="date" class="form-control" id="established_date" name="established_date">
                        </div>

                        <button type="submit" class="btn btn-primary" name="csubmit">Submit</button>
                    </form>
                    <?php
                    if (isset($_POST['csubmit'])) {
                        $club_name = $_POST['club_name'];
                        $location = $_POST['location'];
                        $established_date = $_POST['established_date'];
                        $csql = "insert into club(club_name,location,established_date) values('$club_name','$location','$established_date')";
                        try {
                            mysqli_query($conn, $csql);
                        } catch (mysqli_sql_exception $e) {
                            mysqli_rollback($conn);
                            echo "An error occurred: " . $e->getMessage();
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Enter new manager information
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label"> Manager Name</label>
                                <input type="text" class="form-control" id="manager_name" name="manager_name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"> Contact</label>
                                <input type="number" class="form-control" id="contact" name="contact">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="join_date" name="join_date">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Club ID</label>
                                <input type="number" class="form-control" id="club_id" name="club_id">
                            </div>

                            <button type="submit" class="btn btn-primary" name="msubmit">Submit</button>
                        </form>
                        <?php
                        if (isset($_POST['msubmit'])) {
                            $manager_name = $_POST['manager_name'];
                            $contact = $_POST['contact'];
                            $join_date = $_POST['join_date'];
                            $club_id = $_POST['club_id'];
                            $msql = "insert into manager(manager_name,contact,join_date,club_id) values('$manager_name','$contact','$join_date','$club_id')";
                            try {
                                mysqli_query($conn, $msql);
                            } catch (mysqli_sql_exception $e) {
                                mysqli_rollback($conn);
                                echo "An error occurred: " . $e->getMessage();
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Enter new sponsor information
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label"> Sponsor Name</label>
                                <input type="text" class="form-control" id="sponsor_name" name="sponsor_name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"> contact</label>
                                <input type="number" class="form-control" id="contact" name="contact">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Sponsorship detail</label>
                                <input type="text" class="form-control" id="sponsorship_detail" name="sponsorship_detail">
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label">Club id</label>
                                <input type="text" class="form-control" id="club_id" name="club_id">
                            </div>

                            <button type="submit" class="btn btn-primary" name="ssubmit">Submit</button>
                        </form>
                        <?php
                        if (isset($_POST['ssubmit'])) {
                            $sponsor_name = $_POST['sponsor_name'];
                            $contact = $_POST['contact'];
                            $sponsorship_detail = $_POST['sponsorship_detail'];
                            $club_id = $_POST['club_id'];
                            $ssql = "insert into sponsor(sponsor_name,contact_info,sponsorship_detail,club_id) values('$sponsor_name','$contact','$sponsorship_detail','$club_id')";
                            try {
                                mysqli_query($conn, $ssql);
                            } catch (mysqli_sql_exception $e) {
                                mysqli_rollback($conn);
                                echo "An error occurred: " . $e->getMessage();
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Enter new coach information
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label"> Coach Name</label>
                                    <input type="text" class="form-control" id="coach_name" name="coach_name">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label"> Date of Birth</label>
                                    <input type="date" class="form-control" id="cdob" name="cdob">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label"> mobile</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile">
                                </div>

                                <div class="mb-3">
                                    <label for="dob" class="form-label">Club id</label>
                                    <input type="text" class="form-control" id="club_id" name="club_id">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="head" id="headcoach" value="headcoach">
                                    <label class="form-check-label" for="headcoach">
                                        Head Coach
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary" name="cosubmit">Submit</button>
                            </form>
                            <?php
                            if (isset($_POST['cosubmit'])) {
                                $coach_name = $_POST['coach_name'];
                                $cdob = $_POST['cdob'];
                                $mobile = $_POST['mobile'];
                                $club_id = $_POST['club_id'];
                                $cosql = "insert into coach(coach_name,DOB,mobile,club_id) values('$coach_name','$cdob','$mobile','$club_id')";
                                try {
                                    mysqli_query($conn, $cosql);
                                    $coach_id = mysqli_insert_id($conn);
                                    if (isset($head)) {
                                        switch ($variable) {
                                            case 'headcoach':
                                                $headsql = "insert into head_coach(coach_id,head_id) values('$coach_id','$head_id')";
                                                mysqli_query($conn, $headsql);
                                                break;
                                        }
                                    }
                                } catch (mysqli_sql_exception $e) {
                                    mysqli_rollback($conn);
                                    echo "An error occurred: " . $e->getMessage();
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Enter new match information
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Match date</label>
                                        <input type="date" class="form-control" id="match_date" name="match_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Match time</label>
                                        <input type="time" class="form-control" id="match_time" name="match_time">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Home club ID</label>
                                        <input type="number" class="form-control" id="home_club" name="home_club">
                                    </div>

                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Away club ID</label>
                                        <input type="text" class="form-control" id="away_club" name="away_club">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Venue ID</label>
                                        <input type="text" class="form-control" id="venue_id" name="venue_id">
                                    </div>


                                    <button type="submit" class="btn btn-primary" name="matchsubmit">Submit</button>
                                </form>
                                <?php
                                if (isset($_POST['matchsubmit'])) {
                                    $match_date = $_POST['match_date'];
                                    $match_time = $_POST['match_time'];
                                    $home_club = $_POST['home_club'];
                                    $away_club = $_POST['away_club'];
                                    $venue_id = $_POST['venue_id'];
                                    $matsql = "insert into mtch(match_date,match_time,home_club,away_club,venue_id) values('$match_date','$match_time','$home_club','$away_club','$venue_id')";
                                    try {
                                        mysqli_query($conn, $matsql);
                                        $match_id = mysqli_insert_id($conn);
                                        $masql = "insert into match_score(match_id,home_id,away_id) values('$match_id','$home_club','$away_club')";
                                        mysqli_query($conn, $masql);
                                    } catch (mysqli_sql_exception $e) {
                                        mysqli_rollback($conn);
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Enter new batch information
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Batch Name</label>
                                        <input type="text" class="form-control" id="batch_name" name="batch_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">End date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>

                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Coach ID</label>
                                        <input type="number" class="form-control" id="coach_id" name="coach_id">
                                    </div>


                                    <button type="submit" class="btn btn-primary" name="batsubmit">Submit</button>
                                </form>
                                <?php
                                if (isset($_POST['batsubmit'])) {
                                    $batch_name = $_POST['batch_name'];
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    $coach_id = $_POST['coach_id'];
                                    $batsql = "insert into batch(batch_name,start_date,end_date,coach_id) values('$batch_name','$start_date','$end_date','$coach_id')";
                                    try {
                                        mysqli_query($conn, $batsql);
                                        

                                    } catch (mysqli_sql_exception $e) {
                                        mysqli_rollback($conn);
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headineEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Enter new venue information
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headineEight" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Venue Name</label>
                                        <input type="text" class="form-control" id="venue_name" name="venue_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Location</label>
                                        <input type="text" class="form-control" id="location" name="location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Capacity</label>
                                        <input type="number" class="form-control" id="capacity" name="capacity">
                                    </div>

                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Contact Info</label>
                                        <input type="text" class="form-control"id="contact_info" name="contact_info">
                                    </div>



                                    <button type="submit" class="btn btn-primary" name="vensubmit">Submit</button>
                                </form>
                                <?php
                                if (isset($_POST['vensubmit'])) {
                                    $venue_name = $_POST['venue_name'];
                                    $location = $_POST['location'];
                                    $capacity = $_POST['capacity'];
                                    $contact_info = $_POST['contact_info'];
                                    
                                    $vensql = "insert into venue(name,location,capacity,contact_info) values('$venue_name','$location','$capacity','$contact_info')";
                                    try {
                                        mysqli_query($conn, $vensql);
                                        

                                    } catch (mysqli_sql_exception $e) {
                                        mysqli_rollback($conn);
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headineNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                Push new notice
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headineNine" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
              
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Description</label>
                                        <input type="text" class="form-control" id="description" name="description">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Post Date</label>
                                        <input type="date" class="form-control" id="posted_date" name="posted_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Expire Date</label>
                                        <input type="date" class="form-control" id="expiration_date" name="expiration_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Club ID</label>
                                        <input type="text" class="form-control" id="club_id" name="club_id">
                                    </div>

                            



                                    <button type="submit" class="btn btn-primary" name="notsubmit">Submit</button>
                                </form>
                                <?php
                                if (isset($_POST['notsubmit'])) {
                                   
                                    $description = $_POST['description'];
                                    $posted_date = $_POST['posted_date'];
                                    $expiration_date = $_POST['expiration_date'];
                                    $club_id = $_POST['club_id'];
                                    
                                    $notsql = "insert into notice(description,posted_date,expiration_date,club_id) values('$description','$posted_date','$expiration_date','$club_id')";
                                    try {
                                        mysqli_query($conn, $notsql);
                                        

                                    } catch (mysqli_sql_exception $e) {
                                        mysqli_rollback($conn);
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </div>
                        </div>


                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headineTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Book a ground
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headineTen" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
              
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Booking Date</label>
                                        <input type="date" class="form-control" id="booking_date" name="booking_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Booking Time</label>
                                        <input type="time" class="form-control" id="booking_time" name="booking_time">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Duration(Hour)</label>
                                        <input type="number" class="form-control" id="duration" name="duration">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Venue ID</label>
                                        <input type="text" class="form-control" id="venue_id" name="venue_id">
                                    </div>

                            



                                    <button type="submit" class="btn btn-primary" name="booksubmit">Submit</button>
                                </form>
                                <?php
                                if (isset($_POST['booksubmit'])) {
                                   
                                    $booking_date = $_POST['booking_date'];
                                    $booking_time = $_POST['booking_time'];
                                    $duration = $_POST['duration'];
                                    $venue_id = $_POST['venue_id'];
                                    
                                    $notsql = "insert into ground_booking(booking_date,booking_time,duration,venue_id) values('$booking_date','$booking_time','$duration','$venue_id')";
                                    try {
                                        mysqli_query($conn, $notsql);
                                        

                                    } catch (mysqli_sql_exception $e) {
                                        mysqli_rollback($conn);
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headineEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Update the match score
                            </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headineEleven" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
              
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Match ID</label>
                                        <input type="number" class="form-control" id="match_id" name="match_id">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Home Score</label>
                                        <input type="number" class="form-control" id="home_score" name="home_score">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Away Score</label>
                                        <input type="number" class="form-control" id="away_score" name="away_score">
                                    </div>


                            



                                    <button type="submit" class="btn btn-primary" name="scoresubmit">Submit</button>
                                </form>
                                <?php
                                if (isset($_POST['scoresubmit'])) {
                                   
                                    $match_id = $_POST['match_id'];
                                    $home_score = $_POST['home_score'];
                                    $away_score = $_POST['away_score'];
                                    
                                    
                                    $scoresql = "UPDATE match_score SET home_score =$home_score,away_score=$away_score  WHERE match_id=$match_id;";
                                    try {
                                        mysqli_query($conn, $scoresql);
                                        

                                    } catch (mysqli_sql_exception $e) {
                                        mysqli_rollback($conn);
                                        echo "An error occurred: " . $e->getMessage();
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- accrodian ends -->
















                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <script>
                        function toggleDivs() {
                            const batsmanRadio = document.getElementById('batsman');
                            const bowlerRadio = document.getElementById('bowler');
                            const batsmanDiv = document.getElementById('batman');
                            const bowlerDiv = document.getElementById('boler');

                            if (batsmanRadio.checked) {
                                batsmanDiv.style.display = "block";
                                bowlerDiv.style.display = "none";
                            } else if (bowlerRadio.checked) {
                                bowlerDiv.style.display = "block";
                                batsmanDiv.style.display = "none";
                            }
                        }

                        // Attach event listeners to the radio buttons
                        document.getElementById('batsman').addEventListener('change', toggleDivs);
                        document.getElementById('bowler').addEventListener('change', toggleDivs);

                        // Call the function once at the start to set the initial state
                        toggleDivs();
                    </script>

</body>

</html>