<?php
require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));

$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet" media="screen">


    </head><body>
        <div class="navbar navbar-default navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>HBCI Apps</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Hi' <?php echo $userRow['user_email']; ?>&nbsp;
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php"><span class="fa fa-user"></span>&nbsp;View Profile</a></li>
                                <li><a href="logout.php?logout=true"><span class="fa fa-sign-out"></span>&nbsp;Sign Out</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Contacts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">
                            <b>Selamat Datang <?php print($userRow['user_name']); ?></b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>


    </body></html>