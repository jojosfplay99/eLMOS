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
$table = 'rpt_assessment';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'id', 'dt' => 1 ),
    array( 'db' => 'propertyid', 'dt' => 2 ),    
    array( 'db' => 'taxdec', 'dt' => 3),
    array( 'db' => 'taxyear', 'dt' => 4),
    array( 'db' => 'total_assessedvalue', 'dt' => 5),
    array( 'db' => 'taxdue', 'dt' => 6),
    array( 'db' => 'basic', 'dt' => 7),
    array( 'db' => 'sef', 'dt' => 8),    
    array( 'db' => 'penalties', 'dt' => 9),
    array( 'db' => 'discount', 'dt' => 10),
    array( 'db' => 'total', 'dt' => 11),
    array( 
        'db' => 'pay_date',
        'dt' => 12,
        'formatter' => function( $d, $row ) {
            return date( 'm/d/Y', strtotime($d));
        }
    ),
    array( 'db' => 'clerkid', 'dt' => 13),
    array( 
        'db' => 'date_generated',
        'dt' => 14,
        'formatter' => function( $d, $row ) {
            return date( 'm/d/Y', strtotime($d));
        }
    ),
    array( 
        'db' => 'status',
        'dt' => 15,        
    ),
    array( 'db' => 'payment_mode', 'dt' => 16),
    array( 'db' => 'compute_code', 'dt' => 17),
    array( 'db' => 'tags', 'dt' => 18),

);
 
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../sql_details.php' );
require( 'ssp.class.php' );


$clerkid = $_GET['clerkid'];
$transaction_code = $_GET['transaction_code'];

echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "propertyid NOT LIKE '' AND clerkid = '$clerkid' AND transaction_code = '$transaction_code' ORDER BY compute_code")
);