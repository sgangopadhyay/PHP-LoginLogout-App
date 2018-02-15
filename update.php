<?php
require('session.php');
?>
<?php
//PROGRAM : PHP program to UPDATE a Record in MySQL database for the CRUD App
//CODED BY : SUMAN GANGOPADHYAY
//DATABASE NAME : php_mysqli
//Table Name : userinfo
//DATE : 20-July-2014
$id = $_GET['id'];
$user = 'root';
$password = 'suman';
$ip = 'localhost';
$dbname = 'php_mysqli';
$connection_update = mysqli_connect($ip, $user, $password, $dbname);
$id = $_GET['id'];
if (!mysqli_connect_errno()){
  $query = "SELECT `name`,`user`,`password` FROM login_system WHERE `id`='{$id}'";
  $result = mysqli_query($connection_update,$query);
  if ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    $name=$row['name'];
    $login_id=$row['user'];
    $user_password=$row['password'];
  }
}else{
  echo "ERROR : Database connection failed !"."<br>";
}
mysqli_close($connection_update);
require('update.html');
//Update the data and Save it into the MySQL database;
if (isset($_POST['submit'])) {
  $user = 'root';
  $password = 'suman';
  $ip = 'localhost';
  $dbname = 'php_mysqli';
  $fname = $_POST['username'];
  $login = $_POST['login'];
  $psw = $_POST['psw'];
  $connection_write = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "UPDATE login_system SET `name`='{$fname}',`user`='{$login}',
             `password`='{$psw}' WHERE `id`='{$id}' ";
    if(mysqli_query($connection_write, $query)){      
      header("location:conf.php");
    }else{
      echo "<script>alert('ERROR : Database Insert Failed because login name exists');</script>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($connection_write);
}
?>
