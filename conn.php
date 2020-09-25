<?php
    define("SERVER_NAME", "localhost");
    define("ADMIN_NAME", "u840559849_root");
    define("ADMIN_PASSWORD", "&6pOI#ZP");
    define("DATABASE_NAME", "u840559849_bandbin");
    date_default_timezone_set("Asia/Calcutta");

    $baseURL = "https://beardandblush.in/admin/";
    
    session_start();
    $con = mysqli_connect(SERVER_NAME, ADMIN_NAME, ADMIN_PASSWORD, DATABASE_NAME);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    header("allow-control-access-origin: * ");
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


    /* Cleaning the user input */
    function sanitizing_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function result($typeOfResult, $data){
        if($typeOfResult == 1){
            $result = array(
                "status" => "SUCCESS",
                "data" => $data
            );
            $resultJSON = json_encode($result);
            print_r($resultJSON);
        }
        else if($typeOfResult == 0){
            $result = array(
                "status" => "FAILURE",
                "data" => $data
            );
            $resultJSON = json_encode($result);
            print_r($resultJSON);
        }
        else if($typeOfResult == -1){
            $result = array(
                "status" => "ERROR",
                "data" => $data
            );
            $resultJSON = json_encode($result);
            print_r($resultJSON);
        }
        else if($typeOfResult == -2){
            $result = array(
                "status" => "AUTH_ERROR",
                "data" => $data
            );
            $resultJSON = json_encode($result);
            print_r($resultJSON);
        }
    }

?>