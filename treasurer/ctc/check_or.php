<?php
include '../db.php';

$or_id = $_POST['or_id'];

$query = mysqli_query($con,"SELECT * FROM or_generate WHERE id = '$or_id'");
while($row = mysqli_fetch_array($query)){
    $array = array(
        'or_id' => $row['id'],
        'ornumber' => $row['ornumber'],
        'batch_code' => $row['batch_code'],
    );
}

echo json_encode($array);
?>