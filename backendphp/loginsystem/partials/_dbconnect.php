<?php
$servername='localhost';//on xampp
$username='root';//your username
$password='';//your password
$dbname='users';//replace with your database name
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
    die('connection unsuccessful: ' . mysqli_connect_error());
}
?>