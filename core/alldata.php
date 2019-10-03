<?php

    function allJobs(){

        global $conn;
        $sql = "SELECT * FROM jobs WHERE status = 1";
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

    function jobAuthor($id, $key){
        global $conn;
        $sql = "SELECT * FROM company WHERE id = '$id'";
        $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $_data = mysqli_fetch_array($parser);
        return $_data[$key];

    }
