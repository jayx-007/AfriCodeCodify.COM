<?php

	// DB Connetion String parameter variable declearation:
	$host= "localhost";
	$username= "root";
	$password= "";
	$db_name= "api-users";

	// DB Connetion String method:
	$conn= mysqli_connect($host,$username,$password,$db_name);	// DB connection

	// Checkes if database connects successfully: 
	if(!$conn){

		die("Database Connection Failed..!".mysqli_connect_error());
		
	}




  ?>