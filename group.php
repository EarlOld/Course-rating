<?php
  require "standartDB.php";
  $data = $_POST;
  if (isset($data['enter'])) {
  if (empty($data['name']) && empty($data['curator'])&& empty($data['head'])) {
    # code...
  }
  else{
    $name = $data['name'];
    $curator = $data['kurator'];
    $head = $data['head'];
    $vidd = $data['vidd'];
    $course =  $data['course'];
    $mysqli->query("INSERT INTO `myGroup` (`Gr_key`, `Gr_name`, `Gr_kurator`, `Gr_head`) VALUES (NULL, '".$name."', '".$curator."' , '".$head."')" );
     $result = $mysqli->query("SELECT Gr_key FROM `myGroup` WHERE `Gr_name` = '".$name."' LIMIT 1" );
     $row = $result->fetch_assoc();
     print_r($row);
     $SQL = "INSERT INTO Location VALUES ('".$row['Gr_key']."','".$vidd."','".$course."')";
     echo "$SQL";
     $mysqli->query( $SQL) or die ("<b>Query fail8585ed:</b> " . mysql_error());
    #echo "Ok add";
  }
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>Рейтинг студентів ЖАТК</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
  <link href="css/style_main.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <header>
  <div id="topnav" class="navbar ">
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
<table id="info-group">
  <tr>
      <td>Назва групи:</td>
     <td><input type="name" name="name"></td>
  </tr>
  <tr>
      <td>Куратор:</td>
     <td><input type="name" name="kurator"></td>
  </tr>

  <tr>
      <td>Староста:</td>
     <td><input type="name" name="head"></td>
  </tr>

  <tr>

    <td>Спеціальність до якої належить:</td>
    <td><select name="vidd" id="vidd">
<?php

  $result =  $mysqli->query ("SELECT * FROM Profession ORDER BY Pro_key")
                  or die ("<b>Query failed:</b> " . mysql_error());

  while ($row = $result->fetch_assoc()){

    echo "<option value=' ".$row['Pro_key']." '>".$row['Pro_name']."</option>";
  }

?>



    </select></td>
  </tr>
  <tr>
      <td>Курс:</td>
     <td><select name="course" id="course">
     <?php

        $result =  $mysqli->query ("SELECT * FROM Course ORDER BY Cour_key")
                        or die ("<b>Query failed:</b> " . mysql_error());

        while ($row = $result->fetch_assoc()){

          echo "<option value=' ".$row['Cour_key']." '>".$row['Cour_name']."</option>";
        }
        $mysqli->close();
      ?>


     </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Додати" name="enter" align="center"></td>
  </tr>
</table>
</form>
  </div>

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via build script -->
  <script src="js/plugins.js"></script>
  <script src="js/bootstrap-dropdown.js"></script>
  <script src="js/bootstrap-scrollspy.js"></script>
  <script src="js/bootstrap-tab.js"></script>
  <script src="js/bootstrap-collapse.js"></script>
  <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <script type="text/javascript" src="js/form-validation.js"></script>


  <script src="js/custom.js"></script>
  <!-- end scripts -->

</body>
</html>
