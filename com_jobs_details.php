<?php

$isactive['jobs'] = 'cactive';
include_once 'template/com_dash_head.php';

include_once 'core/path_data.php';
?>

<div class="col-xs-12">


    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php
                echo $data['title'];
            ?>
            </b>

            <a class="btn btn-warning btn-xs pull-right" href="com_new_job.php">New Job Posting</a>

            <span class="pull-right" style="margin-right: 2%">

                <small><b><a href="com_jobs.php">Job Lists <i class="fa fa-list"></i></a></b></small>

            </span>

        </div>
        <div class="panel-body">
            <div class="row" style="padding:  0 15px;">
                <h4>Description</h4> <span><?php echo $data['description']?></span>
                <br>
                <hr style="margin: 5px 0">
            </div>
            <br>
            <div class="row" style="padding:  0 15px;">
                <h4>Functional Area</h4> <span><?php echo $data['func_area']?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Position</h4> <span><?php echo $data['pos']?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Industry</h4> <span><?php echo $data['indus']?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Salary</h4> <span><?php echo  "N " .number_format($data['salary'], 2)?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Job Status</h4> <span><?php if($data['status'] > 0){echo 'Active';}else{echo 'Closed';}?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Minimum Requirement</h4>
                <span>
                    <?php
                        switch ($data['min_req']){
                            case 0:
                                echo "None.";
                                break;
                            case 1:
                                echo "Primary School Leaving Certificate";
                                break;
                            case 2:
                                echo "First School Leaving Certificate";
                                break;
                            case 3:
                                echo "OND";
                                break;
                            case 4:
                                echo "HND or BSC";
                                break;
                            case 5:
                                echo "PHD";
                                break;
                            case 6:
                                echo "MSC";
                                break;
                            case 7:
                                echo "Prof.";
                                break;
                            default:
                                echo "Not Available";
                        }
                    ?>
                </span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Experience Required</h4> <span><?php echo $data['iexp']?> Year(s)</span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Interview Date</h4> <span><?php echo date('F d, Y', strtotime($data['idate']))?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Interview Time</h4> <span><?php echo $data['itime']?></span>
                <hr style="margin: 5px 0">
            </div>
            <div class="row" style="padding:  0 15px;">
                <h4>Intrview Venue</h4> <span><?php echo $data['ivenue']?></span>
                <hr style="margin: 5px 0">
            </div>

        </div>
    </div>
</div>

<?php
include_once 'template/com_dash_foot.php';
?>

