<?php
session_start();
if(isset($_POST['submit'])) {
  $ip ='localhost';
  $username = 'root';
  $password = 'suman';
  $dbname = 'php_mysqli';
  $visibility = 1;
  $connection = mysqli_connect($ip, $username, $password, $dbname);
  $myusername = mysqli_real_escape_string($connection,$_POST['username']);
  $mypassword = mysqli_real_escape_string($connection,$_POST['password']);
  $sql = "SELECT `id` FROM login_system WHERE `user`= '{$myusername}' and `password` = '{$mypassword}' AND `visible` = '{$visibility}'";
  $result = mysqli_query($connection,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];
  $count = mysqli_num_rows($result);
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count == 1) {
    $_SESSION['login_user'] = $myusername;
    header("location: conf.php");
  }else {
    echo "<script>alert('Your Login Name or Password is invalid');</script>";
  }
}
?>
<?php
require('index.html');
?>
