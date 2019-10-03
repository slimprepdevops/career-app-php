<?php

$isactive['profile'] = 'cactive';
include_once 'template/com_dash_head.php';
?>

<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Company Information</b>
        </div>
        <div class="panel-body">
            <span><b>Company Name</b></span> <br>
            <?php echo $user_data['cname']; ?>
            <hr>
            <span><b>Company Email</b></span> <br>
            <?php echo $user_data['email']; ?>
            <hr>
            <span><b>Company Location</b></span> <br>
            <?php echo $user_data['location']; ?>
            <hr>
            <span><b>Company Address</b></span> <br>
            <?php echo $user_data['address']; ?>
            <hr>
            <span><b>Company Phone</b></span> <br>
            <?php echo $user_data['phone']; ?>
            <hr>
            <span><b>More Information</b></span> <br>
            <?php echo $user_data['c_info']; ?>
            <hr>
            <span><b>Date Joined</b></span> <br>
            <?php echo date('F d,Y', $user_data['created_at']); ?>
            <hr>

        </div>
    </div>
</div>

<?php
include_once 'template/com_dash_foot.php';
?>

