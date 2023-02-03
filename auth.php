<?php
session_start();
if($_SESSION['user']){
   header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css">
   <title>Auth</title>
</head>

<body>
   <div class="wrap">
      <form class="auth">
         <label for="login">Логин </label>
         <input type="text" name="login" placeholder="Insert log">
         <label for="password">Пароль</label>
         <input type="password" name="password" placeholder="insert pass">
         <button type="submit" class="btn-log">Отправить</button>

         <p>Нет аккаунта- <a href="reg.php">Зарегистрируйся</a></p>
         <p class="mes none">tgt</p>
         <?php 
            // if($_SESSION['message']){
            //   echo'<p class="mes">'.$_SESSION['message'].'</p>';
            //   }
            //unset($_SESSION['message']);
            ?>

      </form>
   </div>
   <!--<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
      crossorigin="anonymous"></script>-->
   <script src="js/mainor.js"></script>
</body>


</html>