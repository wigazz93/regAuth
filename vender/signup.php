<?php
 session_start();
 
require_once 'connect.php';

   $full_name=$_POST['full_name'];
   $login=$_POST['login'];
   $password=$_POST['password'];
   $email=$_POST['email'];
   $confirm_password=$_POST['confirm_password'];

$res=mysqli_query($link,"SELECT * FROM `users` WHERE `login`='$login'");
$ch_login=mysqli_fetch_assoc($res) ;

$error_fields=[];

if(!empty($ch_login)){
   $response=[
      "status"=>false,
      "type"=>1,
      "message"=>'Такой логин уже существует',
      "fields"=>$error_fields
   ];
   echo json_encode($response);
   die();
}  
   

   if($login===''){
      $error_fields[]='login';
   }
   if($full_name===''){
      $error_fields[]='full_name';
   }
   if($email===''){
      $error_fields[]='email';
   }
   if($password===''){
      $error_fields[]='password';
   }
   if($confirm_password===''){
      $error_fields[]='confirm_password';
   }
   
   if(!empty($error_fields)){
      $response=[
         "status"=>false,
         "type"=>1,
         "message"=>'ПРоверьте правильность полей',
         "fields"=>$error_fields
      ];
      
      echo json_encode($response);
      die();
   }
   
   if($password===$confirm_password){
      if(empty($error_fields)) {
         
         //$password=md5($password);
         
         $query="INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`) VALUES (NULL, '$full_name', '$login', '$email', '$password')";
         mysqli_query($link,$query);
           
         $response=[
            "status"=>true,
            "message"=>'Регистрация прошла успешно'
         ];
         echo json_encode($response);         
         //$_SESSION['message']="регистрация прошла успешно";
         //header('Location: ../auth.php');
      }
      else{
         $response=[
            "status"=>false,
            "message"=>'Забыли заполнить поля'
         ];
         echo json_encode($response);
         //echo "Забыли заполнить Логин или Пароль";
         //header('Location: ../reg.php');
      }
   }
   else{
      $response=[
         "status"=>false,
         "message"=>'Пароли не совпали'
      ];
      echo json_encode($response);
      //$_SESSION['message']='пароли не совпали';
      //header('Location: ../reg.php');
   }
   $password=md5($password);
   
?>