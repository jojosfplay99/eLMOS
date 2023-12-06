<?php
include '../db.php';

$clerkid = $_POST['clerkid'];
$starting_or = $_POST['starting_or'];
$padding_or = $_POST['padding_or'];
$amount_or = $_POST['amount_or'];
$ending_or = $_POST['ending_or'];
$batch_or = $_POST['batch_or'];
$formtype = $_POST['formtype'];

$dated = date('Y-m-d h:i:s');
$batch_code = date('Ymdhis')."-".rand(0,99);

$starting_or = str_pad($starting_or, $padding_or, '0', STR_PAD_LEFT);
$ending_or = str_pad($ending_or, $padding_or, '0', STR_PAD_LEFT);

mysqli_query($con,"INSERT INTO or_batch(form,start_or,end_or,dated,batch_no,batch_code,clerkid) VALUES ('$formtype','$starting_or','$ending_or','$dated','$batch_or','$batch_code','$clerkid')") or die(mysqli_error($con));

for($i = 0; $i < $amount_or ; $i++){
    $ornumber = $starting_or + $i;
    $ornumber = str_pad($ornumber, $padding_or, '0', STR_PAD_LEFT);
    mysqli_query($con,"INSERT INTO or_generate(form_type,ornumber,batch_code,dated,status,clerkid,transaction_code) VALUES ('$formtype','$ornumber','$batch_code','$dated','PENDING',null,null)") or die(mysqli_error($con));
}

?>