<?php
	require "standartDB.php";
  $students =  $mysqli->query("DELETE FROM Students WHERE `St_group` = ".$_GET['group']."") or die ("<b>Query failed:</b> " . mysql_error());
  $group1 =  $mysqli->query("DELETE FROM myGroup WHERE `Gr_key` = ".$_GET['group']."") or die ("<b>Query failed:</b> " . mysql_error());
	$group = $mysqli->query("DELETE FROM Location WHERE `Gr_key` = ".$_GET['group']."") or die ("<b>Query failed:</b> " . mysql_error());
echo json_encode("ok");
