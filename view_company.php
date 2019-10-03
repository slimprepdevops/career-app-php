
<?php
$script['file'] = 'public/js/vendor/applyjob.js';
$active = null;
include_once ('config/director.php');

include_once('layout/header.php');

include_once ('core/functionality.php');

include_once ('config/auth.php');

include_once ('core/alldata.php');

include_once ('core/path_data.php');
?>


<br>

<br>


<div style="min-height:540px;" >
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php
                echo ucfirst($data['cname']);
                ?>
            </b>
        </div>
        <div class="panel-body" style="margin: 0; padding: 0">

                <div class="row" style="padding: 20px">
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

                        </h5>
                        <hr style="margin-top:1px; margin-bottom: 7px;">

                    </div>

                </div>
        </div>
    </div>

</div>

<?php
include_once 'layout/footer.php';
?>


