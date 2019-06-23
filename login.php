<?php
require_once 'common.php';
require_once 'templates/login_form.php';
require_once 'database/user_queries.php';

if(isset($_POST['login'])){
    $username = $_POST['username_login'];
    $password = $_POST['password_login'];


}