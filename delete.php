<?php
require('session.php');
?>
<?php
//PROGRAM : To make data delete (invisible) from user but not from MySQL Database
//CODED BY : SUMAN GANGOPADHYAY
//DATABASE NAME : php_mysqli
//Table Name : userinfo
//DATE : 20-July-2014
$user = 'root';
$password = 'suman';
$ip = 'localhost';
$dbname = 'php_mysqli';
$connection_delete = mysqli_connect($ip, $user, $password, $dbname);
$id = $_GET['id'];
if (!mysqli_connect_errno()){
  $visibility = 0;
  $update_query = "UPDATE login_system SET `visible`= '{$visibility}' WHERE `id`='{$id}' ";
  if (mysqli_query($connection_delete,$update_query)) {
    echo "<script>window.location.href = 'index.php'</script>";
  }else{
    echo "ERROR : failed to Delete data"."<br>";
  }
}else{
  echo "ERROR : Database connection failed !"."<br>";
}
mysqli_close($connection_delete);
?>
