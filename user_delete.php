<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');

include 'conn.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->id)){
    $id=$data->id;

    $sql="delete from api where id=$id";

    if ($conn->query($sql) === TRUE){
        echo json_encode(array("message" => "user deleted successfully" , "status" => 200));
    }
    else {
        echo json_encode(array("message" => "error" . $sql . "<br>" . $conn->error));
    }
}
else{
    echo json_encode(array("message" => "invalid input"));
}
?>