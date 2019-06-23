<?php

require_once 'database/connection.php';
require_once 'database/user_queries.php';

$response = '';

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    try {
        $result = registerUser($db, $username, $password, $confirm_password);

        header("Location: login.php");

    } catch (Exception $e) {
        echo $e->getMessage();
    }


}

require_once 'templates/register_form.php';

