<?php
	require "standartDB.php";


  $course = $_GET["course"]["course"];
  $profession = $_GET["profession"]["profession"];

  $group =  $mysqli->query("SELECT Gr_key FROM Location WHERE `Cour_key` = ".$course." AND `Pro_key` = ".$profession." ") or die ("<b>Query failed:</b> " . mysql_error());
	$rezult = array();

  while ($row = $group->fetch_assoc()){
    $group_id = $row[Gr_key];
    $group1 =  $mysqli->query("SELECT * FROM Students WHERE `St_group` = ".$group_id."") or die ("<b>Query failed:</b> " . mysql_error());
    while ($row1 = $group1->fetch_assoc()){
      $rezult[] = $row1;
      $i++;
    }
    $i++;
  }
  //var_dump($rezult);
	echo json_encode($rezult);
