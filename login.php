<!doctype html>
<head>
<title>login</title>
</head>

<body>
<p><a href="home.php">НАСЛОВНА</a> | <a href="login.php">ПРИЈАВЉИВАЊЕ</a> | <a href="registracija.php">РЕГИСТРАЦИЈА</a></p>
</br>
	<center>
	<h1>ПРИЈАВЉИВАЊЕ НА СИСТЕМ</h1></br>
	<h2>УНЕСИТЕ СВОЈЕ КОРИСНИЧКО ИМЕ И ЛОЗИНКУ</h2>
	</center> </br>
	
	<center>
<form action = " " method="POST">
	<fieldset>
		<legend>ПРИЈАВЉИВАЊЕ</legend> </br>
	<table>
		<tr>
			<td><label>Корисничко име</label></td>
			<td><input type = "text" name="ime" /></td>
		</tr>
		
		<tr>
			<td><center><label>Лозинка</label></center></td>
			<td><input type = "password" name="pass"/></td>
		</tr>
	</table>
		<p>
		<input type = "submit" name="submit" value="ПРОСЛЕДИ"/>
		</p>
	</fieldset>
</form>
	</center>

<center>
<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['ime']) && !empty($_POST['pass'])) {  
    $user=$_POST['ime'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());
    mysqli_select_db($con, 'e_nastavnik1') or die("cannot select DB");
	mysqli_set_charset($con,"utf8");

	$query=mysqli_query($con,"SELECT * FROM djaci WHERE User='".$user."' AND Pass='".$pass."' ");  
    $numrows=mysqli_num_rows($query);  
    
	if($numrows!=0)
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['User'];  
    $dbpassword=$row['Pass'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
 
    /* Redirect browser */  
    header("Location: pocetna.php");  
    }  
    } else {  
        echo "ПОГРЕШНО КОРИСНИЧКО ИМЕ ИЛИ ЛОЗИНКА!";
    }  
  
} else {  
    echo "МОРАТЕ ПОПУНИТИ СВА ПОЉА!";  
}  
}  
?> 
</center>

</body>

</html>