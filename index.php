<?php

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "imageDb";


$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$imageFile = $_POST['file'];

if ( isset( $imageFile ) ){

    $imageFile2 = mysqli_real_escape_string($conn,$imageFile);
    $sql = "INSERT INTO images (image) values ('" . $imageFile2 . "')";
    $result = $conn->query($sql);


    if ($conn->query($sql) === TRUE) {

        $response = array(
            "status" => "Ok",
            "error" => false,
            "message" => "inserted the file to the database!!!"
        );

        echo json_encode($response);
    } else {
        $response = array(
            "status" => "failed",
            "error" => true,
            "message" => "error inserting to the database!!! " . $conn->error
        );
    
        echo json_encode($response);
    }
    $conn->close();




    

}else{
    $response = array(
        "status" => "failed",
        "error" => true,
        "message" => "file not found!!!"
    );

    echo json_encode($response);
}






?>