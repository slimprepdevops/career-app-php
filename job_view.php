
<?php
$script['file'] = 'public/js/vendor/applyjob.js';
$active = null;

include_once ('config/director.php');

include_once('layout/header.php');

include_once ('core/functionality.php');



include_once ('core/alldata.php');

include_once ('core/path_data.php');

include_once ('config/auth.php');
?>


<br>

<br>

<div >
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php
                echo $data['title'];
                ?>
            </b>


            <?php if($user_data['acc_type'] === '1'){ ?>
                <button id="applyjob" class=" btn btn-xs btn-success" style="margin: 0 10%">
                    <input type="hidden" id="job_id" value="<?php echo $data['id']?>">
                    <input type="hidden" id="user_id" value="<?php echo $user_data['id']?>">
                    <input type="hidden" id="com_id" value="<?php echo jobAuthor($data['com_id'], 'id')?>">

                    <small><b style="margin: 0 10px">Apply</b></small>

                </button>
            <?php }else{?>
                <button class="btn btn-success btn-xs" style="margin: 0 10%" disabled>Log in as Individual to Apply!</button>
            <?php } ?>


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
include_once 'layout/footer.php';
?>


