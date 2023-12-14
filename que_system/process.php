<?php
$office = $_POST['office'];
$con = mysqli_connect('sql210.infinityfree.com','if0_35611025','8BQQaTAQCJ','if0_35611025_lmos');
$date_now = date('Y-m-d');

//$query = mysqli_query($con,"SELECT * FROM que_treasurer WHERE date_sched = '$date_sched'");
//$count = mysqli_num_rows($query);

//$que_number = $count + 1;
/*
if($office == 'mcr'){
	$query = mysqli_query($con,"SELECT * FROM que_mcr WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_mcr(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}
else if($office == 'payment'){
	$query = mysqli_query($con,"SELECT * FROM que_treasurer WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_treasurer(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}
else if($office == 'mpdc'){
	$query = mysqli_query($con,"SELECT * FROM que_mpdc WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_mpdc(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}
else if($office == 'encoding'){
	$query = mysqli_query($con,"SELECT * FROM que_it WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_it(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}
else if($office == 'assessment'){
	$query = mysqli_query($con,"SELECT * FROM que_it WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_it(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}
else if($office == 'encoding'){
	$query = mysqli_query($con,"SELECT * FROM que_it WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_it(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}

else if($office == 'release'){
	
	$query = mysqli_query($con,"SELECT * FROM que_itrel WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_itrel(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
	
}
else if($office == 'obo'){
	
	$query = mysqli_query($con,"SELECT * FROM que_engineering WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_engineering(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
	
}
else if($office == 'assessor'){
	$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE date_sched = '$date_now'");
	$count = mysqli_num_rows($query);
	$que_number = $count + 1;
	mysqli_query($con,"INSERT INTO que_assessor(date_sched,que_number,designation_id,status) VALUES('$date_now','$que_number','','WAITING')");
}
*/

if($office == 'assessor'){
	$query = mysqli_query($con,"SELECT MAX(que_number) as que_number FROM que_assessor WHERE date_sched = '$date_now'");
	if(mysqli_num_rows($query) == 0){
		$que_number = 0;
	}else{
		while($row = mysqli_fetch_array($query)){
			$que_number = $row['que_number'];
		}
	}	
	$que_number = $que_number + 1;	
	$que_print = "A-".$que_number;	
	mysqli_query($con,"INSERT INTO que_assessor(date_sched,que_number,que_print,designation,status) VALUES('$date_now','$que_number','$que_print',null,'WAITING')");
}else if($office == 'payment'){
	$query = mysqli_query($con,"SELECT MAX(que_number) as que_number FROM que_treasurer WHERE date_sched = '$date_now'");
	if(mysqli_num_rows($query) == 0){
		$que_number = 0;
	}else{
		while($row = mysqli_fetch_array($query)){
			$que_number = $row['que_number'];
		}
	}	
	$que_number = $que_number + 1;	
	$que_print = "T-".$que_number;	
	mysqli_query($con,"INSERT INTO que_treasurer(date_sched,que_number,que_print,designation,status) VALUES('$date_now','$que_number','$que_print',null,'WAITING')");
}

$array = array(
	'que_number' => $que_number,
	'que_print' => $que_print,
	'office' => $office,
);

echo json_encode($array);

?>
