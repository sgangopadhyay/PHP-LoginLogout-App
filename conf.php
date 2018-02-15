<?php
require('session.php');
?>
<?php
//PROGRAM : PHP program to Insert and Read from MySQL database
//CODED BY : SUMAN GANGOPADHYAY
//DATE : 20-July-2014
//DATABASE NAME : php_mysqli
//Table Name : userinfo
//WRITE INTO THE DATABASE
if (isset($_POST['submit'])) {
  $user = 'root';
  $password = 'suman';
  $ip = 'localhost';
  $dbname = 'php_mysqli';
  $fname = $_POST['fname'];
  $login = $_POST['login'];
  $psw = $_POST['psw'];
  $connection_write = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $visibility = 1;
    $query = "INSERT INTO login_system (`name`, `user`, `password`,`visible`)
             VALUES('{$fname}', '{$login}', '{$psw}', '{$visibility}')";
    if(mysqli_query($connection_write, $query)){
      echo "";
    }else{
      echo "Database Insert Failed";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($connection_write);
}
require("conf.html");
//READ DATA FROM DATABASE USING PHP
$user = 'root';
$password = 'suman';
$ip = 'localhost';
$dbname = 'php_mysqli';
$connection_read = mysqli_connect($ip, $user, $password, $dbname);
  if (!mysqli_connect_errno()) {
    $query = "SELECT * FROM login_system WHERE `visible` = 1";
    $result = mysqli_query($connection_read, $query);
    if($result){
      echo "<table id='tbl'>
    <tr>
      <th>Sl. No.</th>
      <th>Unique ID</th>
      <th>Name</th>
      <th>Login ID</th>
      <th>Password</th>
      <th>Update Record</th>
      <th>Delete Record</th>
    </tr>";
    $sl_no = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
      $sl_no = $sl_no + 1;
      $id = $row['id'];
      echo "<tr>";
      echo "<td>".$sl_no."</td>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".ucwords($row['name'])."</td>";
      echo "<td>".$row['user']."</td>";
      echo "<td>".$row['password']."</td>";
      echo "<td>"."<a href = 'update.php?id=$id' id='update'>EDIT</a>"."</td>";
      echo "<td>"."<a href = 'delete.php?id=$id' id='delete'>DEL</a>"."</td>";
      echo "</tr>";
  }
  echo "</table>";
    }
  }else{
    die("ERROR : ".mysqli_connect_error());
  }
  mysqli_close($connection_read);
?>
