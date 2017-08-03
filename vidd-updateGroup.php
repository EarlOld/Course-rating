<?php
	require "standartDB.php";


	$result =  $mysqli->query ("UPDATE `myGroup` SET `Gr_name` = '".$_GET["name"]["name"]."', `Gr_head` = '".$_GET["head"]["head"]."', `Gr_kurator` = '".$_GET["kurator"]["kurator"]."' WHERE `Gr_key` = '".$_GET["group"]["group"]."'") or die ("<b>Query failed:</b> " . mysql_error());

	 echo "ok";
 ?>
