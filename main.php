<?php
	require "standartDB.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
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
          $("select[name=course]").bind("change", function(){
           $("select[name=group]").empty();
					 $("div#info-group").empty();
					 $("#students").empty();
    			var course = {course: $("select[name=course]").val()};
          var profession = {profession: $("select[name=profession]").val()};
					$.ajax({
            url: 'main-getStudentsCourse.php',
            type: 'GET',
						data: {course, profession},
            success: function(data){
              data = jQuery.parseJSON(data);
              console.log(data);
							$("div#info-group").append($("<p class='content'>"+ "Кількість студентів на даному курсі: " + data.length + "." + "</p>"));
							var dataTrue = data.filter((item) => item.St_status == 1);
							var dataFalse = data.filter((item) => item.St_status == 0);



							dataTrue.sort((a, b) => {
							  return b.St_rait - a.St_rait;
							});
							dataFalse.sort((a, b) => {
							  return b.St_rait - a.St_rait;
							});
							data = dataTrue.concat(dataFalse);
							var count = parseInt	(dataTrue.length * 0.45);

							$("div#info-group").append($("<p class='content'>"+ "Кількість бюджетних місць: " + dataTrue.length + "." + "</p>"));
							$("div#info-group").append($("<p class='content'>"+ "Кількість місць на стипендію: " + count + "." + "</p>"));
							var flag = 0;
							for (id in data) {
								var num = +id + 1;
								if (flag < count){

									//$("#" + id + "").addClass("my_green");
									$("#students").append($("<tr class='my_green' id=" + id + ">" + "<td>" + num + "</td>" + "<td>" + data[id].St_name + "</td>" + "<td>" + data[id].St_bal + "</td>" + "<td>" + data[id].St_dod_bal + "</td>" + "<td>" + data[id].St_rait + "</td>" + "</tr>"));
									flag++;
									continue;
								}
								$("#students").append($("<tr class='' id=" + id + ">" + "<td>" + num + "</td>" + "<td>" + data[id].St_name + "</td>" + "<td>" + data[id].St_bal + "</td>" + "<td>" + data[id].St_dod_bal + "</td>" + "<td>" + data[id].St_rait + "</td>" + "</tr>"));

							}
            }
          });
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

								$("div#info-group").append($("<p class='left'>"+ "Назва групи: " + data[id].Gr_name + "." + "</p>"));
								$("div#info-group").append($("<p class='content'>"+ "Староста групи: " + data[id].Gr_head + "." +"</p>"));
								$("div#info-group").append($("<p class='content'>"+ "Куратор групи: " + data[id].Gr_kurator + "." +"</p>"));

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
				$("select[name=group]").bind("change",function(){
          $("div#info-group").empty();
					$("#students").empty();
        	var group = {group: $("select[name=group]").val()};
					console.log(group);
          $.ajax({
            url: 'main-getStudentsGroup.php',
            type: 'GET',
						data: group,
            success: function(data){
              data = jQuery.parseJSON(data);
              console.log(data);
							$("div#info-group").append($("<p class='content'>"+ "Кількість студентів в групі: " + data.length + "." + "</p>"));
							var dataTrue = data.filter((item) => item.St_status == 1);
							var dataFalse = data.filter((item) => item.St_status == 0);
							var count = parseInt	(dataTrue.length * 0.45);

							$("div#info-group").append($("<p class='content'>"+ "Кількість бюджетних місць: " + dataTrue.length + "." + "</p>"));
							$("div#info-group").append($("<p class='content'>"+ "Кількість місць на стипендію: " + count + "." + "</p>"));
							dataTrue.sort((a, b) => {
							  return b.St_rait - a.St_rait;
							});
							dataFalse.sort((a, b) => {
							  return b.St_rait - a.St_rait;
							});
							data = dataTrue.concat(dataFalse);
							console.log("2", data);
							var flag = 0;
							for (id in data) {
								var num = +id + 1;
								if (flag < count){

									//$("#" + id + "").addClass("my_green");
									$("#students").append($("<tr class='my_green' id=" + id + ">" + "<td>" + num + "</td>" + "<td>" + data[id].St_name + "</td>" + "<td>" + data[id].St_bal + "</td>" + "<td>" + data[id].St_dod_bal + "</td>" + "<td>" + data[id].St_rait + "</td>" + "</tr>"));
									flag++;
									continue;
								}
								$("#students").append($("<tr class='' id=" + id + ">" + "<td>" + num + "</td>" + "<td>" + data[id].St_name + "</td>" + "<td>" + data[id].St_bal + "</td>" + "<td>" + data[id].St_dod_bal + "</td>" + "<td>" + data[id].St_rait + "</td>" + "</tr>"));

							}
            }
          });
        });
    	});
    </script>
  </head>
  <body class="body">
		<header>
			<?php
			if (isset($_SESSION['logged_user'])) {
				$profession =  $mysqli->query("SELECT * FROM users WHERE login = '".$_SESSION['logged_user']."'") or die ("<b>Query failed:</b> " . mysql_error());
				$rezult = array();
				while ($row = $profession->fetch_assoc()){
					if ($row[isadmin] == 1) {
						require "admin-panel.php";
					}
					if ($row[depHead] == 1) {
						require "admin-panel.php";
					}
					if ($row.[groupHead] != 0) {
						require "admin-panel.php";
					}
				}
			}
			else {
				require "user-panel.php";
			}
		?>
		</header>
    	<div class="container-fluid">
			<div class="container select">
        <div class="row">
  				<div class="col-xs-6" align="CENTER">
						<h1>Виберіть пункти, будь ласка:</h1>
  					<select class="departament" name="departament" id="departament">
              <option value="-1"></option>
  					</select>
						<select class="profession" name="profession" id="profession">
              <option value="-1"  selected="selected"></option>
  					</select>
						<select class="course" name="course" id="course">
              <option value=""></option>
  					</select>
						<select class="group" name="group" id="group">
              <option value=""></option>
  					</select>
  				</div>
          <div class="col-xs-6">
  					<h1>Додадкова інформація:</h1>
						<div id="info-group">

						</div>
  				</div>
  			</div>
			</div>
			<div align="CENTER" ><h1>Інформація про рейтинг:</h1></div>
			<div id="content">
        <table class="features-table">
        <thead >
        	<tr>
        		<td>№</td>
        		<td class="grey">ПІБ</td>
        		<td>Середній бал</td>
        		<td class="green">Додатковий бал</td>
						<td class="green">Рейтинг</td>
        	</tr>
        </thead>
        <tbody id="students">

        </tbody>
        </table>
			</div>
    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
