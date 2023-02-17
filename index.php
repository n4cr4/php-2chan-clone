<?php include_once('./app/database/connect.php'); ?>

<?php include('./app/parts/db_modify.php'); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2chan</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include('./app/parts/header.php'); ?>
    <?php include('./app/parts/validation.php'); ?>
    <?php include('./app/parts/thread.php'); ?>
    <?php include('./app/functions/pdo_delete.php'); ?>
    <?php include('./app/parts/newThreadButton.php'); ?>
</body>

</html>