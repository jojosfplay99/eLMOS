<?php
include '../db.php';
$dated = date('Y-m-d');

$id = mysqli_escape_string($con,$_POST['id']);
$ornumber = mysqli_escape_string($con,$_POST['ornumber']);
$transnum = mysqli_escape_string($con,$_POST['transnum']);
$fname = mysqli_escape_string($con,$_POST['fname']);
$mname = mysqli_escape_string($con,$_POST['mname']);
$lname = mysqli_escape_string($con,$_POST['lname']);
$gender = mysqli_escape_string($con,$_POST['gender']);
$civil_status = mysqli_escape_string($con,$_POST['civil_status']);
$bdate = mysqli_escape_string($con,$_POST['bdate']);
$address = mysqli_escape_string($con,$_POST['address']);
$placeofbirth = mysqli_escape_string($con,$_POST['placeofbirth']);
$citizenship = mysqli_escape_string($con,$_POST['citizenship']);
$ctctype = mysqli_escape_string($con,$_POST['ctctype']);
$basic = mysqli_escape_string($con,$_POST['basic']);
$gross = mysqli_escape_string($con,$_POST['gross']);
$taxdue = mysqli_escape_string($con,$_POST['taxdue']);
$penalty = mysqli_escape_string($con,$_POST['penalty']);
$total = mysqli_escape_string($con,$_POST['total']);

mysqli_query($con,"UPDATE cedula SET ctctype = '$ctctype',date_applied = '$dated',fname = '$fname',mname = '$mname',lname = '$lname',gender = '$gender',civil_status = '$civil_status',bdate = '$bdate',citizenship = '$citizenship',placeofbirth = '$placeofbirth',address1 = '$address',gross = '$gross',compute = '$taxdue',interest = '$penalty',total = '$total' WHERE id = '$id'") or die(mysqli_error($con));


?>