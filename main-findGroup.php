<?php
	require "standartDB.php";

  $course = $_GET["course"]["course"];
  $profession = $_GET["profession"]["profession"];

	$group =  $mysqli->query("SELECT Gr_key FROM Location WHERE `Pro_key` = ".$profession." AND  `Cour_key` = ".$course." ") or die ("<b>Query failed:</b> " . mysql_error());
	$rezult = array();

	while ($row = $group->fetch_assoc()){
		$group_id = $row[Gr_key];
    $group1 =  $mysqli->query("SELECT * FROM myGroup WHERE `Gr_key` = ".$group_id."") or die ("<b>Query failed:</b> " . mysql_error());
    while ($row1 = $group1->fetch_assoc()){
  		$rezult[] = $row1;
  		$i++;
  	}
		$i++;
	}
	echo json_encode($rezult);
