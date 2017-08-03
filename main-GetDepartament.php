<?php
require "standartDB.php";

$result =  $mysqli->query ("SELECT * FROM Departaent WHERE Dep_key = '".$_GET['departament']."'") or die ("<b>Query failed:</b> " . mysql_error());
while ($row = $result->fetch_assoc()){
	$departament[]= $row;
}
echo json_encode($departament);

 ?>
