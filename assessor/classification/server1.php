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
$table = 'landsubclasses';
 
// Table's primary key
$primaryKey = 'landSubclassesID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'landSubclassesID', 'dt' => 0 ),
    array( 'db' => 'general_class', 'dt' => 1 ),
    array( 'db' => 'subclass_code', 'dt' => 2 ),
    array( 'db' => 'mode',
           'dt' => 3,
           'formatter' => function( $d, $row ) {
                return strtoupper($d);
            }        
        ), 
    array( 'db' => 'description', 'dt' => 4),    
    array( 'db' => 'value', 'dt' => 5), 
    array( 'db' => 'status',
           'dt' => 6,
           'formatter' => function( $d, $row ) {
                return strtoupper($d);
            }
        ), 
);
 
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../sql_details.php' );
require( 'ssp.class.php' );




echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
);