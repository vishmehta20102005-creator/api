<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include 'conn.php';
if (isset($_POST['name']) && isset($_POST['email']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];

    $sql="insert into api (name,email) values ('$name' , '$email')";
    $result=mysqli_query($conn,$sql);

    if ($result)
    {
        echo json_encode(array("status"=>200,"message"=>"user added successfully"));
    }
    else{
        echo json_encode(array("message"=>"error inserting data"));
    }
    else{
        echo json_encode(array("message"=>"invalid input"));
    }
    
}?>