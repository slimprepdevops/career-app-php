<?php
//define('DS', DIRECTORY_SEPARATOR);
//define('ROOT', dirname(dirname(__FILE__)));
//define('APP', ROOT . DS);
define('APP', dirname(dirname(__FILE__)) . '/');

//custom reverse dir
define('REV', '../');
$active = null;
include_once (APP . 'config/director.php');

//include_once (APP . 'core/manager.php');  //this returns ursers cv, not really required here

include_once (APP . 'core/functionality.php');

include_once(APP . 'layout/header.php');

include_once(APP . 'config/protect_company.php');




?>

<div class="col-xs-12" style="min-height: 720px">

    <div class="row navbar navbar-default">
        <div class="container-fluid">

            <span class="navbar-brand" ><?php echo $user_data['cname'] . "'s" ?> <small> - Dashboard</small></span>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-3 col-xs-12">
            <ul class="list-group csidebar">
                <a href="com_dashboard.php" class="list-group-item <?=@$isactive['dashboard']?>">Dashboard</a>
                <a href="com_jobs.php" class="list-group-item <?=@$isactive['jobs']?>">Jobs</a>
                <a href="com_invite.php" class="list-group-item <?=@$isactive['invites']?>">Invites</a>
                <a href="com_app.php" class="list-group-item <?=@$isactive['apps']?>">Application</a>
                <a href="com_details.php" class="list-group-item <?=@$isactive['profile']?>">Profile</a>
<!--                <a href="" class="list-group-item --><?//=@$isactive['msgs']?><!--">Message</a>-->
            </ul>

        </div>
        <div class="col-sm-9 col-xs-12">