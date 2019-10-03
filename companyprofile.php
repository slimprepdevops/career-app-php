
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
            <h2>Company Profiles <span id="cname"></span></h2>
        </div>
    </div>

    <br>

    <?php
    $companys = getAll('company');
    ?>
    <div style="min-height: 680px">
        <div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <?php foreach ($companys as $comp){ ?>

                            <?php
                                $cid = $comp['id'];
                                $jobs = getAll('jobs', "com_id = '$cid'");
                            ?>
                            <li class="list-group-item hover">
                                <div class="mli">
                                    <i class="fa fa-building"></i>
                                    <span><?php echo $comp['cname']; ?>
                                        <a href="view_company.php?id=<?php echo $comp['id']?>&table=company" class="btn btn-xs btn-primary">View</a>
                                    </span>
                                    <span class="pull-right">
                                        <i class="fa fa-map-marker"></i> <span> <?php echo $comp['location'] ?> </span>
                                    </span>
                                    <hr>
                                    <div class="row pbox">
                                        <div class="col-md-6">
                                            <i class="fa fa-info-circle"></i>
                                            <?php if($comp['c_info']!== ''){
                                                echo $comp['c_info'];}else{
                                                echo "No Detail Available at the moment.";
                                            } ?>
                                            <hr>
                                            <i class="fa fa-briefcase"></i>
                                            <?php echo count($jobs) . " Job(s) publications";?>
                                        </div>
                                        <div class="col-md-6" id="odainfo">
                                            <i class="fa fa-phone"></i><span> <?php echo $comp['phone'] ?></span>
                                            <hr><i class="fa fa-envelope-o"></i>
                                            <span> <?php echo $comp['email'] ?></span>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include_once 'layout/footer.php';
?>
