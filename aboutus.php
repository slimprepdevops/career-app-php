
<?php
    $active = null;
    include_once ('config/director.php');

    include_once('layout/header.php');

    include_once ('core/alldata.php');
?>


<br>
<div class="">
    <div class="">
        <div class="banner text-center" >
            <h2>About <span id="cname"></span></h2>
        </div>
    </div>

    <br>

    <div style="min-height: 680px">
        <div class="panel panel-default">
            <div class="panel-body">
                <span id="cinfo"></span>
                Carrier Search, Inc. is a leading provider of job recruitment and related services in the US.
                It has established a network of more than 150 offices throughout the country.
                The company is specialized in the areas of accounting, finance, sales, marketing,
                information technology, and engineering. It has tie ups with the best employers of all functional areas.
                The company provides services for full time, part time, temporary, and contract employment.
                <div class="mli">
                    <hr>
                    <br>
                    <span class="panhead">Our Services</span>

                    <h4 id="cservice">
                        Carrier Search, Inc. provides recruitment services to meet the requirements of business organizations.
                        Our business expands to areas such as Europe, Middle East, and South East Asia.
                        Our scope of services expands to domestic and global customers
                    </h4>
                </div>
            </div>

        </div>
        <br>
        <div class="well col-md-6" id="odainfo">
            <i class="fa fa-map-marker"></i> <span id="locale">27 Brook Street, Washinton DC</span>
            <hr>
            <i class="fa fa-phone"></i> <span id="ctel">+33640001234</span>
            <hr>
            <i class="fa fa-envelope-o"></i> <span id="cmail"> infodesk@csi.com</span>
            <hr>
            <i class="fa fa-twitter"></i> <span id="ctweet">@carriercsinc </span>
            <hr>
            <i class="fa fa-facebook"></i> <span id="cfbook"> facebook.com/carriercsinc</span>
            <hr>
        </div>
    </div>



</div>
<?php
include_once 'layout/footer.php';
?>
