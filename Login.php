<?php
// Start the session
session_start();

if (isset($_POST["submit"])) {
 $link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
 if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }

  $username =$_POST["user_name"];
  $Password =sha1($_POST["password"]);
  $table_users = "";
  $table_password = "";
$sql="SELECT Name,password FROM users WHERE Name='" . $_POST["user_name"] . "' AND password = '". sha1($_POST["password"])."'";
// die("$sql");
$result=$link->query("$sql");
$exists=$result->num_rows;
$exists; 
if($exists>0){
while ($row = $result->fetch_assoc()) {

  $table_users =$row['Name'];
  $table_password =$row['password'];

}

if(($username == $table_users) && ($Password == $table_password)) // checks if there are any matching fields
		{
			   if($Password == $table_password)
				{    
					  // echo $Password;
					  $_SESSION['loggedin']=true;
                      $_SESSION['username']= $username;//set the username in a session. This serves as a global variable
                      header('location:Home.php');// redirects the user to the authenticated home page
				}
				
		}


// if($result->num_rows>0){
 
 // echo "Result Found";  
//  $_SESSION['loggedin']=true;
// $_SESSION['user_name']= $name;
// header('loaction:homepage.php');
// }
else{

  // echo "Result Not Found"; 
Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php



}
}
else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
$color: #999;
$color-bg: #eaeaea;

$font-family: sans-serif;
$font-size: 16px;
$font-weight: 400;

$line-height: 1.5em;

/* ---------- GENERAL ---------- */

* {
  box-sizing: border-box;
  
  &:before,
  &:after {
    box-sizing: border-box;
  }
  
}

body {
	color:#666;
	font-size:13px;
	font-family:Arial, Helvetica, sans-serif;
	

	background: url(1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}

h3 { margin: 0; }

a {
	color: #999;
	text-decoration: none;
}

a:hover { color: #1dabb8; }

fieldset {
	border: none;
	margin: 0;
}

input {
	border: none;
	font-family: inherit;
	font-size: inherit;
	margin: 0;
	-webkit-appearance: none;
}

input:focus {
  outline: none;
}

input[type="submit"] { cursor: pointer; }

.clearfix {
  *zoom: 1;
  
  &:before,
  &:after {
    content: ' ';
    display: table;
  }
  
  &:after {
    clear: both;
  }
  
}

.container {
  left: 50%;
  position: fixed;
  top: 50%;
  transform: translate(-50%, -50%);
}

/* ---------- LOGIN-FORM ---------- */

#login-form {
	width: 300px;
}

#login-form h3 {
	background-color: #282830;
	border-radius: 5px 5px 0 0;
	color: #fff;
	font-size: 14px;
	padding: 20px;
	text-align: center;
	text-transform: uppercase;
}

#login-form fieldset {
	background: #fff;
	border-radius: 0 0 5px 5px;
	padding: 20px;
	position: relative;
}

#login-form fieldset:before {
	background-color: #fff;
	content: "";
	height: 8px;
	left: 50%;
	margin: -4px 0 0 -4px;
	position: absolute;
	top: 0;
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
	width: 8px;
}

#login-form input {
	font-size: 14px;
}

#login-form input[type="text"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 100%;
}

#login-form input[type="text"] {
	border-radius: 3px 3px 0 0;
}

#login-form input[type="password"] {
	border-top: none;
	border-radius: 0px 0px 3px 3px;
}

#login-form input[type="submit"] {
	background: #1dabb8;
	border-radius: 3px;
	color: #fff;
	float: right;
	font-weight: bold;
	margin-top: 20px;
	padding: 12px 20px;
}

#login-form input[type="submit"]:hover { background: #198d98; }

#login-form footer {
	font-size: 12px;
	margin-top: 16px;
}

.info {
	background: #e5e5e5;
	border-radius: 50%;
	display: inline-block;
	height: 20px;
	line-height: 20px;
	margin: 0 10px 0 0;
	text-align: center;
	width: 20px;
}

</style>
</head>
<body>
</body>


<div class="container">

  <div id="login-form">

    <h3>Login</h3>

    <fieldset>

      <form method="post">

        <input type="text" required name="user_name"  placeholder="User Name *" > <!-- JS because of IE support; better: placeholder="Email" -->

        <input type="password" required name="password"  placeholder="Password *" > <!-- JS because of IE support; better: placeholder="Password" -->

        <input type="submit" name="submit" value="Login">

        <footer class="clearfix">

          <p><span class="info">?</span><a href="#">Forgot Password</a></p>

        </footer>

      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>
</html>