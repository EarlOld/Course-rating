<div id="topnav" class="navbar">
  <div class="navbar-inner" align="CENTER">
    <div class="container">

      <div class="nav-collapse">
        <a href="add.php" class="button8">Додати</a>
        <a href="remove.php" class="button8">Видалити</a>
        <a href="update.php" class="button8">Змінити</a>
        <a href="add.php" class="button8">Пошук</a>
        <?php if($_SESSION['logged_user'] == 'admin') echo "<a href='signup.php' class='button8'>Реєстрація</a>"; ?>
      </div>
    </div>
  </div>
    <?php echo "<div class='button8 hello'>Привіт, ".$_SESSION['logged_user']."!</div>"; ?>
    <?php echo "<a href='exit.php' class='button8 exit'>Exit</a>"; ?>
</div>
