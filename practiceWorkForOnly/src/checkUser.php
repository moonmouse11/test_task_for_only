<?php

function checkUser($email)
{
    $safeEmail = mysqli_real_escape_string(connect(), $email);
    $result = mysqli_query(connect(), "select * from users where email = '$safeEmail'" );

    return mysqli_fetch_assoc($result);
}
