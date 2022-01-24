<?php

    //Database connection
    $connection = mysqli_connect("localhost", "root", "", "crud_php_mysql");

    //Test connection
    if(mysqli_connect_errno()){
        echo "Failed connection to database" . mysqli_connect_error();
    }