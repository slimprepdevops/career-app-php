<?php

//include_once('config/director.php');

function getJobs($id){ //id here is current company id
    global $conn;
    //user helper to get full user details into array
    $sql = "SELECT * FROM jobs WHERE com_id = '$id'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    if($parser){
        //make a while loop to get all data
        $jlist = null;
        $_data = array();
        while($jlist = mysqli_fetch_array($parser)){
            $_data[] = $jlist;
        }
        return $_data;
    }

}

function getApplications(){ // get all users that applied for a jobs posted by company/no condition
    global $conn;
    global $user_data;
    $id = $user_data['id'];
    $all = getAll('job_apply', "com_id = '$id'");
    return $all;
}

function getInvites(){ // get all users that applied for a jobs posted by company/no condition
    global $conn;
    global $user_data;
    $id = $user_data['id'];
    $var = 1;
    $all = getAll('job_apply', "com_id = '$id'", "AND invite = '$var'");
    return $all;
}

function getActiveApc(){ // gets current active application user list
    global $conn;
    $apps = getApplications();
    $_data = array();
    foreach($apps as $app){
        if(jobActive($app['job_id'])){
            $_data[] = $app;
        }
    }
    return $_data;
}

function jobActive($id){ // check if one job is active - returns true or false for given id
    global $conn;

//    fetch from database
    $sql = "SELECT * FROM jobs WHERE id = '$id'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $_data = mysqli_fetch_array($parser);
    if($_data['status'] == 1 && strtotime($_data['idate']) > time()){
        return true;
    }else{
        return false;
    }

}

function getAll($table, $cond_a = '', $cond_b=''){ // get all data from one table
    global $conn;
    if($cond_a == ""){
        $sql = "SELECT * FROM $table";
    }else{
        $sql = "SELECT * FROM $table WHERE $cond_a" . "$cond_b";
    }

    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($parser){
        //make a while loop to get all data
        $jlist = null;
        $_data = array();
        while($jlist = mysqli_fetch_array($parser)){
            $_data[] = $jlist;
        }
        return $_data;
    }

}

function getAllUsers(){ // get all data from one table
    global $conn;

    $sql = "SELECT * FROM users";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($parser){
        //make a while loop to get all data
        $jlist = null;
        $_data = array();
        while($jlist = mysqli_fetch_array($parser)){
            $_data[] = $jlist;
        }
        return $_data;
    }

}

function getAllJobs(){ // get all data from one table
    global $conn;

    $sql = "SELECT * FROM jobs";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($parser){
        //make a while loop to get all data
        $jlist = null;
        $_data = array();
        while($jlist = mysqli_fetch_array($parser)){
            $_data[] = $jlist;
        }
        return $_data;
    }

}

function getOne($id, $table){ //get one row data from one table
    global $conn;

//    fetch from database
    $sql = "SELECT * FROM $table WHERE id = '$id'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $_data = mysqli_fetch_array($parser);
    return $_data;
}

function getOneAt($table, $pos, $val){ //get one row data from one table
    global $conn;

//    fetch from database
    $sql = "SELECT * FROM $table WHERE '$pos' = '$val'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $_data = mysqli_fetch_array($parser);
    return $_data;
}

function getUserCv($id){
    global $conn;
    //user helper to get full user details into array
    $sql = "SELECT * FROM resume WHERE user_id = '$id'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $_data = mysqli_fetch_array($parser);
    return $_data;

}

function getOneReturn($id, $table, $key){ //get one row data from one table
    global $conn;

//    fetch from database
    $sql = "SELECT * FROM $table WHERE id = '$id'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $_data = mysqli_fetch_array($parser);
    return $_data[$key];

}

function aplMade($id){ // get applications made
    global $conn;

    //user helper to get full user details into array
    $sql = "SELECT * FROM job_apply WHERE user_id = '$id'";
    $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    if($parser){
        //make a while loop to get all data
        $jlist = null;
        $_data = array();
        while($jlist = mysqli_fetch_array($parser)){
            $_data[] = $jlist;
        }
        return $_data;
    }
}

function userEvt($id){
    $list = aplMade($id);
    $data = array();
    if(count($list) > 0){
        foreach ($list as $jids){
            $data[] = getOne($jids['job_id'], 'jobs');
        }
        return $data;
    }

    return false;
}

function getMinReq($id){
    $var = null;
    switch ($id){
        case 0:
            $var = "None.";
            break;
        case 1:
            $var = "Primary School Leaving Certificate";
            break;
        case 2:
            $var = "First School Leaving Certificate";
            break;
        case 3:
            $var = "OND";
            break;
        case 4:
            $var = "HND or BSC";
            break;
        case 5:
            $var = "PHD";
            break;
        case 6:
            $var = "MSC";
            break;
        case 7:
            $var = "Prof.";
            break;
        default:
            $var = "Not Available";
    }

    return $var;
}

function getUserStars(){
    global $user_data;
    $star = null;
    //check number of relevant fields in profile
    if($user_data != null){
        $star = 0.5;
        if($user_data['address'] != '' or $user_data['address'] != null ){
            $star = $star + 0.5;
        }

        if($user_data['image'] != '' or $user_data['image'] != null ){
            $star = $star + 1;
        }

        //check user cv
        $user_cv = getUserCv($user_data['id']);
        if(count($user_cv)>0){
            $star = $star + 1;
            if($user_cv['edu'] >= 6){
                $star = $star + 1;
            }elseif ($user_cv['edu'] >= 3){
                $star = $star + 0.5;
            }
            if($user_cv['core_area'] != '' or $user_cv['core_area'] != null ){
                $star = $star + 0.5;
            }
            if($user_cv['exp'] != '' or $user_cv['exp'] != null ){
                $star = $star + 0.5;
            }
        }
        return $star;
    }


}

function getUStars($id){
    $user_data = getOne($id, 'users');
    $star = null;
    //check number of relevant fields in profile
    if($user_data != null){
        $star = 0.5;
        if($user_data['address'] != '' or $user_data['address'] != null ){
            $star = $star + 0.5;
        }

        if($user_data['image'] != '' or $user_data['image'] != null ){
            $star = $star + 1;
        }

        //check user cv
        $user_cv = getUserCv($user_data['id']);
        if(count($user_cv)>0){
            $star = $star + 1;
            if($user_cv['edu'] >= 6){
                $star = $star + 1;
            }elseif ($user_cv['edu'] >= 3){
                $star = $star + 0.5;
            }
            if($user_cv['core_area'] != '' or $user_cv['core_area'] != null ){
                $star = $star + 0.5;
            }
            if($user_cv['exp'] != '' or $user_cv['exp'] != null ){
                $star = $star + 0.5;
            }
        }
        return $star;
    }


}
