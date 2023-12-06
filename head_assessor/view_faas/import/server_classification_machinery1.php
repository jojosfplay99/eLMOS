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
$table = 'machine_appraisal';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'id' , 'dt' => 0),
    array('db' => 'faasid' , 'dt' => 1),
    array('db' => 'propertyid' , 'dt' => 2),
    array('db' => 'kind_of_machine' , 'dt' => 3),
    array('db' => 'brand' , 'dt' => 4),
    array('db' => 'model' , 'dt' => 5),
    array('db' => 'capacity_hp' , 'dt' => 6),
    array('db' => 'date_acquired' , 'dt' => 7),
    array('db' => 'condition_acquired' , 'dt' => 8),
    array('db' => 'estimated_life' , 'dt' => 9),
    array('db' => 'remaining_life' , 'dt' => 10),
    array('db' => 'year_installed' , 'dt' => 11),
    array('db' => 'year_initial_operation' , 'dt' => 12)    
);
 
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../sql_details.php' );
require( 'ssp.class.php' );


$data_value = $_GET['extra_search'];

echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "faasid LIKE '$data_value' ")
);