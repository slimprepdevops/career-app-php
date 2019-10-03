<?php

$active = null;
include_once ('config/director.php');

include_once ('config/protector.php');

include_once ('core/manager.php');

include_once('layout/header.php');

include_once ('core/functionality.php');

include_once ('core/alldata.php');

include_once ('core/path_data.php');

if(isset($_SESSION['c_user_id'])){
    $user_cv = getUserCv($user_data['id']);
//    var_dump($user_cv);
}

?>



<br>
<div class="gradient">
    <div class="row">
        <div class="col-xs-3" >
            <?php if($user_data['image']=='' or $user_data['image']== null ){$usimg = 'public/assets/default.png';}else{$usimg = 'public/uploads/' . $user_data['image'];}  ?>
            <img class="img-circle img-fit" src="<?php echo $usimg; ?>" alt="">
            <button onclick="document.getElementById('userdp').click()" class="btn txt_white"><i class="fa fa-camera"></i></button>
            <form action="" >
                <input class="hidden" type="file" id="userdp" onchange="shwimg()">
            </form>

        </div>
        <div class="col-xs-5">
            <span class="pull-left txt_white"><small>Profile stars</small>
                <br>
<!--                write a php code that retrieves user star value-->
                <?php
                    $uk = getUserStars();
//                    echo $uk;

                    $k=0;
                    for($k; $k < $uk; $k++){}
                    $key = $k - $uk;

                    if($key > 0){

                        for($v = 0; $v < $uk; $v++){
                            if($v!==0)
                                echo "<i class='fa fa-star'></i> ";
                            $i = $v;
                        }
//                        echo $i;
                        $r = $uk - ($i - 1);
                        $c = 0;
                        if($r > 0){
                            $c = 5 - ($i+1);
                            echo "<i class='fa fa-star-half-o'></i> ";
                        }
                        for($x =0; $x<$c;$x++){
                            echo "<i class='fa fa-star-o'></i> ";
                        }
                    }else{
                        $i = 0;
                        for($i; $i < $uk; $i++){
                            echo "<i class='fa fa-star'></i> ";
                        }
                        $c = 5 - $i;
                        for($x =0; $x<$c;$x++){
                            echo "<i class='fa fa-star-o'></i> ";
                        }
                    }

//                    echo $uk;
                ?>

                <!-- php code to chect star count and return the line below-->
                <br>
                <br>
                <br>
                <?php
                if($user_cv==null){ ?>
                <small>Please Update your digital CV to increase your Profile stars!</small>
                <br>
                <a href="add_resume.php" class="btn btn-sm btn-warning"><b>Update Digital CV</b> <i class="fa fa-file"></i></a>

                <?php }?>

            </span>

        </div>
        <div class="col-xs-4">
            <span class=" txt_white"><b><u>Statisitcs</u></b></span>
            <br>
            <?php $num = count(aplMade($user_data['id']))?>
            <?php
                $evt = null;
                $events = userEvt($user_data['id']);
                if($events != null){
                    foreach ($events as $job){
                        if($job['status'] > 0 && strtotime($job['idate']) > time()){
                            $evt++;
                        }

                    }
                }




            ?>
            <span class="txt_white ">Applications Made:
                <span class="txt_white">
                    <?php
                        echo $num;
                    if($num>0){?>
<!--                        <a href="" class="btn btn-xs btn-warning">View</a>-->
                    <?php }

                    ?>
                </span>
            </span>
            <br>

            <span class="txt_white">Upcoming Interview:
                <span class="txt_white">
                    <?php
                        if($evt!=0){echo $evt;}else{echo 0;}

                        if($evt>0){?>
                            <a href="" class="btn btn-xs btn-warning">View</a>
                        <?php }
                    ?>
                </span>
            </span>
        </div>
    </div>

</div>
<br>
<div class="panel panel-info" style="margin: 0; padding: 0">
    <div class="panel-heading">User Info</div>
    <div class="panel-body" style="margin: 0; padding: 0">
        <div class="">
            <ul class="list-group" style="margin: 0; padding: 0">
                <li class="list-group-item">
                    <i class="fa fa-user-circle space-left space-right"> </i><b>Full name</b> - <?php echo $user_data['fname'] . ' ' . $user_data['lname'] ?>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-phone space-left space-right"></i>  <b>Telephone </b> - <?php echo $user_data['phone'] ?>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-envelope space-left space-right"></i>  <b>email</b> - <?php echo $user_data['email']; ?>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-location-arrow space-left space-right"></i>  <b>Address</b> - <?php echo $user_data['address']; ?>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-map-pin space-left space-right"></i> <b>Location</b> - <?php echo $user_data['location']; ?>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-birthday-cake space-left space-right"></i> <b>Birthday</b> - <?php echo date('F d', strtotime($user_data['dob'])) ?>
                </li>
            </ul>
        </div>
    </div>
