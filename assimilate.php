<!-- Assimilate Game Website -->
<!-- Single Page Application -->
<!-- Stephen Shiao (ss2sc) and Vivien Chen (vc2cw) -->
<?php
require 'connect.php';
$db_found = mysqli_select_db( $db_handle, $db_name );

// $action = "list_users";        // default action
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Assimilate</title>
    <meta name="authors" content="Made by Stephen Shiao and Vivien Chen">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- External libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"/>
    <!-- hamburger -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Our own sheets -->
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css" />
    <script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-lg">
        <div class=" navbar-collapse">
            <div class="topnav" id="myTopnav">
                <a href="" class="active"><b>ASSIMILATE</b></a>
                <a href="#howtoplay" role="button" onclick="openInstructions()">How to Play</a>
                <a href="#leaderboard" role="button" onclick="openLeaderboard()">Leaderboard</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Home page jumbrotron -->
    <div id="home" class="jumbotron" style="display:block;">
        <div class="container">
            <div class="row">
                <!-- Left side of jumbrotron -->
                <div class="col-md-6 my-auto">
                    <img src="images/placeholder.png">
                </div>

                <!-- Right side of jumbrotron -->
                <div class="col-md-6 my-auto">
                    <h1 style="text-align: center;">Assimilate</h1>
                    <p style="text-align: center;">Make all of the squares one color!</p>

                    <p style="text-align: center;"> 
                        <a class="btn btn-primary btn-lg" href="#play" role="button" onclick="openGame()">Play</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bottombar" id="myBottom">
        <a href="about.html">About</a>
        <a href="contact.php">Contact Us</a>
    </div>

    <!-- Play page jumbrotron -->
    <div id="play" class="jumbotron" style="display:none;">
        <h3 id="clicks" style="text-align: center;">Clicks Taken: 0</h3>
        <div class="grid">
            <div class="row">
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(0)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(1)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(2)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(3)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(4)"></div>
            </div>
            <div class="row">
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(5)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(6)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(7)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(8)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(9)"></div>
            </div>
            <div class="row">
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(10)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(11)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(12)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(13)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(14)"></div>
            </div>
            <div class="row">
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(15)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(16)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(17)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(18)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(19)"></div>
            </div>
            <div class="row">
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(20)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(21)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(22)"></div>
                <div class="box" role="button" style="background-color:#000000;" onclick="changeSquares(23)"></div>
                <div class="box" role="button" style="background-color:#ffffff;" onclick="changeSquares(24)"></div>
            </div>
        </div>
    </div>

    <div id="centerscreen" class="container center-screen" style="display:none; height: 700px; width: 500px;">
        <!-- How to play View -->
        <div id="howtoplay" style="display:none; font-size: 30px">
            <h1 style="text-align: center;">How to play</h2>
            <br>
            <p>Click on a square in the grid. This will flip the colors of all adjacent squares.</p>
            <p>The goal of the game is to make all the squares in the grid the <b>same color!</b></p>
        </div>
        <!-- Leaderboard View -->
        <div id="leaderboard" style="display:none;">
            <h2 style="text-align: center;">Leaderboard</h2>
            <table class="table table-striped">
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
            <!-- PHP show leaderboard data from database-->
            <?php
                $rank = 1;
                foreach ($results as $result){
                    echo "<tr> <td>{$rank}</td>
                        <td>{$result['User']}</td>
                        <td>{$result['Score']}
                        </td><tr>";
                    $rank++;
                }
            ?>
            </table>
        </div>
    </div>
    
    <div id="centersubmit" class="container center-submit" style="display:none; height: 300px; width: 500px;">
        <div id = submitscreen style="display:none;">
            <h3 style="text-align: center;">Add your name to Assimilate's leaderboard!<br></h3>
                <form action="" method="POST">
                    <br>
                    <dl>
                        <dt><dd><input id="inputname" type="text" name="name"/></dd>
                        <dd><input id="score" type="hidden" name="score" value="getClicks()"/></dd>
                        <?php 
                            function addScore($User, $Score){
                                global $db;		
                                $query = "INSERT INTO leaderboard (User, Score) VALUES (:user, :score)";
                                $statement = $db->prepare($query);
                                $statement->bindValue(':user', $User);
                                $statement->bindValue(':score', $Score);
                                $statement->execute();
                                $statement->closeCursor();
                            }

                            if (isSet($_POST['submit'])){
                                if (!empty($_POST['name'])){
                                    if (strlen($_POST['name']) > 0 && strlen($_POST['name']) <11){
                                        $name = $_POST['name'];
                                        $score = $_POST['score'];
                                        addScore($name, $score);
                                    }
                                    else{
                                        echo "Please type less than 10 characters";
                                    }
                                }
                                else{
                                    echo "Please enter your name";
                                }
                            }
                        ?> 
                        <!-- do value thing where their name is auto filled based on cookies -->
                    </dl>
                <input id="inputname" name="submit" type="submit"> />
        </form>
        </div>
    </div>

    <img src="images/x.png" id="closeButton" style="display:none;" role="button" onclick="closeCenter() , closeSubmit()">

</body>
</html>