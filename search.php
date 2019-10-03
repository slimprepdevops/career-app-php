
<?php
    $script['file'] = 'public/js/vendor/search.js';
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
        <h2>Search for Jobs or Clients  <span id="cname"></span></h2>
    </div>
</div>

<br>
<div class="row" >
    <div style="min-height: 680px; margin: 0 15px;">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-xs-12">
                    <span class="searchtitle">Search Options  </span>
                    <br>
                    <span>
                    <input class="radio-inline radjobs" type="radio" name="searchopt" value="job" checked> Jobs<input class="radio-inline radclient" type="radio" name="searchopt" value="client"> Clients
                    <br>
                    </span>
                </div>
                <br>
                <hr>
                <div class="col-sm-12">
                    <input id="searchfield" type="search" class="form-control" placeholder="Enter search keyword like Name, Location, Job title, Job Industry, Salary, Position ..." autofocus>
                </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="well" id="sres"> <span id="sresult">Please Enter a value to search</span> </div>
            <div class="panel-body ">
                <ul class="findings">

                </ul>
            </div>
        </div>
    </div>


</div>

<?php
include_once 'layout/footer.php';
?>
