<?php
  require "standartDB.php";
  $data = $_POST;
  if (isset($data['enter'])) {
  if (empty($data['special'])) {
    # code...
  }
  else{
    $name = $data['special'];
    $mysqli->query("INSERT INTO `Course` (`Cour_key`, `Cour_name`) VALUES (NULL, '".$name."')" );
    #echo "Ok add";
  }
    }
  $mysqli->close();
?>
<!doctype html>
<<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>Рейтинг студентів ЖАТК</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
  <link href="css/style_main.css" rel="stylesheet">
  <script src="js/modernizr-2.5.3.min.js"></script>

</head>
<body>
<div class="container">
  <header>
  <div id="topnav" class="navbar navbar-fixed-top">
    <div class="navbar-inner" align="CENTER">
      <a href="main.php" class="button8">На головну</a>
    </div>
  </div>
  </header>
</div>
<div class="form" align="center">
  <form name="input" method="post">
<style type="text/css">
  body {
  background:#f0f0f0;
  }
  input[type=submit] {
    align-items: center;
    display: inline-block;
    color: black;
    font-weight: 700;
    text-decoration: none;
    user-select: none;
    padding: .5em 2em;
    outline: none;
    border: 2px solid;
    border-radius: 1px;
    transition: 0.2s;
  }
  input[type=submit]:hover {
     background: rgba(255,255,255,.2);
     color: red;
   }

  table {
    background: white;
    border-color: #0066A2;
    border: 3px;
    border-spacing: 0 10px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
  }
  th {
    padding: 10px 20px;

  }
  th:first-child {
    text-align: left;
  }
  th:last-child {
    border-right: none;
  }
  td {
    vertical-align: middle;
    padding: 10px;
    font-size: 14px;
    text-align: center;
  }
  td:nth-child(2){
    text-align: left;
  }
</style>
<table  id="info-group">
  <tr>
      <td>Назва курсу:</td>
     <td><input type="name" name="special"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Додати" name="enter" align="center"></td>
  </tr>
</table>
</form>
  </div>
</body>
</html>
