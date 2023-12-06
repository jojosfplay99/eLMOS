<?php

$extra_search = $_GET['extra_search'];
if($extra_search == "OFF"){
    $table = <<<EOT
    (
        SELECT propertydb_rpt.id, propertydb_rpt.pin,propertydb_rpt.tdno, propertydb_rpt.ownername,propertydb_rpt.address, propertydb_rpt.propertylocation, propertydb_rpt.propertykind, propertydb_rpt.effectivity,propertydb_rpt.prevtd,propertydb_rpt.prevassval, propertydb_rpt.status,propertydb_rpt.taxable, propertydb_rpt.transaction_code,propertydb2_rpt.id as id2,propertydb2_rpt.propertyid, propertydb2_rpt.sub_classification, propertydb2_rpt.classification, propertydb2_rpt.area as area , propertydb2_rpt.per_sqm as per_sqm ,propertydb2_rpt.marketvalue as marketvalue, propertydb2_rpt.assessedvalue as assessedvalue 
        FROM `propertydb_rpt` RIGHT JOIN propertydb2_rpt ON propertydb_rpt.id = propertydb2_rpt.propertyid
    ) temp
    EOT; 
}
else{
    $table = <<<EOT
    (
        SELECT  propertydb_rpt.id, propertydb_rpt.pin,propertydb_rpt.tdno, propertydb_rpt.ownername, propertydb_rpt.address, propertydb_rpt.propertylocation, propertydb_rpt.propertykind, propertydb_rpt.effectivity,propertydb_rpt.prevtd,propertydb_rpt.prevassval, propertydb_rpt.status,propertydb_rpt.taxable, propertydb_rpt.transaction_code,propertydb2_rpt.id as id2,propertydb2_rpt.propertyid, propertydb2_rpt.sub_classification, propertydb2_rpt.classification, propertydb2_rpt.area as area, MAX(propertydb2_rpt.per_sqm) as maximum_area , propertydb2_rpt.per_sqm as per_sqm ,propertydb2_rpt.marketvalue as marketvalue, propertydb2_rpt.assessedvalue as assessedvalue 
        FROM `propertydb_rpt` RIGHT JOIN propertydb2_rpt ON propertydb_rpt.id = propertydb2_rpt.propertyid GROUP BY propertydb_rpt.id
    ) temp
    EOT; 
}




// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'pin', 'dt' => 1 ),
    array( 'db' => 'tdno', 'dt' => 2),
    array( 'db' => 'ownername',  'dt' => 3),
    array( 
        'db' => 'address',  
        'dt' => 4,
        'formatter' => function( $d, $row ) {
            $d = strtoupper($d);
            return $d;            
        }
    ),
    array( 'db' => 'propertylocation',  'dt' => 5),
    array(
        'db'        => 'propertylocation',
        'dt'        => 6,
        'formatter' => function( $d, $row ) {
            $location = explode(",", $d);
            $data_trim = array_map('trim', $location);
            $search = array_search("ALCOY", $data_trim);
            if($search == 0){
                return "INCORRECT DATA";
            }
            else{
                $position = $search - 1;
                return $location[$position];
            }            
        }
    ),  
    array( 'db' => 'propertykind',  'dt' => 7),
    array( 'db' => 'effectivity',  'dt' => 8), 
    array( 'db' => 'prevtd',  'dt' => 9),    
    array( 'db' => 'prevassval',  'dt' => 10), 
    array( 'db' => 'classification',  'dt' => 11),    
    array( 'db' => 'sub_classification',  'dt' => 12),  
    //array( 'db' => '',  'dt' => 12),
    array(
        'db'        => 'per_sqm',
        'dt'        => 13,
        'formatter' => function( $d, $row ) {
            if($d == null){
                return 'NO DATA';
            }
            else{
                return $d;
            }
        }
    ),        
    array( 'db' => 'marketvalue',  'dt' => 14),      
    array( 'db' => 'assessedvalue',  'dt' => 15),
    array( 'db' => 'taxable',  'dt' => 16),     
    array( 'db' => 'transaction_code',  'dt' => 17),      
    array( 'db' => 'status',  'dt' => 18),  
    array( 'db' => 'id2',  'dt' => 19),      
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'lmos',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);