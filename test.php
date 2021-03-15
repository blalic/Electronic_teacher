<?php   
session_start();
if(!isset($_SESSION["test_pitanja"])){ 
	
    $con=mysqli_connect('localhost','root','') or die(mysqli_error());  
	mysqli_select_db($con, 'e_nastavnik1') or die("cannot select DB");
	mysqli_set_charset($con,"utf8");
	
	$tipTesta = explode("_", $_GET['test'])[0];
	$brojTesta = explode("_", $_GET['test'])[1];
	$brojPitanja = 0;
	$spisakDvonedelja = [];

		switch ($tipTesta) {
			case "DN":
				$brojPitanja = 6;
				array_push($spisakDvonedelja, $brojTesta);
				break;
			case "M":
				$brojPitanja = 8;
				array_push($spisakDvonedelja, $brojTesta*2-1, $brojTesta*2);
				break;
			case "TM":
				$brojPitanja = 20;
				array_push($spisakDvonedelja, $brojTesta*5-4, $brojTesta*5-3, $brojTesta*5-2, $brojTesta*5-1, $brojTesta*5);
				break;
			default:
				$brojPitanja = 20;
				$spisakDvonedelja = [1,2,3,4,5,6,7,8,9,10];
		}
		$_SESSION['brojPitanja'] = $brojPitanja;
		$_SESSION['tipTesta'] = $tipTesta;
		$_SESSION['brojTesta'] = $brojTesta;
		$queryString = "SELECT * FROM `pitanja` WHERE `Dvonedelja` IN (".implode(", ", $spisakDvonedelja).") ORDER BY RAND() LIMIT ".$brojPitanja;
	$query=mysqli_query($con, $queryString);
	/* SELECT * FROM `pitanja` WHERE `Dvonedelja` IN (9) */
	$pitanja = $query->fetch_all(MYSQLI_ASSOC);
	$_SESSION["test_pitanja"] = $pitanja;
}
?>  
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
    <title>Test</title>
</head>

<body>
    <form action="rezultat.php" method="POST">
		<?php 
			$brojac = -1;
			foreach($_SESSION["test_pitanja"] as $pitanje) {
				$brojac ++;
				echo "<p class='tekstPitanja'>".$pitanje['Pitanje']."</p>";
				echo "<input type='radio' name='odgovor[".$brojac."]' value='1' required>".$pitanje['Odg1']."<br/>";
				echo "<input type='radio' name='odgovor[".$brojac."]' value='2'>".$pitanje['Odg2']."<br/>";
				echo "<input type='radio' name='odgovor[".$brojac."]' value='3'>".$pitanje['Odg3']."<br/>";
				echo "<input type='radio' name='odgovor[".$brojac."]' value='4'>".$pitanje['Odg4'];
			}
		?>
        <br/><br/><center><input type="submit" value="ЗАВРШИ ТЕСТ"></center></br>
    </form></br>
</body>

</html>