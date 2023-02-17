<?php
$error_message = array();

if (isset($_POST["threadSubmitButton"])) {
    // validation
    if (empty($_POST['title'])) {
        $error_message['title'] = '名前が入力されていません';
    } else {
        $escaped['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    }
    if (empty($_POST['username'])) {
        $error_message['username'] = '名前が入力されていません';
    } else {
        $escaped['username'] = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    }
    if (empty($_POST['body'])) {
        $error_message['body'] = '本文が入力されていません';
    } else {
        $escaped['body'] = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTF-8');
    }


    if (empty($error_message)) {
        $post_date = date('Y-m-d H:i:s');

        $pdo->beginTransaction();

        try{
            $sql = 'INSERT INTO `thread` (`title`) VALUES (:title);';
            $stmt = $pdo->prepare($sql);

            // set value
            $stmt->bindParam(':title', $escaped['title'], PDO::PARAM_STR);

            $stmt->execute();

            $sql = 'INSERT INTO `comment` (`username`, `body`, `post_date`, `thread_id`) 
            VALUES (:username, :body, :post_date, (SELECT id FROM thread WHERE title = :title))';

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $escaped['username'], PDO::PARAM_STR);
            $stmt->bindParam(':body', $escaped['body'], PDO::PARAM_STR);
            $stmt->bindParam(':post_date', $post_date, PDO::PARAM_STR);
            $stmt->bindParam(':title', $escaped['title'], PDO::PARAM_STR);

            $stmt->execute();
            header('Location: http://localhost:8080/2chan-clone');
            $pdo->commit();
        } catch(Exception $error){
            $pdo->rollBack();
        }


    }
}
