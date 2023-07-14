<?php

function connect() 
{
	$localhost = "localhost";
	$name = "root";
	$password = "";
	$dbName = "usersForOnly";

	static $connection;

	if ($connection === null) {
		$connection = mysqli_connect($localhost, $name, $password, $dbName);
	}

	return $connection;
}
