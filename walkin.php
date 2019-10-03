
<?php
    $active = null;
    include_once ('config/director.php');

    include_once('layout/header.php');

    include_once ('core/alldata.php');

    include_once ('core/functionality.php');
?>

<br>
        <?php
            $jobs = allJobs();
            //sort by interview date
             usort($jobs, function($a,$b){
                return $b['idate'] <=> $a['idate']; // <=> or - depending on your php engine version
            });
            //sort by when added

        ?>

<div class="">
    <div class="banner text-center" >
        <h2>Interview Walk-In <span id="cname"></span></h2>
    </div>
</div>

<br>
<div class="row" >
    <div style="min-height: 680px">
        <div class="panel panel-default">
            <div class="panel-body">
                <span id="cinfo">Explore Upcoming Interview options favourable to you!</span>
                <div class="mli">
                    <hr>
                    <div class="panel panel-default">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Company</th>
                                <th>Min Requirement</th>
                                <th>Position</th>
                                <th>Time/Venue</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tlist">
                            <?php foreach ($jobs as $job){ ?>

                                <tr>
                                    <td><?php echo date('F d,Y', strtotime($job['idate'])); ?></td>
                                    <td><?php echo getOneReturn($job['com_id'], 'company', 'cname'); ?></td>
                                    <td><?php echo getMinReq($job['min_req']); ?></td>
                                    <td><?php echo $job['pos']; ?></td>
                                    <?php
                                    if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
                                        $res = "Please Log in";
                                    }else{
                                        $res = $job['itime'] . '/ ' . $job['ivenue'];
                                    }
                                    ?>
                                    <td><?php echo $res; ?></td>
                                    <td>
                                        <a href="job_view.php?id=<?php echo $job['id']?>&table=jobs" class="btn btn-xs btn-success">View</a>
                                    </td>
                                </tr>


                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<?php
include_once 'layout/footer.php';
?>
