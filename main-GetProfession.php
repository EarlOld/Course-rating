<?php
require "standartDB.php";

$result =  $mysqli->query ("SELECT * FROM Profession WHERE Pro_key = '".$_GET['profession']."'") or die ("<b>Query failed:</b> " . mysql_error());
while ($row = $result->fetch_assoc()){
	$departament[]= $row;
}
echo json_encode($departament);

 ?>
