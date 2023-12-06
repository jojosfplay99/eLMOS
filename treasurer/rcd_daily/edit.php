<?php
include '../db.php';

$id = $_POST['id'];
$payor = $_POST['payor'];
$naturecol = $_POST['naturecol'];
$ngascode = $_POST['ngascode'];
$amount = $_POST['amount'];

if($naturecol == ''){
    mysqli_query($con,"UPDATE form51 SET payor = '$payor', ngas_code = '$ngascode', amount = '$amount' WHERE id = '$id' ") or die(mysqli_error($con));
}
else{
    mysqli_query($con,"UPDATE form51 SET payor = '$payor', nature_col = '$naturecol', ngas_code = '$ngascode', amount = '$amount' WHERE id = '$id' ") or die(mysqli_error($con));
}

?>