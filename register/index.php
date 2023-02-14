<?php
include '../auth/keyauth.php';
include '../auth/credentials.php';

if (isset($_SESSION['user_data'])) {
	header("Location: dashboard/");
	exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

if (!isset($_SESSION['sessionid'])) {
	$KeyAuthApp->init();
}

$numKeys = $_SESSION["numUsers"];
$numUsers = $_SESSION["numKeys"];
$numOnlineUsers = $_SESSION["numOnlineUsers"];
$customerPanelLink = $_SESSION["customerPanelLink"];
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fiend.vip - register</title>
    <link rel="icon" href="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/lock-1.svg" type="image/svg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/main.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/notyf.css">
    
</head>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header><a href="../">fiend.vip</a> - register</header>
        <form method="POST"  autocomplete="off">

          <div class="field input">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter Username" maxlength="48">
          </div>

          <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password" maxlength="48">
          </div>

        <div class="field input">
            <label>License</label>
            <input type="text" name="key" placeholder="Enter License" maxlength="48">
        </div>

        <div class="field button">
          <input type="submit" name="register" value="Register">
        </div>
      </form>
      <div class="link">Already Have An Account? <a href="../login/">Login Now</a></div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/notyf.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/dvgkvnukgruig.js"></script>

  <?php
  if (isset($_POST['register'])) {
		// register with username,password,key
		if ($KeyAuthApp->register($_POST['username'], $_POST['password'], $_POST['key'])) {
			echo "<meta http-equiv='Refresh' Content='2; url=../dashboard/'>";
			echo '
                            <script type=\'text/javascript\'>
                            
                            const notyf = new Notyf();
                            notyf
                              .success({
                                message: \'You Have Successfully Registered\',
                                duration: 3500,
                                dismissible: true
                              });                
                            
                            </script>
                            ';
		}
	}
    ?>
  
</body>
</html>