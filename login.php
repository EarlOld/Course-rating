<?php
	require "db.php";
	
	$data = $_POST;
	if (isset($data['do_login'])) {
		$errors = array();
		$user = R::findOne('users', "login = ?", array($data['login']));
		if ($user) {
			# code...
			if (md5($data['password']) == $user->password) {
				$_SESSION = array();
				$_SESSION['logged_user'] = $user->login;
				header('Location: main.php', true, 301);
			}
			else
			{
				$errors[] = "Пароль не вірний!";
			}
		}
		else
		{
			$errors[] = "Корисувач з таким іменем не знайдений!";
		}
		if (empty($errors)) {
		}
		else
		{
			echo '<div class="errors">'.array_shift($errors).'</div>';
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    	<div class="container">
			<div class="login-form">
				<div class="col-sm-6 col-sm-offset-3">
				<h1 class="index-heder-text">Форма входу</h1>
				<form class="form-horizontal" method="POST">
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Логін:</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="login" id="inputEmail3" placeholder="Логін">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Пароль:</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Пароль">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" name="do_login" class="btn btn-primary">Увійти</button>
				</div>
			  </div>
			</form>
			</div>
			</div>
    	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
