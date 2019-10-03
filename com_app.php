<?php

$isactive['apps'] = 'cactive';
$script['file'] = 'public/js/vendor/invite.js';
include_once 'template/com_dash_head.php';
?>

<div class="col-xs-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>All Application</b> <span class="badge"><?php $appcl = getApplications(); echo count($appcl); ?></span>
                <?php $aappcl = getActiveApc();?> Active - <span class="badge"><?php echo count($aappcl) ; ?></span>
<!--                <span class=""><a href="">view all</a></span>-->
            </div>
            <div class="panel-body" style="padding: 0">



                    <?php
                    $aappcl = getActiveApc();
                    if(count($aappcl) < 1){ ?>
                        <h4 class="text-center">There are no active applications at the moment</h4>

                    <?php }else{ ?>

                        <ul class="list-unstyled" style="border-radius: 0;margin: 0;">
                            <?php foreach ($aappcl as $aps){ ?>

                                <div class="list-group-item hover">
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <span>
                                            <b>
                                                <?php
                                                echo getOneReturn($aps['user_id'], 'users', 'fname') .
                                                    ' ' .
                                                    getOneReturn($aps['user_id'], 'users', 'lname');

                                                ?>
                                            </b>
                                        </span>
                                        </div>
                                        <div class="col-sm-4">
                                        <span>
                                            <?php
                                            echo getOneReturn($aps['user_id'], 'users', 'phone') .
                                                ' ' .
                                                getOneReturn($aps['user_id'], 'users', 'email');
                                            ?>
                                        </span>
                                        </div>
                                        <div class="col-sm-4">
                                        <span>
                                            <?php
                                            echo getOneReturn($aps['job_id'], 'jobs', 'title');
                                            ?>
                                        </span>
                                        </div>
                                        <div class="col-sm-1">
                                        <span>
                                            <span title="Invite/Accept" class="btn btn-circle invited">
                                                <i class="fa fa-plus-circle"></i>
                                                <input class="tid" type="hidden" value="<?php echo $aps['id']?>">
                                                <input class="uid" type="hidden" value="<?php echo $aps['user_id']?>">

                                            </span>
                                            <a href="view_user.php?id=<?php echo $aps['user_id']?>&table=users" title="View Profile" class="btn btn-circle"><i class="fa fa-user-circle"></i></a>
                                            <?php

                                            ?>
                                        </span>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>

                        </ul>

                    <?php } ?>

            </div>
        </div>
    </div>

</div>

<?php
include_once 'template/com_dash_foot.php';
?>

