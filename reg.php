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
   <title>Reg</title>
</head>

<body>
   <div class="wrap">
      <form class="reg">
         <label for="full_name">ФИО </label>
         <input type="text" name="full_name" placeholder="Insert your name">
         <label for="login">Логин </label>
         <input type="text" name="login" placeholder="Insert log">
         <label for="email">Почта </label>
         <input type="email" name="email" placeholder="Insert mail">
         <label for="password">Пароль</label>
         <input type="password" name="password" placeholder="insert pass">
         <label for="confirm_password">Подтвердите пароль</label>
         <input type="password" name="confirm_password">
         <button type="submit" class="btn-reg">Зарегистрироваться</button>
         <p>Есть аккаунт- <a href="auth.php">Авторизируйся</a></p>
         <p class="mes none">Lorem ipsum dolor sit amet.</p>
      </form>
   </div>
   <script>
   let reg = document.querySelector(".reg");

   reg.addEventListener("submit", func2);

   async function func2(e) {
      let inputs = document.querySelectorAll("input");
      let login = document.querySelector('input[name="login"]');
      let password = document.querySelector('input[name="password"]');
      let mes = document.querySelector(".mes");
      let full_name = document.querySelector('input[name="full_name"]');
      let email = document.querySelector('input[name="email"]');
      let confirm_password = document.querySelector(
         'input[name="confirm_password"]'
      );
      e.preventDefault();
      for (let el of inputs) {
         el.classList.remove("error");
      }
      let response = await fetch("vender/signup.php", {
         method: "POST",
         body: new FormData(this),
      });

      let result = await response.json();

      if (result.status === true) {
         document.location.href = "/profile.php";
      } else {
         if (result.type === 1) {
            result.fields.forEach((field) => {
               for (let input of inputs) {
                  if (input["name"] == field) {
                     input.classList.add("error");
                  }
               }
            });
         }

         mes.classList.remove("none");
         mes.textContent = result.message;
      }
   }
   </script>
</body>

</html>