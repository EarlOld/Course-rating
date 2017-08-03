<?php
	require "standartDB.php";

	$profession =  $mysqli->query("SELECT * FROM Profession WHERE Dep_key = ".$_GET['departament']."") or die ("<b>Query failed:</b> " . mysql_error());
	$rezult = array();

	while ($row = $profession->fetch_assoc()){
		$rezult[]= $row;
		$i++;
	}
	echo json_encode($rezult);
