<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
  $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
  $uname = strip_tags($_POST['txt_uname']);
  $umail = strip_tags($_POST['txt_umail']);
  $upass = strip_tags($_POST['txt_upass']); 
  
  if($uname=="")  {
    $error[] = "provide username !";  
  }
  else if($umail=="") {
    $error[] = "provide email id !";  
  }
  else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
  }
  else if($upass=="") {
    $error[] = "provide password !";
  }
  else if(strlen($upass) < 6){
    $error[] = "Password must be atleast 6 characters"; 
  }
  else
  {
    try
    {
      $stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
      $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
      if($row['user_name']==$uname) {
        $error[] = "sorry username already taken !";
      }
      else if($row['user_email']==$umail) {
        $error[] = "sorry email id already taken !";
      }
      else
      {
        if($user->register($uname,$umail,$upass)){  
          $user->redirect('sign-up.php?joined');
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  } 
}

?>

<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form role="form" method="post">
              <?php
      if(isset($error))
      {
        foreach($error as $error)
        {
           ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
        }
      }
      else if(isset($_GET['joined']))
      {
         ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
      }
      ?>
              <div class="form-group">
                <label class="control-label" for="txt_uname">Username</label>
                <input class="form-control input-sm" placeholder="Username" type="text" name="txt_uname">
              </div>
              <div class="form-group">
                <label class="control-label" for="txt_email">Email</label>
                <input class="form-control input-sm" placeholder="Email" type="email" name="txt_umail">
              </div>
              <div class="form-group">
                <label class="control-label" for="txt_email">Password</label>
                <input class="form-control input-sm" placeholder="Password" type="password" name="txt_upass">
              </div>
              <button type="submit" class="btn btn-block btn-primary btn-sm" name="btn-signup">
                <i class="fa fa-fw fa-user-plus"></i>&nbsp;Sign Up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  

</body></html>