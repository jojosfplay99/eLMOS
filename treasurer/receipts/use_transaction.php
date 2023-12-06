<?php
include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM or_generate WHERE id = '$id'");
while($row = mysqli_fetch_array($query)){
    $transaction_code = $row['transaction_code'];
}

echo $transaction_code;



?>