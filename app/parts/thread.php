<?php foreach($thread_array as $thread): ?>
<div class="thredWrapper">
    <div class="childWrapper">
        <div class="threadTitle">
            <span>【タイトル】</span>
            <h1><?php echo $thread['title'] ?></h1>
        </div>
        <?php include('commentSection.php'); ?>
        <?php include('commentForm.php'); ?>
    </div>
</div>
<?php endforeach; ?>