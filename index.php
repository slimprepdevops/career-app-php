
<?php
    $active = null;
    include_once ('config/director.php');

    include_once('layout/header.php');

    include_once ('core/alldata.php');
?>


<br>
<div style="">
    <div class="row">
        <div class="col-md-6">
            <div href="employee.html" class="imgholder">
                <img class="imgfit" src="public/images/js.png">


                <br>


            </div>

        </div>

        <!--                right side-->
        <div class="col-md-6">
            <div href="employer.html" class="imgholder">
                <img class="imgfit" src="public/images/ep.png">

                <br>


            </div>

        </div>
    </div>
</div>


<br>
        <?php
            $jobs = allJobs();
            //sort by salary
             $jobsTopPay = $jobs;
             usort($jobsTopPay, function($a,$b){
                return $b['salary'] <=> $a['salary']; // <=> or - depending on your php engine version
            });
        //sort by when added

            $newJobs = $jobs;
            usort($newJobs, function($a,$b){
                return $b['id'] <=> $a['id']; // <=> or - depending on your php engine version
            });



        ?>


<div class="row" >
    <div class=" col-md-7">
        <h4>Top Paying Jobs
            <a href="view_all_jobs.php" class="pull-right btn btn-xs btn-success" style="margin-right: 10%">

                <strong style="margin: 0 10px; color: #fff"><i class="fa fa-list"></i> View All Jobs</strong>

            </a></h4>

        <div>
            <ul class="list-group dot" id="topjobs">
<!--                --><?php //var_dump($jobsTopPay); ?>
                <?php foreach ($jobsTopPay as $job){ ?>

                    <a class="list-group-item" href="job_view.php?id=<?php echo $job['id']?>&table=jobs">
                        <div class="mli">

                            <span><i class="fa fa-building"></i> <?php echo $job['title']?></span>
                            <span><i class="fa fa-map-marker"></i> <?php echo jobAuthor($job['com_id'], 'location')?> </span>
                            <hr>
                            <div><span><?php echo $job['description'] ?></span></div>
                            <hr>
                            <div><span>Salary <i class="fa fa-money"></i> : </span> <?php echo "N " . number_format($job['salary'], 2); ?></div>
                        </div>
                    </a>

                <?php } ?>
            </ul>

        </div>
    </div>

    <div class="col-md-5">
        <h4>Most Recent Jobs</h4>
        <div>
            <ul class="list-group dot" id="recentjobs">
                <?php foreach ($newJobs as $job){ ?>
                    <a class="list-group-item" href="job_view.php?id=<?php echo $job['id']?>&table=jobs">
                        <div class="row">
                            <div class="col-xs-3"><span><b><?php echo $job['title'] ?></b></span></div>
                            <div class="col-xs-8"><span><?php echo $job['description'] ?></span></div>
                        </div>

                    </a>
                <?php } ?>
            </ul>

        </div>
    </div>
</div>

<?php
include_once 'layout/footer.php';
?>
