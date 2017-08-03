<?php 
require "standartDB.php";

$result =  $mysqli->query ("SELECT * FROM Departaent") or die ("<b>Query failed:</b> " . mysql_error());
$departament = array();

while ($row = $result->fetch_assoc()){
	$departament[]= $row;
}
echo json_encode($departament);
 ?>