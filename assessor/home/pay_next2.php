<?php
include '../db.php';
$clerkid  = $_POST['clerkid'];
$id  = $_POST['id'];

$dated = date('Y-m-d');

$query2 = mysqli_query($con,"SELECT * FROM user WHERE id = '$clerkid'");
while($row2 = mysqli_fetch_array($query2)){
    $designation = $row2["designation"];
}

$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE date_sched LIKE '$dated' AND status LIKE 'SERVING' AND clerkid = '$clerkid'");
if(mysqli_num_rows($query) == 0){
    mysqli_query($con,"UPDATE que_assessor SET status = 'SERVING' , clerkid = '$clerkid' WHERE id = '$id'");  
    echo "NOT";
}
else{
    
    while($row2 = mysqli_fetch_array($query)){
        $id2 = $row2["id"];
    }
    
    mysqli_query($con,"UPDATE que_assessor SET status = 'DONE' WHERE id = '$id2'");  
    mysqli_query($con,"UPDATE que_assessor SET status = 'SERVING', clerkid = '$clerkid', clerkid_des = '$designation' WHERE id = '$id'");
}


//echo $que_number;

//mysqli_query($con,"UPDATE que_assessor SET status = 'SERVING' , clerkid = '$clerkid' WHERE id = '$id'");

?>