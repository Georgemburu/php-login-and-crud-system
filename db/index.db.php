<?php

$host = 'localhost';
$dbUsername = 'tester';
$dbPassword = '1234tester1234';
$dbName = 'listing';


$conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    echo 'db not connected:'.mysqli_connect_error();
}