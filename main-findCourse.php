<?php
	require "standartDB.php";

	$course =  $mysqli->query("SELECT * FROM Course") or die ("<b>Query failed:</b> " . mysql_error());
	$rezult = array();

	while ($row = $course->fetch_assoc()){
		$rezult[]= $row;
		$i++;
	}
	echo json_encode($rezult);
