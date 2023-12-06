<?php
include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM user WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $user = $row['user'];
    $password = $row['password'];
    $designation = $row['designation'];
    $status = $row['status'];
}

$query2 = mysqli_query($con,"SELECT * FROM designation_table WHERE id = '$designation'");
while($row2 = mysqli_fetch_array($query2)){
    $designation_name = $row2['designation'];
}

function myCrypt($value, $key, $iv){
    $encrypted_data = openssl_encrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($encrypted_data);
}


$valTxt="MyText";
$key="01234567890123456789012345678901"; // 32 bytes
$vector="1234567890123412"; // 16 bytes
$encrypted = myCrypt($password, $key, $vector);


$array = array(
    "designation_name" => $designation_name,
    "clerkid" => $id,
    "user" => $user,
    "password" => $encrypted,
    "designation" => $designation,
    "status" => $status,
);

echo json_encode($array);

?>