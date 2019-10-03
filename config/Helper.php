<?php


class Helper{


    public function signup(){

    }

    public function login(){

    }

    public function session(){

    }

    public function activeUser(){
        $user = 'benjamin';

        return $user;
    }

    public function details($id){

        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "career_search";

        // Create connection
        $conn = mysqli_connect($host, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE id = '$id'";
        $parser = mysqli_query($conn, $sql) or die(mysqli_error());

        $user = mysqli_fetch_array($parser);
        return $user;

    }

}