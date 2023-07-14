<?php

function registerUser($name, $email, $password)
{
	$safeName = mysqli_real_escape_string(connect(), $name);
    $safeEmail = mysqli_real_escape_string(connect(), $email);
    
    $hash = md5($password);

    $result = mysqli_query(connect(), 
    	"insert into users (name, email, password) values
    	('$safeName', '$safeEmail', '$hash')");

    return $result;
}
