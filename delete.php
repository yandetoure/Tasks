<?php
require_once 'server.php';
include('header.php');
$id =$_GET['id'];
$task->deleteTask($id);
?>