</div>

<br>

<div class="panel panel-info" style="margin: 0; padding: 0">
    <div class="panel-heading">Your Resume - <small>What people will see when they check your profile</small></div>
    <div class="panel-body" style="margin: 0; padding: 0">
        <?php
        if($user_cv==null){ ?>
            <h3 class="text-center" style="padding: 20px;"> <b>Sorry. Update your Digital CV to preview or Edit Prospective CV</b></h3>
        <?php }else{ ?>

            <div class="row" style="padding: 20px">
                <div class="col-xs-3">
                    <img class="img-circle img-fit" src="<?php echo $usimg; ?>" alt="" style="margin: 20px">
                </div>
                <div class="col-xs-9">
                    <h3><b>Contact Information</b></h3>
                    <hr style="margin-top:1px; margin-bottom: 7px;">
                    <h5 class="clearfix">
                        <b>Address</b> - <span class=""><?php if( trim($user_data['address']) == ''){echo 'Not Available';}else{echo $user_data['address'];} ?></span>
                    </h5>
                    <hr style="margin-top:1px; margin-bottom: 7px;">

                    <hr style="margin-top:1px; margin-bottom: 7px;">
                    <h5 class="">
                        <b>Email</b> - <span class=""><?php if( trim($user_data['email']) == ''){echo 'Not Available';}else{echo $user_data['email'];} ?></span>
                    </h5>
                    <hr style="margin-top:1px; margin-bottom: 7px;">
                    <h5 class="">
                        <b>Phone</b> - <span class=""><?php if( trim($user_data['phone']) == ''){echo 'Not Available';}else{echo $user_data['phone'];} ?></span>
                    </h5>
                    <hr style="margin-top:1px; margin-bottom: 7px;">
                    <h5 class="">
                        <b>Location</b> - <span class=""><?php if( trim($user_data['location']) == ''){echo 'Not Available';}else{echo $user_data['location'];} ?></span>
                    </h5>
                    <hr style="margin-top:1px; margin-bottom: 7px;">
                    <h5 class="">
                        <b>Date of Birth</b> - <span class=""><?php if( trim($user_data['dob']) == ''){echo 'Not Available';}else{echo date('F d, Y', strtotime($user_data['dob']));} ?></span>
                    </h5>
                    <hr style="margin-top:1px; margin-bottom: 7px;">

                </div>

            </div>
            <div class="row" style="padding: 20px">
                <hr>
                <h3><b>Educational and Experience</b></h3>
                <hr style="margin-top:1px; margin-bottom: 7px;">
                <div style="width: 100%; padding: 20px" class="clearfix">
                    <h5 class="list-group-item">
                        <b>Educational Level</b> -
                        <span class="">
                            <?php echo getMinReq($user_cv['edu']) ?>
                        </span>
                    </h5>
                    <h5 class="list-group-item">
                        <b>Functional Areas</b> -
                        <span class="">
                            <?php
                                echo $user_cv['fun_areas'];
                            ?>
                        </span>
                    </h5>
                    <h5 class="list-group-item">
                        <b>Experience</b> -
                        <span class="">
                            <?php
                            echo $user_cv['exp'];
                            ?>
                        </span>
                    </h5>
                    <h5 class="list-group-item">
                        <b>Hobbies</b> -
                        <span class="">
                            <?php
                            echo $user_cv['hobbies'];
                            ?>
                        </span>
                    </h5>
                    <h5 class="list-group-item">
                        <b>Languages Spoken</b> -
                        <span class="">
                            <?php
                            echo $user_cv['lang'];
                            ?>
                        </span>
                    </h5>
                    <h5 class="list-group-item">
                        <b>Core Areas of Specialization</b> -
                        <span class="">
                            <?php
                            echo $user_cv['core_area'];
                            ?>
                        </span>
                    </h5>
                    <h5 class="list-group-item">
                        <b>Referee</b> -
                        <span class="">
                            <?php
                                if(trim($user_cv['referee']) == ''){
                                    echo 'Not Available';
                                }else{
                                    echo $user_cv['referee'];
                                }
                            ?>
                        </span>
                    </h5>
                </div>



            </div>
        <?php }

        ?>
    </div>
</div>
<br>



<?php
include_once 'layout/footer.php';
?>
