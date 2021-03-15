
<?php 
	session_start();

	$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con, 'e_nastavnik1') or die("cannot select DB");
	mysqli_set_charset($con,"utf8");

	$query=mysqli_query($con,"SELECT * FROM `rezultati` WHERE `UserName` = '".$_SESSION['sess_user']."';");  
	$rezultati = mysqli_fetch_array($query);
	
	
	if (is_null($rezultati['DNTest_1'])) {$DNtest1=null;}
	else {$DNtest1=round($rezultati['DNTest_1']*0.333,2);}
	if (is_null($rezultati['DNTest_2'])) {$DNtest2=null;}
	else {$DNtest2=round($rezultati['DNTest_2']*0.333,2);}
	if (is_null($rezultati['DNTest_3'])) {$DNtest3=null;}
	else {$DNtest3=round($rezultati['DNTest_3']*0.333,2);}
	if (is_null($rezultati['DNTest_4'])) {$DNtest4=null;}
	else {$DNtest4=round($rezultati['DNTest_4']*0.333,2);}
	if (is_null($rezultati['DNTest_5'])) {$DNtest5=null;}
	else {$DNtest5=round($rezultati['DNTest_5']*0.333,2);}
	if (is_null($rezultati['DNTest_6'])) {$DNtest6=null;}
	else {$DNtest6=round($rezultati['DNTest_6']*0.333,2);}
	if (is_null($rezultati['DNTest_7'])) {$DNtest7=null;}
	else {$DNtest7=round($rezultati['DNTest_7']*0.333,2);}
	if (is_null($rezultati['DNTest_8'])) {$DNtest8=null;}
	else {$DNtest8=round($rezultati['DNTest_8']*0.333,2);}
	if (is_null($rezultati['DNTest_9'])) {$DNtest9=null;}
	else {$DNtest9=round($rezultati['DNTest_9']*0.333,2);}
	if (is_null($rezultati['DNTest_10'])) {$DNtest10=null;}
	else {$DNtest10=round($rezultati['DNTest_10']*0.333,2);}
	
	
	if (is_null($rezultati['MTest_1'])) {$Mtest1=null;}
	else {$Mtest1=round($rezultati['MTest_1']*0.5,2);}
	if (is_null($rezultati['MTest_2'])) {$Mtest2=null;}
	else {$Mtest2=round($rezultati['MTest_2']*0.5,2);}
	if (is_null($rezultati['MTest_3'])) {$Mtest3=null;}
	else {$Mtest3=round($rezultati['MTest_3']*0.5,2);}
	if (is_null($rezultati['MTest_4'])) {$Mtest4=null;}
	else {$Mtest4=round($rezultati['MTest_4']*0.5,2);}
	if (is_null($rezultati['MTest_5'])) {$Mtest5=null;}
	else {$Mtest5=round($rezultati['MTest_5']*0.5,2);}
	
	
	if (is_null($rezultati['TMTest_1'])) {$TMtest1=null;}
	else {$TMtest1=round($rezultati['TMTest_1']*1,2);}
	if (is_null($rezultati['TMTest_2'])) {$TMtest2=null;}
	else {$TMtest2=round($rezultati['TMTest_2']*1,2);}
	
	if (is_null($rezultati['PGTest_1'])) {$PGtest1=null;}
	else {$PGtest1=round($rezultati['PGTest_1']*1,2);}
	
	if (is_null($rezultati['PGTest_1'])) {$KONtest=NULL;}
	else{
		$KONtest=round($DNtest1+$DNtest1+$DNtest1+$DNtest1+$DNtest1+$DNtest1+$DNtest1+$DNtest1+$DNtest1+$DNtest1+$Mtest1+$Mtest1+$Mtest1+$Mtest1+$Mtest1+$TMtest1+$TMtest1+$PGtest1, 2);
	} 
	
	if (is_null($KONtest)) {$Ocena=NULL;}
	else{
		switch (true) {
			case ($KONtest<40):
				$Ocena = 1;
				break;
			case ($KONtest<60):
				$Ocena = 2;
				break;
			case ($KONtest<75):
				$Ocena = 3;
				break;
			case ($KONtest<90):
				$Ocena = 4;
				break;
			default:
				$Ocena = 5;
				break;
		}
	} 

//	echo ($DNtest1);
//	print "<br>";
//	echo ($DNtest2);
//	print "<br>";
//	echo is_null($DNtest2);
		
?>


