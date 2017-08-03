<?php
	require "db.php";
	$data = $_POST;
	if (isset($data['do_signup'])) {
		$errors = array();
		if (trim($data['login']) == '') {
			# code...
			$errors[] = "Введіть login";
		}
		if (trim($data['email']) == '') {
			# code...
			$errors[] = "Введіть email";
		}
		if ($data['password'] == '') {
			# code...
			$errors[] = "Введіть password";
		}
		if ($data['password_2'] != $data['password']) {
			# code...
			$errors[] = "Повторний пароль не збігаєтья!";
		}
		if (R::count('users', "email = ?", array($data['email'])) > 0) {
			# code...
			$errors[] = "Користувач з таким імейлом вже існує!";
		}

		if (R::count('users', "login = ?", array($data['login'])) > 0) {
			# code...
			$errors[] = "Користувач з таким логіном вже існує!";
		}

		if (empty($errors)) {
			$user = R::dispense( 'users' );
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->date = time();
			$user->password = md5($data['password']);
			$user->isadmin = false;
			R::store($user);
			echo '<div class="my_regestration">Ви успішно зареєстровані!</div>';

			// header('Location:main.php', true, 301);
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
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    	<div class="container">
			<div class="login-form">
				<div class="col-sm-6 col-sm-offset-3">
				<h1 class="signup-heder-text">Форма реєстрації</h1>
				<form class="form-horizontal" method="POST">
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Логін:</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="login" id="inputEmail3"  value="<?php echo @$data['login']; ?>" placeholder="Логін">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" name="email" value="<?php echo @$data['email']; ?>" id="inputEmail3" placeholder="Email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Пароль:</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Пароль">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Повторіть пароль:</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="password_2" id="inputPassword3" placeholder="Пароль">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" name="do_signup" class="btn btn-primary">Увійти</button>
				</div>
			  </div>
			</form>
			</div>
			</div>
    	</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
