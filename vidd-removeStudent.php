<?php
	require "standartDB.php";
	$students =  $mysqli->query("DELETE FROM Students WHERE `St_key` = ".$_GET[student]."") or die ("<b>Query failed:</b> " . mysql_error());
	echo "ok";
