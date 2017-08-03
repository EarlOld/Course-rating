<?php
	require "standartDB.php";

	$profession =  $mysqli->query("SELECT Pro_key FROM Profession WHERE Dep_key = ".$_GET['departament']."") or die ("<b>Query failed:</b> " . mysql_error());
  while ($row = $profession->fetch_assoc()){
    $pro_id[] = $row[Pro_key];
    $group = $mysqli->query("SELECT Gr_key FROM Location WHERE `Pro_key` = ".$row[Pro_key]."") or die ("<b>Query failed:</b> " . mysql_error());
    while ($row1 = $group->fetch_assoc()){
      $group_id = $row1[Gr_key];
      $students =  $mysqli->query("DELETE FROM Students WHERE `St_group` = ".$row1[Gr_key]."") or die ("<b>Query failed:</b> " . mysql_error());
      $group1 =  $mysqli->query("DELETE FROM myGroup WHERE `Gr_key` = ".$row1[Gr_key]."") or die ("<b>Query failed:</b> " . mysql_error());
    }
    $group1 =  $mysqli->query("DELETE FROM Profession WHERE `Pro_key` = ".$row[Pro_key]."") or die ("<b>Query failed:</b> " . mysql_error());
  }
  $group1 =  $mysqli->query("DELETE FROM Departaent WHERE `Dep_key` = ".$_GET['departament']."") or die ("<b>Query failed:</b> " . mysql_error());
	echo "ok";
