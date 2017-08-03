<?php
require "standartDB.php";

$result =  $mysqli->query ("SELECT * FROM myGroup WHERE Gr_key = '".$_GET['group']."'") or die ("<b>Query failed:</b> " . mysql_error());
while ($row = $result->fetch_assoc()){
	$departament[]= $row;
}
echo json_encode($departament);

 ?>
