<?php

require_once 'common.php';
require_once 'database/connection.php';
require_once 'database/categories_queries.php';


$categories = getAllCategories($db);


require_once 'templates/categories_form.php';
