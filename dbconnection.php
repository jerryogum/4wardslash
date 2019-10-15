<?php session_start(); 
error_reporting(E_ALL^E_NOTICE);
    $db['db_host'] = "localhost";
    $db['db_user'] = "voeooraa_vckjdvnwjpdbh";
    $db['db_pass'] = "t}3zx(I6U8#g";
    $db['db_name'] = "voeooraa_gbsewfveggs";

    //The loop below makes the array elements contants
    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }
    $connected = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); 
    if(!$connected){
        die("Connection to Database Failled ".mysqli_error($connected));
    }