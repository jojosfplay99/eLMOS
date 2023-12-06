<?php

include '../db.php';

$query = mysqli_query($con,"SELECT * FROM prefix_data");
while ($row = mysqli_fetch_array($query)){
    $lock_home = $row['lock_home'];
    $lockpass = $row['lockpass'];
}

if($lock_home == '' || $lock_home == null || $lock_home == 'NO' ){
    $array = array(
        'lock_home' => 'NO',
        'lockpass' => $lockpass,        
    );
}else{
    $array = array(
        'lock_home' => 'YES',
        'lockpass' => $lockpass,        
    );
}

echo json_encode($array);
?>