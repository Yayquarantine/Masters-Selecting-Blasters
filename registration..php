<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="stylelogin.css" />
</head>
<body>
<?php
require('database.php');

if (isset($_REQUEST['username'])){

 $username = stripslashes($_REQUEST['username']);

 $username = mysqli_real_escape_string($con,$username); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
        $query = "INSERT into `users` (username, password, email)
VALUES ('$username', '".md5($password)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
        	

            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />

<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
<p>Already Registered? then login <a href='Login.php'>Click Here</a></p>
<p>Back To Homepage <a href='index.html'>Click Here</a></p>
</form>
</div>
<?php } ?>
</body>
</html>