<?php include_once('../database/connect.php'); ?>

<?php include('../functions/thread_add.php'); ?>
<?php include('../parts/db_modify.php'); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new thread</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include('../parts/header.php'); ?>
    <?php include('../parts/validation.php'); ?>

    <div style="padding-left: 36px; color: blue;">
        <h2 style="margin-top: 20px; margin-bottom: 0;">create new thread</h2>
    </div>
    <form method="post" class="formWrapper">
        <div>
            <label>thread title</label>
            <input type="text" name="title">
            <label>name</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="body" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="create" name="threadSubmitButton">
    </form>
</body>

</html>
