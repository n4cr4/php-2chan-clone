<?php 
$thread_array = array();

// get data from 'comment' table
$sql = 'SELECT * FROM thread';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$thread_array = $stmt;
?>
