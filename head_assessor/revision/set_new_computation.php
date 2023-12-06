<?php
include '../db.php';
$counter = $_POST['counter'];
$total_length = $_POST['total_length'];
$counter_inc = $counter+1;
if(isset($_POST['counter'])){
	$id = $_POST['id'];
}

$q = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id = '$id'");
while($q_row = mysqli_fetch_array($q)){
    $propertykind = $q_row['propertykind'];
}

$query = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$id'");
    while ($row = mysqli_fetch_array($query)) {  
        $id1 = $row['id'];
        $propertyid = mysqli_escape_string($con,$id);
		$tdno = mysqli_escape_string($con,$row['tdno']);
		$floor_item = mysqli_escape_string($con,$row['floor_item']);
		$classification = mysqli_escape_string($con,$row['classification']);	
		$sub_classification = mysqli_escape_string($con,$row['sub_classification']);
        $depreciated_level = mysqli_escape_string($con,$row['depreciated_level']);
        $area_mode = mysqli_escape_string($con,$row['area_mode']);
        $per_sqm = mysqli_escape_string($con,$row['per_sqm']);
        $adjustment_level = mysqli_escape_string($con,$row['adjustment_level']);
        $adjustment_factor = mysqli_escape_string($con,$row['adjustment_factor']);
        $actualuse = mysqli_escape_string($con,$row['actualuse']);
        $assessedlevel = mysqli_escape_string($con,$row['assessedlevel']);
        $area = mysqli_escape_string($con,$row['area']);            
        if($propertykind == 'LAND'){
            $fetchData = mysqli_query($con,"select * from landsubclasses where description LIKE '".$sub_classification."' order by landSubclassesID");            
        }
        else if($propertykind == 'BUILDING'){
            $fetchData = mysqli_query($con,"select * from improvementsbuildingsclasses where description LIKE '".$sub_classification."' order by improvementsBuildingsClassesID");            
        }
        else if($propertykind == 'MACHINERY'){
            $fetchData = mysqli_query($con,"select * from machineriesclasses where description LIKE '".$sub_classification."' order by machineriesClassesID");
        }
        if(mysqli_num_rows($fetchData) == 0){            
            $basic_value = mysqli_escape_string($con,$row['basic_value']);                        
            $depreciated_value = mysqli_escape_string($con,$row['depreciated_value']);
            $marketvalue = mysqli_escape_string($con,$row['marketvalue']);                        
            $assessedvalue = mysqli_escape_string($con,$row['assessedvalue']);            
        }
        else{
            while($row_fetch = mysqli_fetch_array($fetchData)){
                $unit_val = $row_fetch['value'];
            }
            $basic_value = $area * $unit_val;            
            $percentage_level1 = $depreciated_level / 100;
            $depreciated_value = $basic_value * $percentage_level1;
            $base_level = $basic_value - $depreciated_value;            
            $percentage_level = $adjustment_level / 100;
            $marketvalue = $base_level * $percentage_level;
            $percentage_level2 = $assessedlevel / 100;
            $assessedvalue = $marketvalue * $percentage_level2;
        }

        
        $status = mysqli_escape_string($con,$row['status']);
        $clerkid = mysqli_escape_string($con,$row['clerkid']);
		
        mysqli_query($con,"UPDATE propertydb2_rpt SET basic_value = '$basic_value',depreciated_value = '$depreciated_value',marketvalue = '$marketvalue',assessedvalue = '$assessedvalue' WHERE id = '$id1'") or die(mysqli_error($con));
    }


$array = array("id"=>$id,"counter"=>$counter,"next_counter"=>$counter_inc,"total_length"=>$total_length);

echo json_encode($array);
?>