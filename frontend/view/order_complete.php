<?php if (isset($_SESSION['message_alert'])): ?>
    <div class="alert">
        <?= $_SESSION['message_alert'] ?>
    </div>
    <?php unset($_SESSION['message_alert']); ?>
<?php endif; ?>
