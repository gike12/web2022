<?php
	print "<h1> $_POST[parancs] </h1>";
	
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
	
	print "E betűk = ".$e."<br>";
	print "D betűk = ".$d."<br>";
	print "K betűk = ".$k."<br>";
	print "N betűk = ".$n."<br>";
	
	if($e>$d) {
		for($i=1; $i<=$e-$d; $i++){
			print "E";
		}
	} else if($d>$e) {
		for($i=1; $i<=$d-$e; $i++){
			print "D";
		}
	}
	
	if($k>$n) {
		for($i=1; $i<=$k-$n; $i++){
			print "K";
		}
	} else if($n>$k) {
		for($i=1; $i<=$n-$k; $i++){
			print "N";
		}
	}
	
?>