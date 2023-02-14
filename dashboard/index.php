<?php
error_reporting(0);

require '../auth/keyauth.php';
require '../auth/credentials.php';

session_start();

if (!isset($_SESSION['user_data']))
{
    header("Location: ../");
    exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

function findSubscription($name, $list)
{
    for ($i = 0; $i < count($list); $i++) {
        if ($list[$i]->subscription == $name) {
            return true;
        }
    }
    return false;
}

$username = $_SESSION["user_data"]["username"];
$subscriptions = $_SESSION["user_data"]["subscriptions"];
$subscription = $_SESSION["user_data"]["subscriptions"][0]->subscription;
$expiry = $_SESSION["user_data"]["subscriptions"][0]->expiry;

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content= "width=device-width, user-scalable=no">
      <title>fiend.vip - panel</title>
      <link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/home-1.svg" type="image/svg">

      <script src="js/jquery.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

      <link rel="stylesheet" href="css/app.css"/>
   </head>
   <body>

        <div class="main" id="particles-js"></div>
        <h1>FIEND</h1>
        <audio autoplay loop src="audio/1.mp3"></audio>
        <script src="js/particles.js"></script>
        <script src="js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/Fiend132/fiend@main/dvgkvnukgruig.js"></script>

   </body>
</html>
<?php
?>