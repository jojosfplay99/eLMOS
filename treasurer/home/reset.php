<?php
include '../db.php';

$dated = date('Y-m-d');

$query = mysqli_query($con,"SELECT * FROM que_treasurer WHERE status LIKE 'WAITING'");
if(mysqli_num_rows($query) == 0){
    $code = 0;
    mysqli_query($con,"UPDATE que_treasurer SET status = 'DONE' WHERE date_sched LIKE '$dated'");
}
else{
    $code = 1;
}

echo $code;

?>