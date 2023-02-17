<!-- validation error -->
<?php if (isset($error_message)): ?>
    <ul class="errorMessage">
        <?php foreach ($error_message as $msg): ?>
            <li>
                <?php echo $msg; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>