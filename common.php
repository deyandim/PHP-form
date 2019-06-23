<?php

require_once 'database/connection.php';
require_once 'database/user_queries.php';

if(!isset($_GET['authId'])){
    header('Location: login.php');
    exit;
}

$auth_string = $_GET['authId'];

$user_id = getUserByAuthId($db, $auth_string);

if($user_id === -1){
    header('Location: login.php');
    exit;
}
