<?php /** @var $model \Models\ViewModel\UserRegisterViewModel */ ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RegForm</title>
    <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
<form>
    Username:<input type="text" name="username">
    Password:<input type="password" name="password">
    <input type="submit">
</form>

<p>
    My password is <?=
    $model->getUsername() ?>
</p>

</body>
</html>