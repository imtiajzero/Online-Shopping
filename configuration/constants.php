<?php
 //session starts
	session_start();
 //creat constants to store non repeating values
    define('SITEURL','https://localhost/Get_all/');
	define('LOCALHOST', 'localhost');
	define('DATABASE_USERNAME', 'root');
	define('DATABASE_PASSWORD', '');
	define('DATABASE_NAME', 'get_all');

	$conn=mysqli_connect(LOCALHOST,DATABASE_USERNAME,DATABASE_PASSWORD) or die(mysqli_error());//Database Connection

	$db_select=mysqli_select_db($conn,DATABASE_NAME) or die(mysqli_error()); //Selecting Database


?>