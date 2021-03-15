<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:home.php");  
} else {  
?>  
<!doctype html>
<html>

<head>
    <title>Dobrodosli</title>
</head>

<body>

	<center> <h1> ИНФОРМАЦИОНИ СИСТЕМ ЕЛЕКТРОНСКОГ НАСТАВНИКА </h1> </center>
	<center> <h1>ЕЛЕКТРОНСКИ НАСТАВНИК ИСТОРИЈЕ </h1> </center>
	<center> <h2>ЗА 7. РАЗРЕД</h2> </center>

	<center>
	<?php 
		echo "КОРИСНИК: "; echo $_SESSION['sess_user'];
	?>
	</center> </br> </br> </br> </br>

	<center>
    <form action="/">
        <input type="submit" value="ПРЕДАВАЊА" name="submit" disabled/>
    </form></br></br>
    <form action="testovi.php">
        <input type="submit" value="ТЕСТОВИ" name="submit"/>
    </form></br></br>
    <form action="rezultati.php">
        <input type="submit" value="РЕЗУЛТАТИ" name="submit" />
    </form> </center>
	
	</br></br></br></br>
	
	
	<center>
	<form action="logout.php">
		<p>
		<input type = "submit" name="submit" value="ОДЈАВА КОРИСНИКА"/>
		</p>
	</form>
	</center>
	</br>
	
</body>

</html>
<?php 
} 
?>