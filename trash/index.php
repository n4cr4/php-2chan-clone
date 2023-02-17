<?php
// $title = 'sk';
// var_dump($title);
// print_r($title);
include_once('./app/database/connect.php');

$error_message = array();

if(isset($_POST["submitButton"])){
    // $username = $_POST["username"];
    // var_dump($username);
    // $body = $_POST['body'];
    // var_dump($body);
    
    // validation
    if(empty($_POST['username'])) {
        $error_message['username'] = '名前が入力されていません';
    } else {
        $escaped['username'] = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTR-8');
    }
    if(empty($_POST['body'])) {
        $error_message['body'] = '本文が入力されていません';
    } else {
        $escaped['body'] = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTR-8');
    }


    if(empty($error_message)) {
        $post_date = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO `comment` (`username`, `body`, `post_date`) VALUES (:username, :body, :post_date);';
        $stmt = $pdo->prepare($sql);

        // set value
        $stmt->bindParam(':username', $escaped['username'], PDO::PARAM_STR);
        $stmt->bindParam(':body', $escaped['body'], PDO::PARAM_STR);
        $stmt->bindParam(':post_date', $post_date, PDO::PARAM_STR);

        $stmt->execute();
    }
} 

$comment_array = array();

// get data from 'comment' table
$sql = 'SELECT * FROM comment';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$comment_array = $stmt;

// var_dump($comment_array->fetchAll());

?>


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
    <header>
        <h1 class="title">2chan-clone</h1>
        <hr>
    </header>

    <!-- validation error -->
    <?php if(isset($error_message)) : ?>
        <ul class="errorMessage">
            <?php foreach($error_message as $msg):?>
                <li><?php echo $msg; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- スレッド -->
    <div class="thredWrapper">
        <div class="childWrapper">
            <div class="threadTitle">
                <span>【タイトル】</span>
                <h1>2ちゃんねるの呪い</h1>
            </div>
            <section>
                <?php foreach($comment_array as $comment):?>
                <article>
                    <div class="wrapper">
                        <div class="nameArea">
                            <span>名前:</span>
                            <p class="username"><?php echo $comment['username']; ?></p>
                            <time>:<?php echo $comment['post_date']; ?></time>
                        </div>
                        <p class="comment"><?php echo $comment['body']; ?></p>
                    </div>
                </article>
                <?php endforeach ?>
            </section>
            <form class="formWrapper" method="post">
                <div>
                    <input type="submit" value="書き込む" name="submitButton">
                    <label>名前:</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <textarea class="commentTextArea" name="body"></textarea>
                </div>
            </form>
        </div>
    </div>
</body>

</html>