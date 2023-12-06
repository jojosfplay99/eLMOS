<?php
include '../db.php';

$batch_code = mysqli_escape_string($con,$_POST['batch_code']);
$clerkid = mysqli_escape_string($con,$_POST['clerkid']);
$ornumber = mysqli_escape_string($con,$_POST['ornumber']);
$transnum = mysqli_escape_string($con,$_POST['transnum']);
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

mysqli_query($con,"INSERT INTO burial (transnum, payor, ornumber, dated, applicant, municipality, province, deceasedperson, nationality, age, gender, causeofdeath, cemetery, ini, ene, dor, fee, clerkid, status, remittance, batch, or_code, remittance_number) VALUES('$transnum','$payor','$ornumber','$dated','$applicant','$municipality','$province','$deceased_person','$nationality','$age','$gender','$causeofdeath','$cemetery','$ini','$ene','$dor','$fee','$clerkid','PAID', NULL, NULL,'$batch_code',NULL)") or die(mysqli_error($con));

mysqli_query($con,"UPDATE or_generate SET transaction_code = '$transnum', dated = '$dated', status = 'PAID' , clerkid = '$clerkid' WHERE ornumber = '$ornumber'");




?>