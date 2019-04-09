<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM login 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if((base64_encode($_POST["password"])== $row["password"]))
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("location:index.php");
      }
      else
      {
       $message = "Wrong Password";
      }
    }
 }
 else
 {
  $message = "Wrong Username";
 }
}

?>
<html>  
    <head>  
        <title>Live Chat - Login</title>  
		<link rel="icon" href="u.png" />
		<link rel="stylesheet" type="text/css" href="design.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
		<h3 align="center" style="margin-top: 1px;"><img src="1.jpg" alt="Smiley face" height="180" width="250"></h3>
		<h4 align="center" style="color:000099;font-weight:bold;font-size:40px;font-family: Sofia;margin-top: -30px;">Stay Connected</h4>
		<div class="panel panel-primary" style="width: 35%;margin-left: 150px;margin-top:10px;">
		<div class="panel-heading"><b><font face="Times New Roman" size="5" color="white"><center>Already a Member Login here</center></font></b></div>
    <div class="panel-body">
	 <form method="post">
      <div class="form-group">
       <label style="font-family:Times New Roman, Times, serif;font-weight:bold;font-size:17px;">Enter Username</label>
       <input type="text" name="username" class="form-control input-lg" autocomplete="off" required />
      </div>
      <div class="form-group">
       <label style="font-family:Times New Roman, Times, serif;font-weight:bold;font-size:17px;">Enter Password</label>
       <input type="password" name="password" class="form-control input-lg" required />
      </div>
	  <br>
	  <div class="form-group">
       <label style="font-family:Times New Roman, Times, serif;font-weight:bold;font-size:17px;">Forgot Password <a href="forget.php">Click Here</a></label>
      </div>
      <div class="form-group">
       <center><input type="submit" name="login" class="btn btn-primary" value="Login" style="color:FFFFFF;font-weight:bold;font-size:20px;font-family: Sofia;" /></center>
      </div>
			<?php if($message) { echo'<script> alert ("Message:  '.$message.'")</script>';} ?>
     </form>
    </div>
   </div>
   <div class="panel panel-primary" style="width: 35%;margin-left: 580px;margin-top:-407px;">
      <div class="panel-heading"><b><font face="Times New Roman" size="5" color="white"><center>New Member Sign up here</center></font></b></div>
    <div class="panel-body" style="max-height:330;">
	 <form method="post" action="register.php">
      <div class="form-group">
       <label style="font-family:Times New Roman, Times, serif;font-weight:bold;font-size:17px;">Enter Username</label>
       <input type="text" name="username" class="form-control input-lg" autocomplete="off" required />
      </div>
      <div class="form-group">
       <label style="font-family:Times New Roman, Times, serif;font-weight:bold;font-size:17px;">Enter Password</label>
       <input type="password" name="password" class="form-control input-lg" required />
      </div>
	  <div class="form-group">
       <label style="font-family:Times New Roman, Times, serif;font-weight:bold;font-size:17px;">Enter Email</label>
       <input type="email" name="email" class="form-control input-lg" autocomplete="off" required />
      </div>
      <div class="form-group">
       <center><input type="submit" name="login" class="btn btn-primary" value="Sign up" style="color:FFFFFF;font-weight:bold;font-size:20px;font-family: Sofia;margin-top:-5px;"/></center>
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  
</html>
