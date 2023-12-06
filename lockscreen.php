<?php
include 'assessor/db.php';

$query = mysqli_query($con,"SELECT * FROM prefix_data");
while($row = mysqli_fetch_array($query)){
    $lock = $row['lock_home'];
}

echo $lock;

?>