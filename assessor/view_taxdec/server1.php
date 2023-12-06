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
$table = 'propertydb2_rpt';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'propertyid', 'dt' => 1 ),
    array( 'db' => 'tdno', 'dt' => 2 ),
    array( 'db' => 'classification', 'dt' => 3), 
    array( 'db' => 'sub_classification', 'dt' => 4),    
    array( 'db' => 'area', 'dt' => 5),
    array( 'db' => 'area_mode', 'dt' => 6),    
    array( 'db' => 'per_sqm', 'dt' => 7),
    array( 'db' => 'basic_value', 'dt' => 8),
    array( 'db' => 'depreciated_level', 'dt' => 9),
    array( 'db' => 'depreciated_value', 'dt' => 10),
    array( 'db' => 'marketvalue', 'dt' => 11),
    array( 'db' => 'adjustment_level', 'dt' => 12),
    array( 'db' => 'actualuse', 'dt' => 13),
    array( 'db' => 'assessedlevel', 'dt' => 14),
    array( 'db' => 'assessedvalue', 'dt' => 15),
    array( 'db' => 'floor_item', 'dt' => 16),
    array( 'db' => 'adjustment_factor', 'dt' => 17),
);
 
$propertyid = $_GET['propertyid'];
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../sql_details.php' );
require( 'ssp.class.php' );




echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "propertyid = '$propertyid'")
);