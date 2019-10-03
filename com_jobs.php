<?php

$isactive['jobs'] = 'cactive';
include_once 'template/com_dash_head.php';
?>

<div class="col-xs-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            $jobs = getJobs($user_data['id']);
            echo count($jobs);
//            var_dump($jobs);
            ?>
             Job(s) in Archive.
            <a class="btn btn-warning btn-xs pull-right" href="com_new_job.php">New Job Posting</a>

            <span class="pull-right" style="margin-right: 20%"> <i class="fa fa-caret-right"></i> <small><b>Jobs</b></small></span>

        </div>
        <div class="panel-body">
            <?php
                if(count($jobs) < 1){ ?>
                    <h4 class="text-center">Click <a class="btn btn-warning btn-sm" href="com_new_job.php">HERE</a> to CREATE a new Job Offer! </h4>

                <?php }else{ ?>

                    <ul class="" style="padding: 0">

                        <?php foreach ($jobs as $job){ ?>
                            <a class="list-group-item" href="com_jobs_details.php?id=<?php echo $job['id']?>&table=jobs">
                            <div class="row">
                                <div class="col-xs-3"><span><b><?php echo $job['title'] ?></b></span></div>


                                    <div class="col-xs-9">

                                            <div class="col-xs-10">
                                                <span><?php echo $job['description'] ?></span>
                                            </div>
                                            <div class="col-xs-2">
                                                <form action="functions/delete.php" method="post">
                                                    <input type="hidden" name="job_id" value="<?php echo $job['id'] ?>">
                                                    <input type="hidden" name="com_id" value="<?php echo $job['com_id'] ?>">
                                                    <button type="submit" name="del_job" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </form>

                                            </div>


                                    </div>
                            </div>

                        </a>
                        <?php } ?>

                    </ul>

                <?php } ?>

        </div>
    </div>
</div>

<?php
include_once 'template/com_dash_foot.php';
?>

