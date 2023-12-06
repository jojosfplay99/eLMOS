<?php

include '../db.php';

$filter_by = $_POST['filter_by'];
if($filter_by == "PENDING"){
    $filter_by = "PENDING%";
}
else if($filter_by == "ACTIVE"){
    $filter_by = "ACTIVE";
}
else if($filter_by == "CANCELLED"){
    $filter_by = "CANCELLED";
}
else{
    $filter_by = "";
}

$query = mysqli_query($con,"SELECT propertydb_rpt.id, propertydb_rpt.pin,propertydb_rpt.tdno, propertydb_rpt.ownername, propertydb_rpt.propertylocation, propertydb_rpt.propertykind, propertydb_rpt.effectivity,propertydb_rpt.prevtd,propertydb_rpt.prevassval, propertydb_rpt.status,propertydb_rpt.taxable, propertydb_rpt.transaction_code,propertydb2_rpt.propertyid, propertydb2_rpt.sub_classification, propertydb2_rpt.classification, propertydb2_rpt.area as area , propertydb2_rpt.per_sqm as per_sqm ,propertydb2_rpt.marketvalue as marketvalue, propertydb2_rpt.assessedvalue as assessedvalue FROM `propertydb_rpt` RIGHT JOIN propertydb2_rpt ON propertydb_rpt.id = propertydb2_rpt.propertyid WHERE per_sqm IS NULL AND propertydb_rpt.status LIKE '$filter_by' AND propertyid != ''");
echo mysqli_num_rows($query);

?>