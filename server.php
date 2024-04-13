<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "Tasks";

try{

$connection == new PDO("mysql:host = $host; dbname = $db",$user, $pass);

}catch(PDOException $e){
    echo $e->getMessage();
    die("Connection failed");
}
?>