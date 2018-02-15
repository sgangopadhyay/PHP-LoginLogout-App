<?php
session_start();
$ip ='localhost';
$username = 'root';
$password = 'suman';
$dbname = 'php_mysqli';
$user_check = $_SESSION['login_user'];
$connection = mysqli_connect($ip, $username, $password, $dbname);
$ses_sql = mysqli_query($connection,"SELECT `user` FROM login_system WHERE `user` = '{$user_check}' ");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['user'];
if(!isset($_SESSION['login_user'])){
  header("location:index.php");
}
?>
