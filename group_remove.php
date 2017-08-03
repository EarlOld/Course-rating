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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      url: 'main-findDepartament.php',
        type: 'GET',
        success: function(data){
          data = jQuery.parseJSON(data);
          console.log(data);
          for(id in data){
            $("select[name=departament]").append($("<option value='"+data[id].Dep_key+"'>"+data[id].Dep_name+"</option>"));
            }
        }
    });

    $("select[name=departament]").bind("change", function(){
      $("select[name=profession]").empty();
      $("select[name=group]").empty();
      $("select[name=course]").empty();
      $("#students").empty();
      var departament = {departament: $("select[name=departament]").val()};
      console.log(departament);
      $.ajax({
        url: 'main-findProfession.php',
        type: 'GET',
        data: departament,
        success: function(data){
          data = jQuery.parseJSON(data);
          console.log(data);
          $("select[name=profession]").append($("<option  selected='selected' value=''></option>"));
          for(id in data){
            $("select[name=profession]").append($("<option value='"+data[id].Pro_key+"'>"+data[id].Pro_name+"</option>"));

          }
        }
      });
    });
    $("select[name=profession]").change(function(){
      $("select[name=group]").empty();
      $("select[name=course]").empty();
      $("#students").empty();
      $.ajax({
        url: 'main-findCourse.php',
        type: 'GET',
        success: function(data){
          data = jQuery.parseJSON(data);
            console.log(data);
            $("select[name=course]").append($("<option  selected='selected' value=''></option>"));
          for(id in data){
            $("select[name=course]").append($("<option value='"+data[id].Cour_key+"'>"+data[id].Cour_name+"</option>"));
          }
        }
      });
    });
    $("select[name=course]").bind("change", function(){
     $("select[name=group]").empty();
     $("div#info-group").empty();
     $("#students").empty();
    var course = {course: $("select[name=course]").val()};
    var profession = {profession: $("select[name=profession]").val()};
    $.ajax({
      url: 'main-findGroup.php',
      type: 'GET',
      data: {course, profession},
      success: function(data){
        data = jQuery.parseJSON(data);
        console.log(data);
        $("select[name=group]").append($("<option  selected='selected' value=''></option>"));
        $("div#info-group").append($("<p class='left'>" + "Кількість груп на даному курсі: " + data.length + "." + "</p>"));
        for(id in data){
          $("select[name=group]").append($("<option value='"+ data[id].Gr_key +"'>" + data[id].Gr_name+"</option>"));
        }
      }
    });
  });
  $('input#enter').click(function() {
    var group = {group: $("select[name=group]").val()};
    console.log(group);
    $.ajax({
      url: 'vidd-removeGroup.php',
      type: 'GET',
      data: group,
      success: function(data){
        data = jQuery.parseJSON(data);
        console.log(data);
      }
    });

  });
  });
  </script>
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
      <td>Виберіть відділення:</td>
     <td>
       <select class="departament" name="departament" id="departament">
         <option value="-1"></option>
       </select>
   </td>
  </tr>
  <tr>
      <td>Виберіть спеціальність:</td>
     <td><select class="profession" name="profession" id="profession">
       <option value="-1"  selected="selected"></option>
     </select></td>
  </tr>
  <tr>
      <td>Вибиріть курс:</td>
     <td><select class="course" name="course" id="course">
       <option value=""></option>
     </select></td>
  </tr>
  <tr>
      <td>Вибиріть групу:</td>
     <td><select class="group" name="group" id="group">
       <option value=""></option>
     </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input id="enter" type="submit" value="Видалити" name="enter" align="center"></td>
  </tr>
</table>
</form>
  </div>

</body>
</html>
