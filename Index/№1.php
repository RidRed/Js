<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <link rel='stylesheet' href='Main.css' />
    </head>
    <body>
         <?php
session_start();
?>
 <?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = '16';

$link = mysqli_connect($host, $user, $password, $db_name);
	if(isset($_SESSION["session_username"])){
	header("Location: page.php");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username = htmlspecialchars($_POST['username']);
	$password = md5(htmlspecialchars($_POST['password']));
	$query = mysqli_query($link,"SELECT * FROM users WHERE login ='".$username."' AND password ='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dblogin=$row['login'];
  $dbpassword=$row['password'];
 }
  if($username == $dblogin && $password == $dbpassword)
 {
   $_SESSION['session_username']=$username;	 
   header("Location: page.php");
	}
	} 
	} 
	}
        ?>   
<div name = "login">
    <div name = "login-content">
<form action = "" id = "loginform" method = "post" name = "loginform">
    <p>Имя пользователя</p>
    <input class = "input" id = "username" name = "username" type = "text" value = "">
    <p>Пароль</p>
    <input class = "input" id = "password" name = "password" type = "password" value = "">
    <p class = "Pod"><input class = "button" name = "login" type = "submit" value = "Войти"></p>
</form>
</div>
</div>
   
    </body>
</html>