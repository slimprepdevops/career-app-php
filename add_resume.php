<?php
$active = null;
include_once ('config/director.php');
include_once ('config/protector.php');

include_once('layout/header.php');
?>

<div class="">
    <div class="banner text-center" >
        <h2>Update Digital CV (DCV)</h2>
        <h4>Update DCV for Easy Job Scouting</h4>
        <span style="font-size: 14px"></span>
    </div>
</div>
<br>
<br>
<div>
    <form class="form-horizontal" method="post" action="functions/savecv.php">
        <div class="form-group">
            <label class="col-sm-2 control-label">Functional Areas</label>
            <div class="col-sm-10">
                <textarea class="form-control" type="text" name="fun_areas" placeholder="State areas where you have skill, Minimum 3, Maximum 10"></textarea>
            </div>

        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Experience (Years)</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" name="exp" placeholder="Experience">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Highest Educational Qualification</label>
            <div class="col-sm-10">
                <select class="form-control" type="number" name="edu">
                    <option value="0">none</option>
                    <option value="1">Primary School Leaving Certificate</option>
                    <option value="2">First School Leaving Certificate</option>
                    <option value="3">OND</option>
                    <option value="4">HND or BSC</option>
                    <option value="5">PHD</option>
                    <option value="6">MSC</option>
                    <option value="7">Prof.</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Hobbies</label>
            <div class="col-sm-10">
                <textarea class="form-control" type="text" name="hobbies" placeholder="Hobbies" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Languages Spoken</label>
            <div class="col-sm-10">
                <textarea class="form-control" type="text" name="lang" placeholder="Spoken Languages"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Qualification</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="core_area" placeholder="Core Area / Field of Study">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <textarea class="form-control" type="text" name="referee" placeholder="Details of Referee(s)" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit CV" name="dcv" class="btn btn-primary pull-right">
        </div>
        <hr>
    </form>
</div>

<?php
include_once 'layout/footer.php';
?>
