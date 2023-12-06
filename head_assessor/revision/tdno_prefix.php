<?php

include '../db.php';

$barangay = $_POST['barangay'];

$query = mysqli_query($con,"SELECT * FROM prefix_data");
while($row = mysqli_fetch_array($query)){
    $prefix = $row['prefix_tdno'];
}

$query2 = mysqli_query($con,"SELECT MAX(tdno) as tdno FROM propertydb_rpt WHERE tdno LIKE '$prefix%'");
while ($row2 = mysqli_fetch_array($query2)){
    $tdno = $row2['tdno'];
    if($tdno == null){
        $tdno = 0;
    }
    else{
        $tdno = $tdno;
    }
}

$query3 = mysqli_query($con,"SELECT * FROM barangays WHERE barangay = '$barangay'");
if(mysqli_num_rows($query3) == 0){
    $barangay_name = "NO RECORD";
    $code = "NO RECORD";
}
else{
    while($row3 = mysqli_fetch_array($query3)){
        $barangay_name = $row3['barangay'];
        $code = $row3['code'];
    }
}

$query4 = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE tdno LIKE '$prefix%'");
$count = mysqli_num_rows($query4);

$array = array("prefix_tdno"=>$prefix,"tdno"=>$tdno,"barangay"=>$barangay_name,"code"=>$code,"count"=>$count);

echo json_encode($array);

?>