<?php

include __DIR__ . "/includeTemplate.php";
include __DIR__ . "/dbConnection.php";
include __DIR__ . "/checkUser.php";
include __DIR__ . "/registerUser.php";
include __DIR__ . "/checkPassword.php";

if (! empty($_SESSION['id'])) {
	session_start();
}
