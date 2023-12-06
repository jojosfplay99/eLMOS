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
$table = 'form51';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'collector_id', 'dt' => 1 ),
    array( 'db' => 'ornumber', 'dt' => 2 ),    
    array( 'db' => 'transnum', 'dt' => 3),
    array( 
        'db' => 'date_paid',
        'dt' => 4,
        'formatter' => function( $d, $row ) {
            return date( 'm/d/Y', strtotime($d));
        }
    ),
    array( 'db' => 'payor', 'dt' => 5),
    array( 'db' => 'ngas_code', 'dt' => 6),
    array( 'db' => 'nature_col', 'dt' => 7),
    array( 'db' => 'amount', 'dt' => 8),    
    array( 'db' => 'status', 'dt' => 9),
    array( 'db' => 'remittance', 'dt' => 10),
    array( 'db' => 'batch', 'dt' => 11),
    array( 'db' => 'batch_code', 'dt' => 12),
    array( 'db' => 'remittance_number', 'dt' => 13),
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
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns,null , "collector_id = '$user_id' AND date_paid BETWEEN '$min' AND '$max'" )
);