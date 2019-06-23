<?php

require_once 'common.php';

if(!isset($_GET['id'])){
    header('Location: categories.php');
    exit;
}

$id = $_GET['id'];

require_once 'database/categories_queries.php';


var_dump(getQuestionByCategoryId($db, $id));