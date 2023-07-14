<?php

function checkPassword($email, $password) : bool
{
	$hash = md5($password);
	$safeEmail = mysqli_real_escape_string(connect(), $email);
    $result = mysqli_query(connect(), "select * from users where email = '$safeEmail'" );
	$user = mysqli_fetch_assoc($result);
	return $hash === $user['password'];
}
