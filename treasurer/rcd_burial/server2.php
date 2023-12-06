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
$table = 'cedula';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'ctctype', 'dt' => 1 ),
    array( 
        'db' => 'date_applied',
        'dt' => 2,
        'formatter' => function( $d, $row ) {
            return date( 'm/d/Y', strtotime($d));
        }
    ),
    array( 'db' => 'fname', 'dt' => 3 ),    
    array( 'db' => 'mname', 'dt' => 4 ),    
    array( 'db' => 'lname', 'dt' => 5 ),    
    array( 'db' => 'gender', 'dt' => 6 ),    
    array( 'db' => 'civil_status', 'dt' => 7 ),    
    array( 
        'db' => 'bdate',
        'dt' => 8,
        'formatter' => function( $d, $row ) {
            return date( 'm/d/Y', strtotime($d));
        }
    ),
    array( 'db' => 'citizenship', 'dt' => 9 ),    
    array( 'db' => 'placeofbirth', 'dt' => 10 ),    
    array( 'db' => 'address1', 'dt' => 11 ),    
    array( 'db' => 'gross', 'dt' => 12 ),    
    array( 'db' => 'compute', 'dt' => 13 ),    
    array( 'db' => 'interest', 'dt' => 14 ),    
    array( 'db' => 'total', 'dt' => 15 ),    
    array( 'db' => 'transnum', 'dt' => 16 ),    
    array( 'db' => 'ornumber', 'dt' => 17 ),    
    array( 'db' => 'status', 'dt' => 18 ),    
    array( 'db' => 'clerkid', 'dt' => 19 ),   
    array( 'db' => 'remittance', 'dt' => 20 ),    
    array( 'db' => 'batch', 'dt' => 21 ),    
    array( 'db' => 'or_code', 'dt' => 22 ),    
    array( 'db' => 'remittance_number', 'dt' => 23 ),    

   
);
 
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../sql_details.php' );
require( 'ssp.class.php' );


$user_id = $_GET['clerkid'];
$max = $_GET['max'];
$min = $_GET['min'];

echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null , "clerkid = '$user_id' AND date_applied BETWEEN '$min' AND '$max'" )
);