<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="stylelogin.css" />
</head>
<body>
<?php
require('database.php');
//include('registration.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
     //$_SESSION['password'] = $password;
     //$_SESSION['pass'] = $password;

     

//$res = mysql_query("SELECT something FROM somewhere"); // perform the query on the server
//$result = mysql_fetch_array($res); // retrieve the result from the server and put it into the variable $result
//echo $result['something']; // will print out the result you retrieved

    
    

            // Redirect user to index.php
     header("Location: quiz.php");
         }else{
                echo "<div class='form'>
                <h3>Username/password is incorrect.</h3>
                <br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
<p>Back To Homepage <a href='index.html'>Click Here</a></p>
</div>
<?php } ?>
</body>
</html>