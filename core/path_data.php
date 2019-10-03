<?php

    if(isset($_GET['id']) && isset($_GET['table'])){
        //fetch data from table with the represented id
        $data = getOne($_GET['id'], $_GET['table']);
    }



