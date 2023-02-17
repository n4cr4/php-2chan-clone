<?php
$position = 0;

if(isset($_POST['submitButton'])){
    $position = $_POST['position'];
}
?>
<form class="formWrapper" method="post">
    <div>
        <input type="submit" value="書き込む" name="submitButton">
        <label>名前:</label>
        <input type="text" name="username" 
        value="<?php if ($thread['id']==$comment['thread_id'])echo $_SESSION['username'];?>">
        <input type="hidden" name="threadID" value="<?php echo $thread['id'];?>">
    </div>
    <div>
        <textarea class="commentTextArea" name="body"></textarea>
    </div>
    <!-- to get position -->
    <input type="hidden" name="position" value="0">
</form>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    // console.log($(window).scrollTop());
    $(document).ready(() =>{
        $("input[type=submit]").click(() => {
            let position = $(window).scrollTop();
            $('input:hidden[name=position]').val(position);
        })
        $(window).scrollTop(<?php echo $position; ?>);
    }) 
</script>