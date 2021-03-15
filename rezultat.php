<?php 
	session_start();
	$brojac = -1;
	$tacniOdgovori = 0;
	foreach($_SESSION["test_pitanja"] as $pitanje) {
		$brojac ++;
		if ($pitanje['TacOdg'] == $_POST['odgovor'][$brojac]) {
			$tacniOdgovori ++;
		}
	}
	$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'e_nastavnik1') or die("cannot select DB");
	mysqli_set_charset($con,"utf8");
	
	$query=mysqli_query($con,"UPDATE rezultati SET ".$_SESSION['tipTesta']."Test_".$_SESSION['brojTesta']." = ".$tacniOdgovori." WHERE UserName = '".$_SESSION['sess_user']."';");  
		
	$vrednostPitanja = 0;
	switch ($_SESSION['tipTesta']) {
			case "DN":
				$vrednostPitanja = 0.333;
				break;
			case "M":
				$vrednostPitanja = 0.5;
				break;
			case "TM":
				$vrednostPitanja = 1;
				break;
			default:
				$vrednostPitanja = 1;
				break;
		}
	unset($_SESSION['test_pitanja']);
?>
<!doctype html>
<head>
<title>rezultat</title>
</head>

<body>
<p> <a href="pocetna.php">ПОЧЕТНА</a></p>
</br>
	<center>
	<?php
	echo "<h1>РЕЗУЛТАТ НА ТЕСТУ</h1></br>";
	echo "<h2>".$_SESSION['brojTesta'].". ТЕСТ ".$_SESSION['tipTesta']." </h2></br>";
	echo "<h2> БРОЈ ТАЧНИХ ОДГОВОРА: ".$tacniOdgovori."</h2>";
	echo "<h2> УКУПАН БРОЈ ПИТАЊА: ".$_SESSION['brojPitanja']."</h2>";
	echo "<h2> БОДОВИ КОЈЕ СТЕ ОСВОЈИЛИ НА ОВОМ ТЕСТУ: ".round($vrednostPitanja*$tacniOdgovori, 2)."</h2>";
	?>
	</center>
<center>
</body>
</html>