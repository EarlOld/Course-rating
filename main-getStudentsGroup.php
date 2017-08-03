<?php
	require "standartDB.php";

	$group =  $mysqli->query("SELECT * FROM Students WHERE `St_group` = ".$_GET["group"]."") or die ("<b>Query failed:</b> " . mysql_error());
	$rezult = array();

	while ($row = $group->fetch_assoc()){
		$rezult[] = $row;
	}
  //var_dump($rezult);
	echo json_encode($rezult);
