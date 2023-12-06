<!DOCTYPE html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>LGU Management and Operations System</title>
        <link rel="stylesheet" href="../dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../dist/css/sweetalert2.min.css">
        <link rel="stylesheet" href="../dist/fontawesome/css/all.css">  
        <link rel="stylesheet" href="../dist/datatables/datatables.min.css">  
        <link rel="stylesheet" href="../dist/select2/css/select2.min.css">
        <link rel="stylesheet" href="../dist/select2/css/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="../dist/jquery_ui/jquery-ui.min.css">
        
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/jquery_ui/jquery-ui.min.js"></script>
        <script src="../dist/js/js.cookie.min.js"></script>
        <script src="../dist/js/jquery.redirect.js"></script>
        <script src="../dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dist/js/sweetalert2.all.min.js"></script>
        <script src="../dist/select2/js/select2.full.min.js"></script>
        <script src="../dist/fontawesome/js/all.js"></script>
        <script src="../dist/datatables/datatables.min.js"></script>    
        <script src="../dist/tinymce/tinymce.min.js"></script>
        <!--<script src="revision/fetch_data.js?timestamp=<?php echo date('ymdhis')?>"></script>        -->
        <script src="revision/additional_script.js?timestamp=<?php echo date('ymdhis')?>"></script>    
        <!-- Custom styles for this template -->
    </head>
<body>       
<?php include 'navbar.php'?>
    <div class="container-fluid">
        <section>
            <div class="card">
                <div class="card-header">
                  <div>Tax Declaration <span id="header_span"></span></div>
                </div>
                <div id="button_add" class="btn-group"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="revise_barangay" name="revise_barangay" placeholder="name@example.com" style="text-transform:uppercase">
                                <label for="floatingInput">Revised per Barangay</label>
                            </div>
                        </div>                        
                    </div>
                    
                    <table id="example" class="table table-hover table-bordered table-responsive display wrap" style="font-size:12px;width:3vh;height:1vh;border:.5px solid;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="10%">TDNO</th>	
                                <th width="10%">PIN</th>		                                  
                                <th width="10%">OWNERNAME</th>
                                <th width="10%">LOT NO</th>	                   
                                <th width="10%">PROPERTY LOCATION</th>
                                <th width="10%">BARANGAY</th>	               	             	                    	                              
                                <th width="10%">PROPERTY KIND</th> 
                                <th width="5%">STATUS</th> 
                                <th width="5%">TRANSACTION CODE</th>         
                                <th width="3%">ACTION</th>  													                    
                            </tr>
                        </thead>  
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th width="10%">TDNO</th>	
                                <th width="10%">PIN</th>		                                  
                                <th width="10%">OWNERNAME</th>
                                <th width="10%">LOT NO</th>	                   
                                <th width="10%">PROPERTY LOCATION</th>
                                <th width="10%">BARANGAY</th>	               	             	                    	                              
                                <th width="10%">PROPERTY KIND</th> 
                                <th width="5%">STATUS</th> 
                                <th width="5%">TRANSACTION CODE</th>         
                                <th width="3%">ACTION</th>  													                    
                            </tr>
                        </tfoot>                       
                    </table>
                </div>
            </div>
        </section>
    </div>          
</body>
<?php include 'revision/modal.php'?>

</html>