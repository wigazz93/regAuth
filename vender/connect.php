<?php 
$host='localhost';
$user='root';
$pass='';
$db='database';
$link=mysqli_connect( $host,$user,$pass,$db);
if(!$link){
   die('error connect to database');
}
?>