
<?php
$script['file'] = 'public/js/vendor/applyjob.js';
$active = null;
include_once ('config/director.php');

include_once('layout/header.php');

include_once ('core/functionality.php');

include_once ('core/alldata.php');

include_once ('config/auth.php');

include_once ('core/path_data.php');
?>


<br>

<br>


<div style="min-height: 550px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php
                echo ucfirst($data['fname'])  . " " . ucfirst($data['lname']);
                $user_cv = getUserCv($data['id']);

                ?>
            </b>
        </div>
        <div class="panel-body" style="margin: 0; padding: 0">
            <?php
            if(count($user_cv) < 1){ ?>
                <h3 class="text-center" style="padding: 20px;"> <b><?php echo ucfirst($data['fname']) ?> does not have a Digital CV to preview.</b></h3>
            <?php }else{ ?>

                <div class="row" style="padding: 20px">
                    <div class="col-xs-3">
                        <?php
                            if($data['image'] == '' or $data['image'] == null){
                                $img = 'public/assets/default.png';
                            } else{
                                $img = $data['image'];
                            }
                        ?>
                        <img class="img-circle img-fit" src="<?php echo "public/uploads/". $img;?>" alt="" style="margin: 20px">
                        <br>
                        <p style="padding-left: 25%">
                            <small>User Profile ratings</small><br>
                            <b>
                                <?php
                                $uk = getUStars($data['id']);
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
                                ?>
                            </b>
                        </p>
                    </div>
                    <div class="col-xs-9">
                        <h3><b>Contact Information</b></h3>
                        <hr style="margin-top:1px; margin-bottom: 7px;">
                        <h5 class="clearfix">
                            <b>Address</b> - <span class=""><?php if( trim($data['address']) == ''){echo 'Not Available';}else{echo $data['address'];} ?></span>
                        </h5>
                        <hr style="margin-top:1px; margin-bottom: 7px;">

                        <hr style="margin-top:1px; margin-bottom: 7px;">
                        <h5 class="">
                            <b>Email</b> - <span class=""><?php if( trim($data['email']) == ''){echo 'Not Available';}else{echo $data['email'];} ?></span>
                        </h5>
                        <hr style="margin-top:1px; margin-bottom: 7px;">
                        <h5 class="">
                            <b>Phone</b> - <span class=""><?php if( trim($data['phone']) == ''){echo 'Not Available';}else{echo $data['phone'];} ?></span>
                        </h5>
                        <hr style="margin-top:1px; margin-bottom: 7px;">
                        <h5 class="">
                            <b>Location</b> - <span class=""><?php if( trim($data['location']) == ''){echo 'Not Available';}else{echo $data['location'];} ?></span>
                        </h5>
                        <hr style="margin-top:1px; margin-bottom: 7px;">
                        <h5 class="">
                            <b>Date of Birth</b> - <span class=""><?php if( trim($data['dob']) == ''){echo 'Not Available';}else{echo date('F d, Y', strtotime($data['dob']));} ?></span>
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
                                Years
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

</div>

<?php
include_once 'layout/footer.php';
?>


