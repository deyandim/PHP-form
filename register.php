<?php

require_once 'common.php';
require_once 'templates/register_form.php';
require_once 'database/user_queries.php';

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    try {
        registerUser($db, $username, $password);
        header("Location: login.php");
    }catch (Exception $e){
        echo $e->getMessage();
    }

}
