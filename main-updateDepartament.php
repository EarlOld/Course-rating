<?php
	require "standartDB.php";

	$departament = $_GET["departament"]["departament"];
	$new = $_GET["newdepartament"]["newdepartament"];
	//var_dump("`Dep_name` = ".$new."");
	$result =  $mysqli->query ("UPDATE `Departaent` SET `Dep_name` = '".$_GET["newdepartament"]["newdepartament"]."' WHERE `Dep_key` = '".$departament."'") or die ("<b>Query failed:</b> " . mysql_error());

	 echo "ok";
 ?>
