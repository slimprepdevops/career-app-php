<?php
    $active = null;
    include_once('layout/header.php');
?>

<div style="min-height: 75vh" class="container">

    <?php
    if(isset($_COOKIE['welcome_msg'])){$toshow = $_COOKIE['welcome_msg'];}else{$toshow = 'none';}; ?>
    <h3 class="text-center" style="display: <?php echo $toshow; ?>">Your account has been created. Welcome to the platform!</h3>

    <hr>

    add success stories here!
</div>

<?php
include_once 'layout/footer.php';
?>
