
<?php
    $active = null;
    include_once ('config/director.php');

    include_once('layout/header.php');

    include_once ('core/alldata.php');

    include_once ('core/functionality.php');
?>


<br>
<div class="">
    <div class="">
        <div class="banner text-center" >
            <h2>Job Listing <span id="cname"></span></h2>
        </div>
    </div>

    <br>

    <?php
        $jobs = allJobs();
    ?>
    <div style="min-height: 680px">
        <div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#palljob">All Jobs</a></li>
                            <li><a data-toggle="tab" href="#pfinance">Finance</a></li>
                            <li><a data-toggle="tab" href="#pmarketing">Marketing</a></li>
                            <li><a data-toggle="tab" href="#pit">Info Tech</a></li>
                            <li><a data-toggle="tab" href="#pecons">Economics</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="palljob" class="tab-pane fade in active">
                                <hr>
                                <ul class="list-unstyled" id="alljobs">


                                    <?php foreach ($jobs as $job){ ?>

                                        <?php //

//                                        var_dump($job);
                                        //get authors data
                                        $comp = getOne($job['com_id'], 'company');
                                        //get invites count
                                        $djid = $job['id'];
                                        $dkey = 1;
                                        $apply = getAll('job_apply', "job_id = '$djid'");
                                        $invite = getAll('job_apply', "job_id = '$djid'", "AND invite = '$dkey'");
                                        // ?>
                                        <li class="list-group-item">
                                            <div class="mli">
                                                <i class="fa fa-building"></i>
                                                <span><?php echo $comp['cname'] . ' - '. $job['indus'] . ' - '. $job['title']; ?>
                                                    <a href="job_view.php?id=<?php echo $job['id']?>&table=jobs" class="btn btn-xs btn-primary">View</a>
                                                </span>
                                                <span class="pull-right">
                                                    <i class="fa fa-map-marker"></i> <span> <?php echo $comp['location'] ?> </span>
                                                </span>
                                                <hr>
                                                <div class="row pbox">
                                                    <div class="col-md-6">
                                                        <?php echo $comp['c_info'] ?>
                                                        <hr>
                                                        <i class="fa fa-user-circle"></i>
                                                        <span>  <b><?php echo count($apply)?></b> Application(s), <b><?php echo count($invite); ?> </b> Invited.</span>
                                                        <br><br>
                                                        <hr>
                                                        <span><i class="fa fa-suitcase"></i></span>
                                                        <span><?php echo $job['title'] ?></span>
                                                        <br><br>
                                                        <hr>
                                                        <span><i class="fa fa-user"></i></span>
                                                        <span> Position - <?php echo $job['pos'] ?>, Functional Area - <?php echo $job['func_area'] ?></span>
                                                        <br><br>
                                                        <hr>
                                                        <span><i class="fa fa-money"></i></span>
                                                        <span> Proposed Salary - <?php echo number_format($job['salary'],2 ) ?> </span>
                                                        <br><br>
                                                        <hr>
                                                        <span><i class="fa fa-suitcase"></i></span>
                                                        <span> Job Experience Required - <?php echo $job['iexp'] ?> year(s)</span>
                                                    </div>
                                                    <div class="col-md-6" id="odainfo">
                                                        <i class="fa fa-phone"></i><span> <?php echo $comp['phone'] ?></span>
                                                        <hr><i class="fa fa-envelope-o"></i>
                                                        <span> <?php echo $comp['email'] ?></span>
                                                        <hr>
                                                        <hr><b>Interview Info</b><hr>
                                                        <?php
                                                        if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
                                                            $idate = "Please Log in";
                                                            $itime = "Please Log in";
                                                            $ivenue = "Please Log in";
                                                        }else{

                                                            $idate = date('F d, Y', strtotime($job['idate']));
                                                            $itime = $job['itime'];
                                                            $ivenue = $job['ivenue'];
                                                        }
                                                        ?>
                                                        <span><i class="fa fa-calendar"></i></span>
                                                        <span> Interview Date - <?php echo $idate ?> </span>
                                                        <hr><span><i class="fa fa-clock-o"></i></span>
                                                        <span> <?php echo $itime ?> </span>
                                                        <hr><span><i class="fa fa-map-marker"></i></span>
                                                        <span> <?php echo $ivenue ?> </span>
                                                        <hr><span><i class="fa fa-book"></i></span>
                                                        <span> Minimum Requirement - <?php echo getMinReq($job['min_req']) ?> </span>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>

                                </ul>
                                <br><hr>
                            </div>
                            <div id="pfinance" class="tab-pane fade">
                                <hr>

                                <ul class="list-unstyled" id="finance">
                                    <?php foreach ($jobs as $job){
                                        if($job['indus'] === 'Finance'){ ?>
                                            <?php //

//                                        var_dump($job);
                                            //get authors data
                                            $comp = getOne($job['com_id'], 'company');
                                            //get invites count
                                            $djid = $job['id'];
                                            $dkey = 1;
                                            $invite = getAll('job_apply', "job_id = '$djid'");
                                            // ?>
                                            <li class="list-group-item">
                                                <div class="mli">
                                                    <i class="fa fa-building"></i>
                                                    <span><?php echo $comp['cname'] . ' - '. $job['indus'] . ' - '. $job['title']; ?>
                                                        <a href="job_view.php?id=<?php echo $job['id']?>&table=jobs" class="btn btn-xs btn-primary">View</a>
                                                    </span>
                                                    <span class="pull-right">
                                                    <i class="fa fa-map-marker"></i> <span> <?php echo $comp['location'] ?> </span>
                                                </span>
                                                    <hr>
                                                    <div class="row pbox">
                                                        <div class="col-md-6">
                                                            <?php echo $comp['c_info'] ?>
                                                            <hr>
                                                            <i class="fa fa-user-circle"></i>
                                                            <span>  <?php echo count($invite); ?> User(s) Invited.</span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span><?php echo $job['title'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-user"></i></span>
                                                            <span> Position - <?php echo $job['pos'] ?>, Functional Area - <?php echo $job['func_area'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-money"></i></span>
                                                            <span> Proposed Salary - <?php echo number_format($job['salary'],2 ) ?> </span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span> Job Experience Required - <?php echo $job['iexp'] ?> year(s)</span>
                                                        </div>
                                                        <div class="col-md-6" id="odainfo">
                                                            <i class="fa fa-phone"></i><span> <?php echo $comp['phone'] ?></span>
                                                            <hr><i class="fa fa-envelope-o"></i>
                                                            <span> <?php echo $comp['email'] ?></span>
                                                            <hr>
                                                            <hr><b>Interview Info</b><hr>
                                                            <?php
                                                            if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
                                                                $idate = "Please Log in";
                                                                $itime = "Please Log in";
                                                                $ivenue = "Please Log in";
                                                            }else{

                                                                $idate = date('F d, Y', strtotime($job['idate']));
                                                                $itime = $job['itime'];
                                                                $ivenue = $job['ivenue'];
                                                            }
                                                            ?>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            <span> Interview Date - <?php echo $idate ?> </span>
                                                            <hr><span><i class="fa fa-clock-o"></i></span>
                                                            <span> <?php echo $itime ?> </span>
                                                            <hr><span><i class="fa fa-map-marker"></i></span>
                                                            <span> <?php echo $ivenue ?> </span>
                                                            <hr><span><i class="fa fa-book"></i></span>
                                                            <span> Minimum Requirement - <?php echo getMinReq($job['min_req']) ?> </span>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php }
                                    }

                                    ?>
                                </ul>

                                <br><hr>
                            </div>
                            <div id="pmarketing" class="tab-pane fade">
                                <hr>

                                <ul class="list-unstyled" id="finance">
                                    <?php foreach ($jobs as $job){
                                        if($job['indus'] === 'Marketing'){ ?>
                                            <?php //

//                                        var_dump($job);
                                            //get authors data
                                            $comp = getOne($job['com_id'], 'company');
                                            //get invites count
                                            $djid = $job['id'];
                                            $dkey = 1;
                                            $invite = getAll('job_apply', "job_id = '$djid'");
                                            // ?>
                                            <li class="list-group-item">
                                                <div class="mli">
                                                    <i class="fa fa-building"></i>
                                                    <span><?php echo $comp['cname'] . ' - '. $job['indus'] . ' - '. $job['title']; ?>
                                                        <a href="job_view.php?id=<?php echo $job['id']?>&table=jobs" class="btn btn-xs btn-primary">View</a>
                                                    </span>
                                                    <span class="pull-right">
                                                    <i class="fa fa-map-marker"></i> <span> <?php echo $comp['location'] ?> </span>
                                                </span>
                                                    <hr>
                                                    <div class="row pbox">
                                                        <div class="col-md-6">
                                                            <?php echo $comp['c_info'] ?>
                                                            <hr>
                                                            <i class="fa fa-user-circle"></i>
                                                            <span>  <?php echo count($invite); ?> User(s) Invited.</span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span><?php echo $job['title'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-user"></i></span>
                                                            <span> Position - <?php echo $job['pos'] ?>, Functional Area - <?php echo $job['func_area'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-money"></i></span>
                                                            <span> Proposed Salary - <?php echo number_format($job['salary'],2 ) ?> </span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span> Job Experience Required - <?php echo $job['iexp'] ?> year(s)</span>
                                                        </div>
                                                        <div class="col-md-6" id="odainfo">
                                                            <i class="fa fa-phone"></i><span> <?php echo $comp['phone'] ?></span>
                                                            <hr><i class="fa fa-envelope-o"></i>
                                                            <span> <?php echo $comp['email'] ?></span>
                                                            <hr>
                                                            <hr><b>Interview Info</b><hr>
                                                            <?php
                                                            if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
                                                                $idate = "Please Log in";
                                                                $itime = "Please Log in";
                                                                $ivenue = "Please Log in";
                                                            }else{

                                                                $idate = date('F d, Y', strtotime($job['idate']));
                                                                $itime = $job['itime'];
                                                                $ivenue = $job['ivenue'];
                                                            }
                                                            ?>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            <span> Interview Date - <?php echo $idate ?> </span>
                                                            <hr><span><i class="fa fa-clock-o"></i></span>
                                                            <span> <?php echo $itime ?> </span>
                                                            <hr><span><i class="fa fa-map-marker"></i></span>
                                                            <span> <?php echo $ivenue ?> </span>
                                                            <hr><span><i class="fa fa-book"></i></span>
                                                            <span> Minimum Requirement - <?php echo getMinReq($job['min_req']) ?> </span>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }

                                    }

                                    ?>
                                </ul>

                                <br><hr>
                            </div>
                            <div id="pit" class="tab-pane fade">
                                <hr>


                                <ul class="list-unstyled" id="marketing">
                                    <?php foreach ($jobs as $job){

                                        if($job['indus'] === 'Information Technology'){ ?>
                                            <?php //

//                                        var_dump($job);
                                            //get authors data
                                            $comp = getOne($job['com_id'], 'company');
                                            //get invites count
                                            $djid = $job['id'];
                                            $dkey = 1;
                                            $invite = getAll('job_apply', "job_id = '$djid'");
                                            // ?>
                                            <li class="list-group-item">
                                                <div class="mli">
                                                    <i class="fa fa-building"></i>
                                                    <span><?php echo $comp['cname'] . ' - '. $job['indus'] . ' - '. $job['title']; ?>
                                                        <a href="job_view.php?id=<?php echo $job['id']?>&table=jobs" class="btn btn-xs btn-primary">View</a>
                                                    </span>
                                                    <span class="pull-right">
                                                    <i class="fa fa-map-marker"></i> <span> <?php echo $comp['location'] ?> </span>
                                                </span>
                                                    <hr>
                                                    <div class="row pbox">
                                                        <div class="col-md-6">
                                                            <?php echo $comp['c_info'] ?>
                                                            <hr>
                                                            <i class="fa fa-user-circle"></i>
                                                            <span>  <?php echo count($invite); ?> User(s) Invited.</span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span><?php echo $job['title'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-user"></i></span>
                                                            <span> Position - <?php echo $job['pos'] ?>, Functional Area - <?php echo $job['func_area'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-money"></i></span>
                                                            <span> Proposed Salary - <?php echo number_format($job['salary'],2 ) ?> </span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span> Job Experience Required - <?php echo $job['iexp'] ?> year(s)</span>
                                                        </div>
                                                        <div class="col-md-6" id="odainfo">
                                                            <i class="fa fa-phone"></i><span> <?php echo $comp['phone'] ?></span>
                                                            <hr><i class="fa fa-envelope-o"></i>
                                                            <span> <?php echo $comp['email'] ?></span>
                                                            <hr>
                                                            <hr><b>Interview Info</b><hr>
                                                            <?php
                                                            if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
                                                                $idate = "Please Log in";
                                                                $itime = "Please Log in";
                                                                $ivenue = "Please Log in";
                                                            }else{

                                                                $idate = date('F d, Y', strtotime($job['idate']));
                                                                $itime = $job['itime'];
                                                                $ivenue = $job['ivenue'];
                                                            }
                                                            ?>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            <span> Interview Date - <?php echo $idate ?> </span>
                                                            <hr><span><i class="fa fa-clock-o"></i></span>
                                                            <span> <?php echo $itime ?> </span>
                                                            <hr><span><i class="fa fa-map-marker"></i></span>
                                                            <span> <?php echo $ivenue ?> </span>
                                                            <hr><span><i class="fa fa-book"></i></span>
                                                            <span> Minimum Requirement - <?php echo getMinReq($job['min_req']) ?> </span>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }
                                    }

                                    ?>
                                </ul>

                                <br><hr>
                            </div>
                            <div id="pecons" class="tab-pane fade">
                                <hr>

                                <ul class="list-unstyled" id="infotech">
                                    <?php foreach ($jobs as $job){

                                        if($job['indus'] === 'Economics'){?>
                                            <?php //

//                                        var_dump($job);
                                            //get authors data
                                            $comp = getOne($job['com_id'], 'company');
                                            //get invites count
                                            $djid = $job['id'];
                                            $dkey = 1;
                                            $invite = getAll('job_apply', "job_id = '$djid'");
                                            // ?>
                                            <li class="list-group-item">
                                                <div class="mli">
                                                    <i class="fa fa-building"></i>
                                                    <span><?php echo $comp['cname'] . ' - '. $job['indus'] . ' - '. $job['title']; ?>
                                                        <a href="job_view.php?id=<?php echo $job['id']?>&table=jobs" class="btn btn-xs btn-primary">View</a>
                                                    </span>
                                                    <span class="pull-right">
                                                    <i class="fa fa-map-marker"></i> <span> <?php echo $comp['location'] ?> </span>
                                                </span>
                                                    <hr>
                                                    <div class="row pbox">
                                                        <div class="col-md-6">
                                                            <?php echo $comp['c_info'] ?>
                                                            <hr>
                                                            <i class="fa fa-user-circle"></i>
                                                            <span>  <?php echo count($invite); ?> User(s) Invited.</span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span><?php echo $job['title'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-user"></i></span>
                                                            <span> Position - <?php echo $job['pos'] ?>, Functional Area - <?php echo $job['func_area'] ?></span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-money"></i></span>
                                                            <span> Proposed Salary - <?php echo number_format($job['salary'],2 ) ?> </span>
                                                            <br><br>
                                                            <hr>
                                                            <span><i class="fa fa-suitcase"></i></span>
                                                            <span> Job Experience Required - <?php echo $job['iexp'] ?> year(s)</span>
                                                        </div>
                                                        <div class="col-md-6" id="odainfo">
                                                            <i class="fa fa-phone"></i><span> <?php echo $comp['phone'] ?></span>
                                                            <hr><i class="fa fa-envelope-o"></i>
                                                            <span> <?php echo $comp['email'] ?></span>
                                                            <hr>
                                                            <hr><b>Interview Info</b><hr>
                                                            <?php
                                                            if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
                                                                $idate = "Please Log in";
                                                                $itime = "Please Log in";
                                                                $ivenue = "Please Log in";
                                                            }else{

                                                                $idate = date('F d, Y', strtotime($job['idate']));
                                                                $itime = $job['itime'];
                                                                $ivenue = $job['ivenue'];
                                                            }
                                                            ?>
                                                            <span><i class="fa fa-calendar"></i></span>
                                                            <span> Interview Date - <?php echo $idate ?> </span>
                                                            <hr><span><i class="fa fa-clock-o"></i></span>
                                                            <span> <?php echo $itime ?> </span>
                                                            <hr><span><i class="fa fa-map-marker"></i></span>
                                                            <span> <?php echo $ivenue ?> </span>
                                                            <hr><span><i class="fa fa-book"></i></span>
                                                            <span> Minimum Requirement - <?php echo getMinReq($job['min_req']) ?> </span>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }

                                    }

                                    ?>
                                </ul>

                                <br><hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include_once 'layout/footer.php';
?>
