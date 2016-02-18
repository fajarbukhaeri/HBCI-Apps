<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
  $login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
  $uname = strip_tags($_POST['txt_id']);
  $upass = strip_tags($_POST['txt_password']);
    
  if($login->doLogin($uname,$upass))
  {
    $login->redirect('home.php');
  }
  else
  {
    $error = "Wrong Details !";
  } 
}
?>

<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="cover">
      <div class="cover-image"></div>
    </div>
    <div class="section section-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form role="form" class="text-justify" method="post">
              <div id="error">
                <?php if(isset($error)) { ?>
                <div class="alert alert-danger">
                  <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning"></i>&nbsp;
                  <?php echo $error; ?>!</div>
                <?php } ?>
              </div>
              <div class="form-group">
                <input class="form-control input-sm" placeholder="ID Anggota" type="text" name="txt_id">
                <input class="form-control input-sm" placeholder="Password" type="password" name="txt_password">
              </div>
              <button type="submit" class="btn btn-block btn-primary" name="btn-login">
                <i class="fa fa-fw fa-sign-in"></i>&nbsp;Sign in</button>
            </form>
            <div>
                <a href="#">Forgot Password ?</a>
                <a class="sign-up" href="sign-up.php">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  

</body></html>