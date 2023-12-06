<?php
include '../db.php';


$clerkid = $_POST['clerkid'];
$propertyid = $_POST['propertyid'];
$transaction_code = $_POST['transaction_code'];
$ornum = $_POST['ornum'];
$tdno = $_POST['tdno'];
$assessedvalue = $_POST['assessedvalue'];
$taxyear = $_POST['taxyear'];
$tax_per = $_POST['tax_per'];
$date_start = $_POST['date_start'];
$taxdue = $_POST['taxdue'];
$discount = $_POST['discount'];
$penalty = $_POST['penalty'];
$total_taxdue = $_POST['total_taxdue'];
$payment_mode = $_POST['payment_mode'];
$grand_total_taxdue = $_POST['grand_total_taxdue'];
$basic = $_POST['basic'];
$sef = $_POST['sef'];
$compute_code = date('Ymdhis')."".rand(0,100);
//$month_today = date('F');
$date_year = date('Y');
if($payment_mode == 'ANNUAL'){    
    $number = cal_days_in_month(CAL_GREGORIAN, date('m'), $date_year);
    $date_today = date('m');
    $month_array = $date_year."-12-".$number;    
    mysqli_query($con,"INSERT INTO rpt_assessment(propertyid,taxdec,taxyear,total_assessedvalue,taxdue,basic,sef,discount,penalties,total,pay_date,clerkid,date_generated,compute_code,payment_mode,status,tags) VALUES('$propertyid','$tdno','$taxyear','$assessedvalue','$taxdue','$basic','$sef','$discount','$penalty','$grand_total_taxdue','$month_array','$clerkid',NOW(),'$compute_code','$payment_mode','PENDING','A1')") or die(mysqli_error($con));
}else if($payment_mode == 'SEMI ANNUAL'){    
    $date_today = array('6','12');
    for($i=0;$i<2; $i++){
        $tags = "S".($i+1);
        $number = cal_days_in_month(CAL_GREGORIAN, $date_today[$i], $date_year);    
        $month_array = $date_year."-".$date_today[$i]."-".$number;
        mysqli_query($con,"INSERT INTO rpt_assessment(propertyid,taxdec,taxyear,total_assessedvalue,taxdue,basic,sef,discount,penalties,total,pay_date,clerkid,date_generated,compute_code,payment_mode,status,tags) VALUES('$propertyid','$tdno','$taxyear','$assessedvalue','$taxdue','$basic','$sef','$discount','$penalty','$grand_total_taxdue','$month_array','$clerkid',NOW(),'$compute_code','$payment_mode','PENDING','$tags')") or die(mysqli_error($con));
    }
}else if($payment_mode == 'QUARTERLY'){
    $date_today = array('3','6','9','12');
    for($i=0;$i<4; $i++){
        $tags = "Q".($i+1);
        $number = cal_days_in_month(CAL_GREGORIAN, $date_today[$i], $date_year);    
        $month_array = $date_year."-".$date_today[$i]."-".$number;
        mysqli_query($con,"INSERT INTO rpt_assessment(propertyid,taxdec,taxyear,total_assessedvalue,taxdue,basic,sef,discount,penalties,total,pay_date,clerkid,date_generated,compute_code,payment_mode,status,tags) VALUES('$propertyid','$tdno','$taxyear','$assessedvalue','$taxdue','$basic','$sef','$discount','$penalty','$grand_total_taxdue','$month_array','$clerkid',NOW(),'$compute_code','$payment_mode','PENDING','$tags')") or die(mysqli_error($con));
    }
}

echo $month_array;





?>