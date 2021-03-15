<!doctype html>
<html>

<head>
    <title>Тестови</title>
	
</head>

<body>
	<p> <a href="pocetna.php">ПОЧЕТНА</a></p>
	</br>
<center>
	<?php
	session_start();
	$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'e_nastavnik1') or die("cannot select DB");
	mysqli_set_charset($con,"utf8");
	
	$query=mysqli_query($con,"SELECT * FROM `rezultati` WHERE `UserName` = '".$_SESSION['sess_user']."';");  
	$rezultati = mysqli_fetch_array($query);
	// echo is_null($rezultati['DNTest_9']);
	
echo "	<form action='test.php'>";
echo "    <fieldset>";
echo "        <heading1>ДВОНЕДЕЉНИ ТЕСТОВИ</heading1> </br> </br>";
echo "        <button name='test' value='DN_1' type='submit'";
					if (!is_null($rezultati['DNTest_1'])) {echo "disabled ";}
					echo ">ТЕСТ_1</button>";
echo "        <button name='test' value='DN_2' type='submit'";
					if (!is_null($rezultati['DNTest_2'])) {echo "disabled ";}
					echo ">ТЕСТ_2</button>";
echo "        <button name='test' value='DN_3' type='submit'";
					if (!is_null($rezultati['DNTest_3'])) {echo "disabled ";}
					echo ">ТЕСТ_3</button>";
echo "        <button name='test' value='DN_4' type='submit'";
					if (!is_null($rezultati['DNTest_4'])) {echo "disabled ";}
					echo ">ТЕСТ_4</button>";
echo "        <button name='test' value='DN_5' type='submit'";
					if (!is_null($rezultati['DNTest_5'])) {echo "disabled ";}
					echo ">ТЕСТ_5</button>";
echo "        <button name='test' value='DN_6' type='submit'";
					if (!is_null($rezultati['DNTest_6'])) {echo "disabled ";}
					echo ">ТЕСТ_6</button>";
echo "        <button name='test' value='DN_7' type='submit'";
					if (!is_null($rezultati['DNTest_7'])) {echo "disabled ";}
					echo ">ТЕСТ_7</button>";
echo "        <button name='test' value='DN_8' type='submit'";
					if (!is_null($rezultati['DNTest_8'])) {echo "disabled ";}
					echo ">ТЕСТ_8</button>";
echo "        <button name='test' value='DN_9' type='submit'";
					if (!is_null($rezultati['DNTest_9'])) {echo "disabled ";}
					echo ">ТЕСТ_9</button>";
echo "        <button name='test' value='DN_10' type='submit'";
					if (!is_null($rezultati['DNTest_10'])) {echo "disabled ";}
					echo ">ТЕСТ_10</button>";
echo "    </fieldset> </br>";

echo "    <fieldset>";
echo "        <heading1>МЕСЕЧНИ ТЕСТОВИ</heading1> </br> </br>";
echo "        <button name='test' value='M_1' type='submit'";
					if (!is_null($rezultati['MTest_1'])) {echo "disabled ";}
					echo ">ТЕСТ_1</button>";
echo "        <button name='test' value='M_2' type='submit'";
					if (!is_null($rezultati['MTest_2'])) {echo "disabled ";}
					echo ">ТЕСТ_2</button>";
echo "        <button name='test' value='M_3' type='submit'";
					if (!is_null($rezultati['MTest_3'])) {echo "disabled ";}
					echo ">ТЕСТ_3</button>";
echo "        <button name='test' value='M_4' type='submit'";
					if (!is_null($rezultati['MTest_4'])) {echo "disabled ";}
					echo ">ТЕСТ_4</button>";
echo "        <button name='test' value='M_5' type='submit'";
					if (!is_null($rezultati['MTest_5'])) {echo "disabled ";}
					echo ">ТЕСТ_5</button>";
echo "    </fieldset> </br>";

echo "    <fieldset>";
echo "        <heading1>ТРОМЕСЕЧНИ ТЕСТОВИ</heading1> </br> </br>";
echo "        <button name='test' value='TM_1' type='submit'";
					if (!is_null($rezultati['TMTest_1'])) {echo "disabled ";}
					echo ">ТЕСТ_1</button>";
echo "        <button name='test' value='TM_2' type='submit'";
					if (!is_null($rezultati['TMTest_2'])) {echo "disabled ";}
					echo ">ТЕСТ_2</button>";
echo "    </fieldset> </br>";

echo "    <fieldset>";
echo "        <heading1>ПОЛУГОДИШЊИ ТЕСТ</heading1> </br> </br>";
echo "        <button name='test' value='PG_1' type='submit'";
					if (!is_null($rezultati['PGTest_1'])) {echo "disabled ";}
					echo ">ФИНАЛНИ ТЕСТ</button>";
echo "    </fieldset> </br>";
echo "</form>";
	?>
	</center>
</body>

</html>