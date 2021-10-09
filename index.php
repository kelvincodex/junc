<?php
// connect to db with mysql
$servername = 'localhost';
$username = 'keshi';
$password = 'kesh1234';
$dbname = 'practice1';

$connect = mysqli_connect($servername, $username, $password, $dbname);

if ($connect == false) {
    echo 'connection error: ' . mysqli_connect_error();
} else {
    echo 'connected!!!';
}
// write query

$sql = 'SELECT id,name,email FROM practice';
// make the query

$result = mysqli_query($connect, $sql);

// fetch the result as array

$queryarr = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

// close connect
mysqli_close($connect);

print_r($queryarr);





// try{
//   $connect = new PDO("mysqli:host=$servername;dbname=practice1",$username,$password);
  
//   // set the PDO mode to exeption

//   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTION);
//   echo "connection successfully";

// } catch(PDOEXCEPTION $e){
//   echo "connection error: " . $e ->getMessage();
// }

// check connection
?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include("templates/header.php"); ?>

<h4 class="grey-text center-align">Shawarma's</h4>

<div class="container">
<div class="row">

<?php foreach ($querrarr as $shawama) { ?>

<div class="col s6 m3">
  <div class="card">
   

  </div>
  
</div>
<?php } ?>
</div>

<?php include("templates/footer.php"); ?>
  
</body>
</html>




