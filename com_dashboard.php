<?php

$isactive['dashboard'] = 'cactive';
include_once 'template/com_dash_head.php';
?>

<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Welcome!</b>
        </div>
        <div class="panel-body">
            <div class="row" style="padding: 0 10px">
                <?php  $jobs = getJobs($user_data['id']); ?>
                <p><b> <?php echo count($jobs)?> Events</b></p>
                <hr>
                <?php

                if(count($jobs ) > 0){
                    //handle event

                    foreach ($jobs as $job){
                        if($job['status'] > 0 && strtotime($job['idate']) > time()){

                            echo "You have organised an interview for " . "<b>" . date('F d',strtotime($job['idate']) ) . "</b>";
                            $datestart = date('d-m-Y', strtotime('now'));
                            $datestop = date('d-m-Y', strtotime($job['idate']));
                            $a = new DateTime($datestart);
                            $b = new DateTime($datestop);
                            $v = $b->diff($a)->format('%a');
                            if($v > 0){
                                echo " in <b>" . $v . " day(s). " . "</b> <span ><a class='btn btn-xs btn-primary' href='com_jobs_details.php?id=". $job['id'] ."&table=jobs'>view</a></span><br><hr>";
                            }else{
                                echo " Today at <b> " . $job['itime'] . "</b> <span ><a class='btn btn-xs btn-primary' href='com_jobs_details.php?id=". $job['id'] ."&table=jobs'>view</a></span><br><hr>";
                            }

                        }else{
                            echo 'No up coming events';
                        }

//                        echo strtotime('now') . ' ' . strtotime($job['idate']). ' '  . 'date';
                    }
                }else{
                    echo 'No up coming events';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'template/com_dash_foot.php';
?>

