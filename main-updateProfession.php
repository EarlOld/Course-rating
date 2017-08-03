<?php
	require "standartDB.php";

	$profession = $_GET["profession"]["profession"];
	$new = $_GET["newprofession"]["newprofession"];
	//var_dump("`Dep_name` = ".$new."");
	$result =  $mysqli->query ("UPDATE `Profession` SET `Pro_name` = '".$new."' WHERE `Pro_key` = '".$profession."'") or die ("<b>Query failed:</b> " . mysql_error());

	 echo "ok";
 ?>
