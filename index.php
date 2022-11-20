<?php
	session_start();

	include("inc/_db.php");
	include("inc/_ugro.php");

	if(isset($_GET['oldal']))
	{
		switch($_GET['oldal'])
		{
			case "home"    		: $tartalom="kezdolap.html"; break;
			case "about"   		: $tartalom="about.html"; break;
			case "rovidit_form" : $tartalom="rovidit_form.html"; break;
			case "db_rovidit"  	: $tartalom="db_rovidit.html"; break;
			case "rovidit" 		: $tartalom="rovidit.php"; break;
			case "rovid_ment"   : $tartalom="rovid_ment.php"; break;
			case "login"        : $tartalom="login.php"; break;
			case "reg"          : $tartalom="reg.php"; break;
			case "logout"       : $tartalom="logout.php"; break;
			case "users"        : $tartalom="users.php"; break;
			case "user_torol"   : $tartalom="user_torol.php"; break;
			case "user_modosit"   : $tartalom="user_modosit.php"; break;
			case "jogosultsagok"   : $tartalom="jogosultsagok.php"; break;
			case "jog_torol"   : $tartalom="jog_torol.php"; break;
			case "jog_modosit"   : $tartalom="jog_modosit.php"; break;
			case "jog_hozzaad"   : $tartalom="jog_hozzaad.php"; break;
			default		   		: $tartalom="kezdolap.html"; break;
		}
	} else {
		$tartalom="kezdolap.html";
	}
	
	include("inc/index2.html");
?>