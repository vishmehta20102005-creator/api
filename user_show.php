<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json')

include 'conn.php';

$sql="select * from api";
$result=mysqli_query($conn,$sql);
$users=array();
while($row = $result->fetch_assoc()){
    $users[]=$row;
}
echo json_encode($users);
?>