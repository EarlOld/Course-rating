<?php
	require "standartDB.php";

  $group1 =  $mysqli->query("SELECT * FROM myGroup") or die ("<b>Query failed:</b> " . mysql_error());
	while ($row = $group1->fetch_assoc()){
		$rezult[]= $row;
	}
	echo json_encode($rezult);
