<?php

include "../db.php";

$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}

$query = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE id = '$id'");
if(mysqli_num_rows($query) == 0){
    $mode = null;
    $area = null;
    $array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"area"=>"0");
}
else{
    while($row = mysqli_fetch_array($query)){
        
        $area = $row['area'];
        $sub_classification = $row['sub_classification'];
        $classification = $row['classification'];
        $actualuse = $row['actualuse'];
        $marketvalue = $row['marketvalue'];
        $assessedvalue = $row['assessedvalue'];
            if(str_contains($sub_classification, "Residential") || str_contains($sub_classification, "Res") || str_contains($sub_classification, "res")){
                $mode = "SQM";		
            }
            else if(str_contains($actualuse, "Residential") || str_contains($classification, "Residential")){
                $mode = "SQM";	
            }
            else if(str_contains($sub_classification, "Industrial") || str_contains($sub_classification, "Ind") || str_contains($sub_classification, "ind")){
                $mode = "SQM";
            }
            else if(str_contains($actualuse, "Industrial") || str_contains($classification, "Industrial")){
                $mode = "SQM";
            }
            else if(str_contains($sub_classification, "Commercial") || str_contains($sub_classification, "Com") || str_contains($sub_classification, "com")){
                $mode = "SQM";
            }
            else if(str_contains($actualuse, "Commercial") || str_contains($classification, "Commercial")){
                $mode = "SQM";
            }
            else if(str_contains($sub_classification, "Special")){
                $mode = "SQM";
            }
            else if(str_contains($actualuse, "Special") || str_contains($classification, "Special")){
                $mode = "SQM";
            }
            else{
                $mode = "HECTARES";
            }
    }
    
    if($mode == "HECTARES"){
        $area1 = $area * 10000;
    }
    else{
        $area1 = $area;
    }
    
    $get_assval = $assessedvalue * .10;
    $round_assval = round($get_assval);
    $return_assval = $round_assval * 10;

    $get_marketvalue = $marketvalue * .10;
    $round_marketvalue = round($get_marketvalue);
    $return_marketvalue = $round_marketvalue * 10;

     	
    
    $array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length,"area"=>$area1,"mode"=>$mode ,"assval"=>$return_assval);
}

mysqli_query($con,"UPDATE propertydb2_rpt SET area_mode = '$mode', per_sqm = '$area1' , marketvalue = '$return_marketvalue' , assessedvalue = '$return_assval'  WHERE id = '$id'");

echo json_encode($array)

?>