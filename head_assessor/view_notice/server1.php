<?php


/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'assessment_notice';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'propertyid', 'dt' => 1 ),
    array( 'db' => 'ownername', 'dt' => 2 ),
    array( 'db' => 'tdno', 'dt' => 3), 
    array( 'db' => 'lotno', 'dt' => 4), 
    array(
        'db' => 'propertylocation', 
        'dt' => 5,
        'formatter' => function( $d, $row ) {
            $location = explode(",", $d);
            $data_trim = array_map('trim', $location);
            $search = array_search("BOLJOON", $data_trim);
            if($search === false){
                return " ";                
            }
            else{
                $position = $search - 1;
                return $location[$position];
            }                        
        }
    ),    
    array( 'db' => 'classification', 'dt' => 6),
    array( 'db' => 'year', 'dt' => 7),
    array( 'db' => 'assessedvalue', 'dt' => 8),
    array( 'db' => 'basic_tax', 'dt' => 9),
    array( 'db' => 'sef_tax', 'dt' => 10),
    array( 'db' => 'adjustment_percentage', 'dt' => 11),
    array( 'db' => 'adjustment_value', 'dt' => 12),
    array( 'db' => 'total_data', 'dt' => 13),
    array( 'db' => 'date_created', 'dt' => 14),

  
);
 

 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../sql_details.php' );
require( 'ssp.class.php' );

$dated = date('Y');

$id = $_GET['extra_search'];


echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "propertyid = '$id' AND year LIKE '$dated%'")
);