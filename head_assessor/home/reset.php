<?php
include '../db.php';

$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT * FROM que_assessor WHERE status LIKE 'WAITING'");
if(mysqli_num_rows($query) == 0){
    $code = 0;
    mysqli_query($con,"UPDATE que_assessor SET status = 'DONE' WHERE date_sched LIKE '$dated'");
}
else{
    $code = 1;
}

echo $code;

?>