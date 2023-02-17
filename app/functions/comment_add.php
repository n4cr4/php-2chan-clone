<?php
$error_message = array();

session_start();

if (isset($_POST["submitButton"])) {

    // validation
    if (empty($_POST['username'])) {
        $error_message['username'] = '名前が入力されていません';
    } else {
        $escaped['username'] = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $_SESSION['username'] = $escaped['username'];
    }
    if (empty($_POST['body'])) {
        $error_message['body'] = '本文が入力されていません';
    } else {
        $escaped['body'] = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTR-8');
    }


    if (empty($error_message)) {
        $post_date = date('Y-m-d H:i:s');

        // transaction
        $pdo->beginTransaction();

        try{
            $sql = 'INSERT INTO `comment` (`username`, `body`, `post_date`, `thread_id`) 
            VALUES (:username, :body, :post_date, :thread_id);';
            $stmt = $pdo->prepare($sql);

            // set value
            $stmt->bindParam(':username', $escaped['username'], PDO::PARAM_STR);
            $stmt->bindParam(':body', $escaped['body'], PDO::PARAM_STR);
            $stmt->bindParam(':post_date', $post_date, PDO::PARAM_STR);
            $stmt->bindParam(':thread_id', $_POST['threadID'], PDO::PARAM_STR);

            $stmt->execute();

            $pdo->commit();
        } catch(Exception $error) {
            $pdo->rollBack();
        }

    }
}