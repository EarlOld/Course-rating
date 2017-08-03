<?php
  require "standartDB.php";


  $data = $_POST;


  if (isset($data['enter'])) {



  if (empty($data['vidd']) && empty($data['head'])) {
    # code...
  }
  else{

    $name = $data['vidd'];
    $hed = $data['head'];

    $mysqli->query("INSERT INTO `Departaent` (`Dep_key`, `Dep_name`, `Dep_head`) VALUES (NULL, '".$name."', '".$hed."')" );

    echo "Ok add";
  }

    }

  $mysqli->close();

?>



<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <title>Рейтинг студентів ЖАТК</title>
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/table_style.css" type="text/css"  />
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link href="css/style_main.css" rel="stylesheet">



  <link href='http://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/modernizr-2.5.3.min.js"></script>

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
        <td>Назва відділення:</td>
        <td><input type="name" name="vidd"></td>
      </tr>
      <tr>
        <td>Заввідділення:</td>
        <td><input type="name" name="head"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input class="button8" type="submit" value="Додати" name="enter" align="center"></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
