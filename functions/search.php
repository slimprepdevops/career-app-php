<?php

include_once('../config/connect.php');
include_once('../config/director.php');
include_once('../core/functionality.php');
include_once('../core/alldata.php');

    if(
        !empty($_POST['table']) && !empty($_POST['key'])
    ){
        $table = $_POST['table'];
        $key = $_POST['key'];

        if($_POST['table'] === 'users'){
            $result = array();

//            global $conn;

            $sql = "SELECT * FROM users where fname LIKE '%$key%' or lname like '%$key%' or location like '%$key%'";
            $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if($parser){
                //make a while loop to get all data
                $jlist = null;
                $_data = array();
                while($jlist = mysqli_fetch_array($parser)){
                    $result[]  = $jlist;
                }
            }

            if(count($result) > 0){
                $response['user'] = $result;
                $response['count'] = count($result);
                $response['success'] = true;
                $response['type'] = 'user';
            }else{
                $response['success'] = false;
                $response['type'] = 'user';
                $response['message'] = 'No results found. Try again';
                $response['errors'] = mysqli_error($conn);
            }

            echo json_encode($response) ;
        }elseif($_POST['table'] === 'jobs'){
            $result = array();
            $sql = "SELECT * FROM jobs where title LIKE '%$key%' OR indus LIKE '%$key%' or salary like '%$key%' or func_area LIKE '%$key%' or pos like '%$key%'";
            $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if($parser){
                //make a while loop to get all data
                $jlist = null;
                $_data = array();
                while($jlist = mysqli_fetch_array($parser)){
                    $result[]  = $jlist;
                }
            }

            if(count($result) > 0){
                $response['jobs'] = $result;
                $response['count'] = count($result);
                $response['success'] = true;
                $response['type'] = 'jobs';
            }else{
                $response['success'] = false;
                $response['type'] = 'jobs';
                $response['message'] = 'No results found. Try again';
                $response['errors'] = mysqli_error($conn);
            }

            echo json_encode($response) ;
        }

    }else{

    }



?>