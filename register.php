<?php
session_start();

$username = "";
$email = "";
$password = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'chat');

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $user_check_query = "SELECT * FROM login WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
		array_push($errors,"");
      echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('User_Name:- ".$username." already exists')
    window.location.href='login.php';
    </SCRIPT>");
    }

    if ($user['email'] === $email) {
		array_push($errors,"");
      echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email:- ".$email." already exists')
    window.location.href='login.php';
    </SCRIPT>");
    }
  }

 
  if (count($errors) == 0) {
  	$password = base64_encode($password);

  	$query = "INSERT INTO login (username,password,email) 
  			  VALUES('$username','$password','$email')";
  	mysqli_query($db, $query);
  	
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('".$username." Succesfully Registered. Please Login to Chat')
    window.location.href='login.php';
    </SCRIPT>");
		
  }
}

?>