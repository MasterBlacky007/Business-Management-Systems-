<?php
$serverName='localhost';
$uName='Nigeeth';
$pass='2018';
$dbName='nmdb';

$conn=mysqli_connect($serverName,$uName,$pass,$dbName);
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}

?>