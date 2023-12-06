<?php
include '../db.php';

$id = mysqli_escape_string($con,$_POST['id']);
$transnum = mysqli_escape_string($con,$_POST['transnum']);
$clerkid = mysqli_escape_string($con,$_POST['clerkid']);
$ornumber = mysqli_escape_string($con,$_POST['ornumber']);
$payor = mysqli_escape_string($con,$_POST['payor']);
$applicant = mysqli_escape_string($con,$_POST['applicant']);
$municipality = mysqli_escape_string($con,$_POST['municipality']);
$province = mysqli_escape_string($con,$_POST['province']);
$dated = mysqli_escape_string($con,$_POST['dated']);
$deceased_person = mysqli_escape_string($con,$_POST['deceased_person']);
$nationality = mysqli_escape_string($con,$_POST['nationality']);
$age = mysqli_escape_string($con,$_POST['age']);
$gender = mysqli_escape_string($con,$_POST['gender']);
$causeofdeath = mysqli_escape_string($con,$_POST['causeofdeath']);
$cemetery = mysqli_escape_string($con,$_POST['cemetery']);
$ini = mysqli_escape_string($con,$_POST['ini']);
$ene = mysqli_escape_string($con,$_POST['ene']);
$dor = mysqli_escape_string($con,$_POST['dor']);
$fee = mysqli_escape_string($con,$_POST['fee']);


mysqli_query($con,"UPDATE burial SET transnum = '$transnum',payor = '$payor',ornumber = '$ornumber',dated = '$dated',applicant = '$applicant',municipality = '$municipality',province = '$province',deceasedperson = '$deceased_person',nationality = '$nationality',age = '$age',gender = '$gender',causeofdeath = '$causeofdeath',cemetery = '$cemetery',ini = '$ini',ene = '$ene',dor = '$dor',fee = '$fee', clerkid = '$clerkid' WHERE id = '$id'") or die(mysqli_error($con));

?>