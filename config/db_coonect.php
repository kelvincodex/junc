<?php 
// connect to db with mysql
$servername = 'localhost';
$username = 'keshi';
$password = 'kesh1234';
$dbname = 'practice1';

$connect = mysqli_connect($servername, $username, $password, $dbname);

if ($connect == false) {
    echo 'connection error: ' . mysqli_connect_error();
};



 ?>