<?php

$isactive['jobs'] = 'cactive';
include_once 'template/com_dash_head.php';
?>

<div class="col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>CREATE NEW JOB POSTING - <small><i> The <span style="color: red;">*</span> fields are required!</i></small></h4>
        </div>
        <div class="panel-body">
            <div>
                <div class="page-header">
                    <span><b>JOB DETAILS</b></span>
                </div>
                <form class="form-horizontal" method="post" action="functions/savejob.php">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Title <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="title" placeholder="Job Title" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" name="desc" placeholder="Job Description" required></textarea>
                        </div>

                    </div>
                    <hr>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Industry <span style="color: red;">*</span></label>
                        <div class="col-sm-10">

                            <select class="form-control" name="Indus" required>
                                <option value=""></option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Economics">Economics</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Fashion">Finance</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Functional Area</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="FA" placeholder="example; cashier, finance, marketing, IT, etc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Position <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="Pos" placeholder="Positions Open" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Salary</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="Salary" placeholder="Job Monthly Salary">
                        </div>
                    </div>


                    <hr>
                    <span><b>Interview and Requirements</b></span>
                    <hr>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Date <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" name="Date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Time <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="time" name="Time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Venue <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="Venue" placeholder="Venue" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Minimum Requirement <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="MinR" required>
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
                        <label class="col-sm-2 control-label">Experience (Years)</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="Exp" placeholder="Years of Experience">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-success btn-sm" type="submit" name="savejob">Create New Job</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'template/com_dash_foot.php';
?>

