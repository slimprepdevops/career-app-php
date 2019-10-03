<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Carrier Search Inc</title>
    <meta name="description" content="Zims Networks">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/admin.css">


</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                MENU
            </button>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                Administrator
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" method="GET" role="search">
                <div class="form-group">
                    <input type="text" name="q" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" target="_blank">Visit Site</a></li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Account
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
<!--                        <li class="dropdown-header">SETTINGS</li>-->
<!--                        <li class=""><a href="#">Other Link</a></li>-->
<!--                        <li class=""><a href="#">Other Link</a></li>-->
<!--                        <li class=""><a href="#">Other Link</a></li>-->
<!--                        <li class="divider"></li>-->
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content -->
            <div class="modal-content" id="postmodal">

                <div class="modal-header btheme">
                    <button id="modal-closure" type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="fa fa-user-circle"></i> User Login<span ></span></h5>
                </div>
                <div class="modal-body">
                    <form id="" role="form" action="" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" class="form-control" required placeholder="email-id">
                        </div>
                        <div class="form-group">
                            <label for="password">Email</label>
                            <input name="password" id="password" type="password" class="form-control" required placeholder="password">
                        </div>
                        <div class="modal-footer">
                            <div class="col-xs-8" style="text-align: left">
                                <a class="btn btn-xs btn-primary" style="margin-right: 10px" href="signup.php">Sign Up</a>
                                <a class="btn btn-xs btn-primary" style="margin-right: 10px" href="resetpassword.php">Forgot Password?</a>
                            </div>
                            <div class="col-xs-4">
                                <!-- removed from btn below : data-dismiss="modal"-->
                                <input type="submit" class="btn btn-default btn-sm" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

<div class="mbody">
    <div class="container-fluid">

