<?php 
$comment_array = array();

// get data from 'comment' table
$sql = 'SELECT * FROM comment';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$comment_array = $stmt;

?>