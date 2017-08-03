
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
  <script src="js/modernizr-2.5.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $("select[name=status]").empty();
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
    $("select[name=student]").change(function(){
      $("select[name=status]").empty();
      $("select[name=current_group]").empty();
      $("input[name=name]").empty();
      $("input[name=bal]").empty();
      $("input[name=dod_bal]").empty();
      var student = {student: $("select[name=student]").val()};
      var group =  $("select[name=group]").val();
      $.ajax({
        url: 'main-getStudentById.php',
        type: 'GET',
        data: student,
        success: function(data){
          data = jQuery.parseJSON(data);
          console.log(data);

          for (id in data) {
            if (data[id].St_status == 0) {
              $("select[name=state]").append($("<option  selected='selected' value='0'>Контракт</option>"));
              $("select[name=state]").append($("<option value='1'>Бюджет</option>"));
            }
            if (data[id].St_status == 1) {
              $("select[name=state]").append($("<option value='0'>Контракт</option>"));
              $("select[name=state]").append($("<option  selected='selected' value='1'>Бюджет</option>"));
            }
            $("input[name=name]").val(data[id].St_name);
            $("input[name=bal]").val(data[id].St_bal);
            $("input[name=dod_bal]").val(data[id].St_dod_bal);
          }
        }
      });
      $.ajax({
        url: 'main-GetGroupByStudents.php',
        type: 'GET',
        success: function(data){
          data = jQuery.parseJSON(data);
          console.log("111111111111");
          console.log(data);
          for (id in data) {
            if (data[id].Gr_key == group) {
              $("select[name=current_group]").append($("<option selected='selected' value='"+ data[id].Gr_key  +"'>"+ data[id].Gr_name+"</option>"));
              break;
            }
            $("select[name=current_group]").append($("<option value='"+ data[id].Gr_key  +"'>"+ data[id].Gr_name+"</option>"));
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
    var name = {name: $("input[name=name]").val()};
    var bal = {bal: $("input[name=bal]").val()};
    var dod_bal = {dod_bal: $("input[name=dod_bal]").val()};
    var state = {state: $("select[name=state]").val()};
    var current_group = {current_group: $("select[name=current_group]").val()};
    var student = {student: $("select[name=student]").val()};
    console.log(student, name, current_group, bal, dod_bal);
    $.ajax({
      url: 'vidd-updateStudent.php',
      type: 'GET',
      data: {student, name, bal, dod_bal, state, current_group},
      success: function(data){
      console.log(data);
      }
    });
  });
  $("select[name=group]").bind("change",function(){
    $("select[name=student]").empty();
    var group = {group: $("select[name=group]").val()};
    console.log(group);
    $.ajax({
      url: 'main-getStudentsGroup.php',
      type: 'GET',
      data: group,
      success: function(data){
        data = jQuery.parseJSON(data);
        console.log(data);
        $("select[name=student]").append($("<option  selected='selected' value=''></option>"));
        for (id in data) {
          $("select[name=student]").append($("<option value='"+ data[id].St_key +"'>" + data[id].St_name+"</option>"));
        }
      }
    });
  });
  });
  </script>
</head>
<body>
<div class="container">
  <header>
    <div id="topnav" class="navbar">
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
    input[type=text] {
      width: 100%;
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
          <td>Виберіть курс:</td>
         <td><select class="course" name="course" id="course">
           <option value=""></option>
         </select></td>
      </tr>
      <tr>
          <td>Виберіть групу:</td>
         <td><select class="group" name="group" id="group">
           <option value=""></option>
         </select></td>
      </tr>
      <tr>
          <td>Виберіть студента:</td>
         <td><select class="student" name="student" id="student">
            <option value="-1"  selected="selected"></option>
         </select></td>
      </tr>
      <tr>
        <td>ПІБ:</td>
        <td><input id="name" type="text" name="name" align="center  "></td>
      </tr>
      <tr>
        <td>Основа на якій вчиться студент:</td>
        <td>
          <select id="state" name="state">
          </select>
        </td>
      </tr>
      <tr>
        <td>Поточна група:</td>
        <td>
          <select id="current_group" name="current_group">
          </select>
        </td>
      </tr>
      <tr>
        <td>Бал:</td>
        <td><input id="bal" type="text" name="bal"></td>
      </tr>
      <tr>
        <td>Додатковий бал:</td>
        <td><input id="dod_bal" type="text" name="dod_bal"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input id="enter" type="submit" value="Оновити дані" name="enter" align="center"></td>
      </tr>
    </table>
</form>
  </div>
</body>
</html>
