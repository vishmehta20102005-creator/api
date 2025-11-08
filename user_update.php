<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');

include 'connection.php';
$data = json_decode(file_get_contents("php://input"));

if(isset($data->id) && isset($data->name) && isset($data->email)){
    $id=$data->id;
    $name=$data->name;
    $email=$data->email;

    $sql="update user set name='$name' , email= '$email' where id=$id";
    if($conn->query($sql) === TRUE){
        echo json_encode(array("message" => "user updated successfully" , "status" => 200));
    }
    else{
        echo json_encode(array("message" => "error" . $sql . "<br>" . $conn->error));
    }
}
else{
    echo json_encode(array("message" => "invalid input"));
}
?>