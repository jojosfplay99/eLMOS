<?php
include '../db.php';
$id = $_POST['id'];

$query = mysqli_query($con,"SELECT * FROM certifications WHERE id = '$id' ");
while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $tracer_id = $row['tracerid'];
    $date_created = $row['date_created'];
    $title = $row['title'];
    $requested_by = $row['requested_by'];
    $html_taxdec = $row['html_text'];    
}

$array = array(
    "tracer_id" => $tracer_id,
    "date_created" => $date_created,
    "title" => $title,
    "requested_by" => $requested_by,
    "html_taxdec" => $html_taxdec,
);

echo json_encode($array);

?>