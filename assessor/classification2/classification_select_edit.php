<?php
include '../db.php';

    if(!isset( $_POST['searchTerm2'])){
        $search = $_POST['searchTerm'];          
        $search2 = $_POST['searchTerm2'];            
        $fetchData = mysqli_query($con,"select * from landclasses where subclass_code like '".$search2."' limit 30");
    }
    else{
        if(!isset($_POST['searchTerm'])){
            $fetchData = mysqli_query($con,"select * from landclasses order by landClassesID  limit 10");
        }else{
            $search = $_POST['searchTerm'];            
            $fetchData = mysqli_query($con,"select * from landclasses where description like '%".$search."%' limit 30");
        }
    }
	
		
	$data = array();

	while ($row = mysqli_fetch_array($fetchData)) {
	    $data[] = array("id"=>$row['code'], "text"=>$row['description'] , "value"=>$row['value'] );
	}


echo json_encode($data);
?>
