<?php
session_start();
require_once 'connect.php';

$login=$_POST['login'];
$password= $_POST['password'];
$query="SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'";
$res=mysqli_query($link,$query);
$user=mysqli_fetch_assoc($res);

$error_fields=[];

if($login===''){
   $error_fields[]='login';
}

if($password===''){
   $error_fields[]='password';
}

if(!empty($error_fields)){
   $response=[
      "status"=>false,
      "type"=>1,
      "message"=>'ПРоверьте логин или пароль',
      "fields"=>$error_fields
   ];
   
   echo json_encode($response);
   die();
}

$password=md5($_POST['password']);

if(!empty($user)){
      
   $_SESSION['user']=[
      "id"=>$user['id'],
      "name"=>$user['name'],
      "email"=>$user['email'],
   ];
      
   $response=[
      "status"=>true,
    
   ];
   
 echo json_encode($response);
 
   //header('Location: ../profile.php');   
}
else{
   $response=[
      "status"=>false,
      "message"=>'неверный логин или пароль'
   ];
   echo json_encode($response);
   
   //$_SESSION['message']='неверный логин или пароль';
   //header('Location: ../auth.php');
}



?>