<!doctype html>
<head>
<title>rezultat</title>
</head>
<style>
    table {
        width: 80vw;
        border: 1px solid black;
        border-collapse: collapse;
        margin: 0 auto;
        margin-top: 10vh;
    }
    tr, th, td {
        border: 1px solid black;
    }
    td {
        text-align: center;
    }
</style>

<body>
	<p> <a href="pocetna.php">ПОЧЕТНА</a></p>

<center><h1><b>РЕЗУЛТАТИ ТЕСТОВА И ОЦЕНА</b></h1></center>

	<table>
		<tr>
			<td colspan ="2"><b>РЕЗУЛТАТИ ДВОНЕДЕЉНИХ ТЕСТОВА</b> (максимум бодова по тесту је 3)</td>
		</tr>
		<tr>
			<td> <b> ТЕСТ </b> </td>
			<td> <b> РЕЗУЛТАТ </b> </td>
		</tr>
		<tr>
			<td> ТЕСТ_1 </td>
			<td> <?php echo ($DNtest1) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_2 </td>
			<td> <?php echo ($DNtest2) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_3 </td>
			<td> <?php echo ($DNtest3) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_4 </td>
			<td> <?php echo ($DNtest4) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_5 </td>
			<td> <?php echo ($DNtest5) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_6 </td>
			<td> <?php echo ($DNtest6) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_7 </td>
			<td> <?php echo ($DNtest7) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_8 </td>
			<td> <?php echo ($DNtest8) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_9 </td>
			<td> <?php echo ($DNtest9) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_10 </td>
			<td> <?php echo ($DNtest1) ?> </td>
		</tr>
	</table>
	
</br></br>

	<table>
		<tr>
			<td colspan ="2"><b>РЕЗУЛТАТИ МЕСЕЧНИХ ТЕСТОВА</b> (максимум бодова по тесту је 4)</td>
		</tr>
		<tr>
			<td> <b> ТЕСТ </b> </td>
			<td> <b> РЕЗУЛТАТ </b> </td>
		</tr>
		<tr>
			<td> ТЕСТ_1 </td>
			<td> <?php echo ($Mtest1) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_2 </td>
			<td> <?php echo ($Mtest2) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_3 </td>
			<td> <?php echo ($Mtest3) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_4 </td>
			<td> <?php echo ($Mtest4) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_5 </td>
			<td> <?php echo ($Mtest5) ?> </td>
		</tr>
	</table>

</br></br>
	
	<table>
		<tr>
			<td colspan ="2"><b>РЕЗУЛТАТИ ТРОМЕСЕЧНИХ ТЕСТОВА</b> (максимум бодова по тесту је 20)</td>
		</tr>
		<tr>
			<td> <b> ТЕСТ </b> </td>
			<td> <b> РЕЗУЛТАТ </b> </td>
		</tr>
		<tr>
			<td> ТЕСТ_1 </td>
			<td> <?php echo ($TMtest1) ?> </td>
		</tr>
		<tr>
			<td> ТЕСТ_2 </td>
			<td> <?php echo ($TMtest2) ?> </td>
		</tr>
	</table>

</br></br>
	
	<table>
		<tr>
			<td colspan ="2"><b>РЕЗУЛТАТ ПОЛУГОДИШЊЕГ ТЕСТА</b>  (максимум бодова по тесту је 20)</td>
		</tr>
		<tr>
			<td> <b> ТЕСТ </b> </td>
			<td> <b> РЕЗУЛТАТ </b> </td>
		</tr>
		<tr>
			<td> ПОЛУГОДИШЊИ ТЕСТ </td>
			<td> <b> <?php echo ($PGtest1) ?> </b> </td>
		</tr>
	</table>

</br></br>
	
	<table>
		<tr>
			<td colspan ="2"><b>УКУПНИ РЕЗУЛТАТИ И ОЦЕНА</b></td>
		</tr>
		<tr>
			<td> <b> ТИП РЕЗУЛТАТА </b> </td>
			<td> <b> РЕЗУЛТАТ </b> </td>
		</tr>
		<tr>
			<td> УКУПАН БРОЈ БОДОВА НА ТЕСТОВИМА </td>
			<td> <b> <?php echo ($KONtest) ?> </b> </td>
		</tr>
		<tr>
			<td> ПОЛУГОДИШЊА ОЦЕНА </td>
			<td> <b> <?php echo ($Ocena) ?> </b> </td>
		</tr>
	</table>
	
</br></br>
	<center>
		<p>Ако желите да видите систем оцењивања по боводима, кликните <a href="ocenjivanje.php">овде</a></p>
	</center>
	</br></br>
	
	
</body>
</html>
