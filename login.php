<?php
require_once 'database/connection.php';
require_once 'database/user_queries.php';
 $response = '';
if(isset($_POST['login'])){
    $username = $_POST['username_login'];
    $password = $_POST['password_login'];

    $user_id = verifyUser($db, $username, $password);

    if ($user_id !== -1){
        $auth_string = issueAthenticationString($db, $user_id);
        header("Location: categories.php?authId=$auth_string");
    }else {
        $response = 'Invalid username or password';
    }


}

require_once 'templates/login_form.php';
