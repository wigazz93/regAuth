<?php
session_start();
if(!$_SESSION['user']){
   header('Location: auth.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css">
   <title>Profile</title>
</head>

<body>
   <div class="wrap">
      <form>
         <h2>
            <?= $_SESSION['user']['name']  ?>
         </h2>
         <a href="#"> <?= $_SESSION['user']['email']?> </a>
         <a href="logout.php" class="logout">выйти</a>
      </form>
   </div>
</body>

</html>