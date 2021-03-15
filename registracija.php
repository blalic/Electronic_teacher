<!doctype html>
<head>
<title>registracija</title>
</head>

<body>
<p><a href="home.php">НАСЛОВНА</a> | <a href="login.php">ПРИЈАВЉИВАЊЕ</a> | <a href="registracija.php">РЕГИСТРАЦИЈА</a></p>
</br>
	<center>
	<h1>РЕГИСТРАЦИЈА У СИСТЕМУ</h1></br>
	<h2>МОЛИМО ВАС ДА УНЕСЕТЕ СВОЈЕ ИМЕ, ПРЕЗИМЕ, КОРИСНИЧКО ИМЕ И ЛОЗИНКУ</h2>
	</center>
	</br>
	
<center>
<form action = " " method="POST">
	<fieldset>
		<legend>РЕГИСТРАЦИЈА</legend> </br>
		<table>
		<tr>
			<td><center><label>Име</label></center></td>
			<td><input type = "text" name="ime"/></td>
		</tr>
		
		<tr>
			<td><center><label>Презиме</label></center></td>
			<td><input type = "text" name="prezime"/></td>
		</tr>
		
		<tr>
			<td><center><label>Корисничко име</label></center></td>
			<td><input type = "text" name="korisnickoIme"/></td>
		</tr>
		
		<tr>
			<td><center><label>Шифра</label></center></td>
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
  
if(!empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['korisnickoIme']) && !empty($_POST['pass'])) {  
    $ime=$_POST['ime'];
	$prezime=$_POST['prezime'];
	$user=$_POST['korisnickoIme'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'e_nastavnik1') or die("cannot select DB");
	mysqli_set_charset($con,"utf8");

	$query=mysqli_query($con,"SELECT * FROM djaci WHERE User='".$user."' ");  
    $numrows=mysqli_num_rows($query);
    if($numrows==0)  
    {  
		$sql="INSERT INTO djaci(Ime, Prezime, User, Pass) VALUES('$ime','$prezime','$user','$pass')";  
		$sql2="INSERT INTO rezultati(UserName) VALUES('$user')";
	    $result=mysqli_query($con, $sql);
		$result2=mysqli_query($con, $sql2);
        if($result){  
		echo "РЕГИСТРАЦИЈА ЈЕ УСПЕШНО ЗАВРШЕНА!";  
		} else {  
		echo "ГРЕШКА!";  
		}  
    }
	
	else {  
    echo "НАВЕДЕНО КОРИСНИЧКО ИМЕ ВЕЋ ПОСТОЈИ! МОЛИМО ПОКУШАЈТЕ СА ДРУГИМ.";  
    }
}
else {  
    echo "МОРАТЕ ПОПУНИТИ СВА ПОЉА!";
}  
}  
?> </center>

</body>

</html>