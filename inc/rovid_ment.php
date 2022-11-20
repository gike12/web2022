<?php
	//adatbázis kapcsolódás
	
	//$con = mysqli_connect("localhost","webprog2022",
	//"12345","webprog2022");
	
	print "<h1> Az adatokat adatbázisba mentettük. </h1>";
	
	$e=0;
	$d=0;
	$k=0;
	$n=0;
	$hibas=0;
	$parancs=strtoupper($_POST['parancs']);

	for($i=0; $i<strlen($parancs); $i++) 
	{
		//print $_POST['parancs'][$i]."<br>";
		
		switch($parancs[$i]) {
			case "E": $e++; break;
			case "D": $d++; break;
			case "K": $k++; break;
			case "N": $n++; break;
			default : $hibas++;
		}
	}
	
	$rovid_parancs="";
	
	if($e>$d) {
		for($i=1; $i<=$e-$d; $i++){
			$rovid_parancs=$rovid_parancs."E";
		}
	} else if($d>$e) {
		for($i=1; $i<=$d-$e; $i++){
			$rovid_parancs=$rovid_parancs."D";
		}
	}
	
	if($k>$n) {
		for($i=1; $i<=$k-$n; $i++){
			$rovid_parancs=$rovid_parancs."K";
		}
	} else if($n>$k) {
		for($i=1; $i<=$n-$k; $i++){
			$rovid_parancs=$rovid_parancs."N";
		}
	}
	
	mysqli_query($con,"INSERT INTO robot VALUES 
	('',now(),'$parancs','$rovid_parancs','$hibas')");
	
	$result=mysqli_query($con,"SELECT * FROM robot");
	
	$sorok_szama=mysqli_num_rows($result);
	
	print "Jelenleg ".$sorok_szama." darab parancs 
	van az adatbázisban.";
	
	
	
	
	
	
		
?>