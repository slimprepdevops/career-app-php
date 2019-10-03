
<?php
$active = null;
include_once ('config/director.php');
include_once('layout/header.php');
?>

<br>
    <?php if(isset($_COOKIE['passmissmatch'])){$msgshow = 'block';}else{$msgshow = 'none';}; ?>
    <div style="width: 100%;display: <?php echo $msgshow; ?> ;" >

        <div class="alert alert-danger text-center">
            <b><?php echo $_COOKIE['passmissmatch'] ?> </b>
        </div>
        <br>
    </div>

    <?php if(isset($_COOKIE['missing_field'])){$msgshow = 'block';}else{$msgshow = 'none';}; ?>
    <div style="width: 100%;display: <?php echo $msgshow; ?> ;" >

        <div class="alert alert-danger text-center">
            <b><?php echo $_COOKIE['missing_field'] ?> </b>
        </div>
        <br>
    </div>

    <?php if(isset($_COOKIE['emailexist'])){$msgshow = 'block';}else{$msgshow = 'none';}; ?>
    <div style="width: 100%;display: <?php echo $msgshow; ?> ;" >

        <div class="alert alert-danger text-center">
            <b><?php echo $_COOKIE['emailexist'] ?> </b>
        </div>
        <br>
    </div>



    <br>

