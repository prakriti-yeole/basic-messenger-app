<?php
include("configuration.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:home.php");
}
$email=$_POST['email'];
$password=$_POST['password'];
if($email==NULL || $_POST['password']==NULL)
{
	
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM users WHERE email='".mysqli_real_escape_string($al,$email)."' AND password='".mysqli_real_escape_string($al,sha1($password))."'");	
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$_POST['email'];
		mysqli_query($al,"UPDATE users SET status = 1 WHERE email = '".$_SESSION['email']."'");
		header("location:home.php");
	}
	else
	{
		$info="Incorrect Email or Password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<link href="scripts/styleSheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center"><br />
<span class="heading" style="
height: 100px;
width:1600px;
 font-family: 'Lato', sans-serif;
  font-weight:300;
  letter-spacing: 2px;
  font-size:48px;
position: relative;
    text-align: center;
   
    color: white;
	display:block;
	background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
  background-repeat: no-repeat;
  background-size: 100% 0.2em;
  background-position: 0 88%;
  transition: background-size 0.25s ease-in;
">Welcome to Messenger app</span><br />
<br /><br />
<br />
<form method="post" action="">
<table class="table" cellpadding="4" cellspacing="4">
<tr><td align="center" colspan="2" class="tableHead">User Login</td></tr>
<tr><td align="center" class="info" colspan="2"><?php echo $info;?></td></tr>
<tr><td class="labels">Email ID : </td><td><input type="email" name="email" class="fields" size="30" required="required" placeholder="@gmail.com" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" name="password" class="fields" size="30" required="required" placeholder="can include letters,symbols..etc" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="commandButton" /></td></tr>
</table>
</form>
<br />

<br />
<span class="text"> New User?  </span><a href="registration.php"> Register Here </a><br />
<br />
<span class="text"></span><a href="adminLogin.php">Admin Login </a>

</div>
</body>

</html>