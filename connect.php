<?php 
session_start();

$link = mysqli_connect('localhost', 'u765100_user', 'vbnmmnbv123', 'u765100_user');
mysqli_select_db ($link, "u765100_user");
mysqli_query($link, "SET NAMES utf8");

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];
?>