<div>
    <ul class="nav nav-tabs">
        <li class="active col-xs-6"><a data-toggle="tab" href="#user">Individuals or Job Seekers</a></li>
        <li class="col-xs-6"><a data-toggle="tab" href="#company">Firms, Organisations or Employee Seekers</a></li>
    </ul>

    <div class="tab-content">
        <div id="user" class="tab-pane fade in active">
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Individual Registration Form - <small><b>for Job seekers</b></small>
                </div>
                <div class="panel-body">
                    <form action="functions/signupcontrol.php" method="post">
                        <div class="form-group">
                            <label for="email">First Name <span style="color:red"> * </span> </label>
                            <input name="fname"  type="text" class="form-control" required placeholder="first name">
                        </div>
                        <div class="form-group">
                            <label for="email">Last Name <span style="color:red"> * </span> </label>
                            <input name="lname" type="text" class="form-control" required placeholder="last name">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="email">Date of Birth</label>
                                <input name="dob"  type="date" class="form-control" required placeholder="email-id">
                            </div>
                            <div class="col-sm-6 ">
                                <label for="email">Location</label>
                                <select name="location" class="form-control" required>
                                    <option>Abia</option>
                                    <option>Adamawa</option>
                                    <option>Akwa Ibom</option>
                                    <option>Anambra</option>
                                    <option>Bauchi</option>
                                    <option>Bayelsa</option>
                                    <option>Benue</option>
                                    <option>Borno</option>
                                    <option>Cross</option>
                                    <option>Delta</option>
                                    <option>Ebonyi</option>
                                    <option>Edo</option>
                                    <option>Ekiti</option>
                                    <option>Enugu</option>
                                    <option>Gombe</option>
                                    <option>Imo</option>
                                    <option>Jigawa</option>
                                    <option>Kaduna</option>
                                    <option>Kano</option>
                                    <option>Katsina</option>
                                    <option>Kebbi</option>
                                    <option>Kogi</option>
                                    <option>Kwara</option>
                                    <option>Lagos</option>
                                    <option>Nasarawa</option>
                                    <option>Niger</option>
                                    <option>Ogun</option>
                                    <option>Ondo</option>
                                    <option>Osun</option>
                                    <option>Oyo</option>
                                    <option>Plateau</option>
                                    <option>Rivers</option>
                                    <option>Sokoto</option>
                                    <option>Taraba</option>
                                    <option>Yobe</option>
                                    <option>Zamfara</option>
                                    <option>FCT</option>
                                </select>

                            </div>

                        </div>
                        <br>

                        <div class="form-group">
                            <label for="email">Address</label>
                            <textarea name="address"  rows="3" type="text" class="form-control" placeholder="address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone  <span style="color:red"> * </span> </label>
                            <input name="phone"  type="text" class="form-control" required placeholder="phone number">
                        </div>


                        <div class="form-group">
                            <label for="email">Email  <span style="color:red"> * </span> </label>
                            <input name="email"  type="email" class="form-control" required placeholder="email address">
                        </div>



                        <div class="form-group">
                            <label for="password">Password  <span style="color:red"> * </span> </label>
                            <input name="password1"  type="password" class="form-control" required placeholder="password">
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password  <span style="color:red"> * </span> </label>
                            <input name="password2"  type="password" class="form-control" required placeholder="confirm password">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="agree" required> <small>I agree that i have read the <a href="">Terms and Conditions</a> and that the information provided is valid</small>
                        </div>


                        <div class="modal-footer">
                            <div class="col-xs-8" style="text-align: left">

                            </div>
                            <div class="col-xs-4">
                                <!-- removed from btn below : data-dismiss="modal"-->
                                <button type="submit" class="btn btn-default" value="Sign Up" name="signup">Sign Up</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <br>
            <hr>

        </div>
        <div id="company" class="tab-pane fade">
            <hr>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Corporate Registration Form - <small><b>for Companies and Organisations (Employee seekers)</b></small>
                </div>
                <div class="panel-body">
                    <form action="functions/signupcontrol.php" method="post">
                        <div class="form-group">
                            <label for="email">Company Name <span style="color:red"> * </span> </label>
                            <input name="cname"  type="text" class="form-control" required placeholder="company name">
                        </div>
                        <div class="form-group">
                            <label for="email">Company email<span style="color:red"> * </span> </label>
                            <input name="cemail" type="text" class="form-control" required placeholder="company email">
                        </div>

                        <div class="row">
                            <div class="col-sm-6 ">
                                <label for="email">Company Location <span style="color:red"> * </span> </label>
                                <select name="clocate"  class="form-control" required>
                                    <option>Abia</option>
                                    <option>Adamawa</option>
                                    <option>Akwa Ibom</option>
                                    <option>Anambra</option>
                                    <option>Bauchi</option>
                                    <option>Bayelsa</option>
                                    <option>Benue</option>
                                    <option>Borno</option>
                                    <option>Cross</option>
                                    <option>Delta</option>
                                    <option>Ebonyi</option>
                                    <option>Edo</option>
                                    <option>Ekiti</option>
                                    <option>Enugu</option>
                                    <option>Gombe</option>
                                    <option>Imo</option>
                                    <option>Jigawa</option>
                                    <option>Kaduna</option>
                                    <option>Kano</option>
                                    <option>Katsina</option>
                                    <option>Kebbi</option>
                                    <option>Kogi</option>
                                    <option>Kwara</option>
                                    <option>Lagos</option>
                                    <option>Nasarawa</option>
                                    <option>Niger</option>
                                    <option>Ogun</option>
                                    <option>Ondo</option>
                                    <option>Osun</option>
                                    <option>Oyo</option>
                                    <option>Plateau</option>
                                    <option>Rivers</option>
                                    <option>Sokoto</option>
                                    <option>Taraba</option>
                                    <option>Yobe</option>
                                    <option>Zamfara</option>
                                    <option>FCT</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="email">Company Phone  <span style="color:red"> * </span> </label>
                                <input name="cphone"  type="text" class="form-control" required placeholder="company phone ">
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="email">Company HQ Address</label>
                            <textarea name="caddress"  rows="3" type="text" class="form-control" placeholder="company address"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="password">Password  <span style="color:red"> * </span> </label>
                            <input name="cpassword1"  type="password" class="form-control" required placeholder="password">
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password  <span style="color:red"> * </span> </label>
                            <input name="cpassword2"  type="password" class="form-control" required placeholder="confirm password">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="agree" required> <small>I agree that i have read the <a href="">Terms and Conditions</a> and that the information provided is valid</small>
                        </div>


                        <div class="modal-footer">
                            <div class="col-xs-8" style="text-align: left">

                            </div>
                            <div class="col-xs-4">
                                <!-- removed from btn below : data-dismiss="modal"-->
                                <button type="submit" class="btn btn-default" value="Sign Up" name="com_signup">Sign Up</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

            <br>
            <hr>
        </div>

    </div>
</div>


<?php
include_once 'layout/footer.php';
?>
