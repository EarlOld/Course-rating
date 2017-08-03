<?php
	require "standartDB.php";

	$rait = ($_GET["bal"]["bal"] - 3) * 45 + $_GET["dod_bal"]["dod_bal"];
	$result =  $mysqli->query ("UPDATE `Students` SET `St_name` = '".$_GET["name"]["name"]."', `St_status` = '".$_GET["state"]["state"]."',
	 																									`St_group` = '".$_GET["current_group"]["current_group"]."', `St_bal` = '".$_GET["bal"]["bal"]."', `St_dod_bal` = '".$_GET["dod_bal"]["dod_bal"]."', `St_rait` = '".$rait."' WHERE `St_key` = '".$_GET["student"]["student"]."'") or die ("<b>Query failed:</b> " . mysql_error());

	 echo "ok";
 ?>
