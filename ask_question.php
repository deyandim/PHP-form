<?php

require_once 'common.php';

$category_id = 1;

if (isset($_GET['category_id'])){
    $category_id = intval($_GET['category_id']);
}

require_once 'database/categories_queries.php';
require_once 'database/tags_queries.php';

$categories = getAllCategories($db);
$tags = getAllTags($db);

if(isset($_POST['title'], $_POST['body'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    $existing_tags = $_POST['existing_tags'];
    $new_tags = explode(',', $_POST['new_tags']);
    require_once 'database/question_queries.php';

    $result = createQuestion($db, $user_id, $title, $body, $category, $existing_tags, $new_tags);
}


if(isset($_POST['new_tags'])){
    $tags = explode(',', $_POST['new_tags']);
    addTags($db, $tags);
}

require_once 'templates/ask_question.php'

?>



