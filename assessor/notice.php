<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    -->  
    <title>LGU Management and Operations System</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../dist/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../dist/fontawesome/css/all.css">  
    <link rel="stylesheet" href="../dist/datatables/datatables.min.css">  
    <link rel="stylesheet" href="../dist/jquery_ui/jquery-ui.min.css">
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/jquery_ui/jquery-ui.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>
    <script src="notice/datatable.js?timestamp=<?php echo date('ymdhis')?>"></script>    
  
    <!-- Custom styles for this template -->
  </head>
  <body>     
    <?php include 'navbar.php'?>
    <!------------CONTENT----------->
      <main class="container-fluid">
        <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
          <h1 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">NOTICE OF ASSESSMENTS</h1>
          <table id="example" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:3vh;height:1vh;border:.5px solid;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TDNO</th>	
                    <th>PIN</th>		                                  
                    <th>OWNERNAME</th>
                    <th>LOT NO</th>	                   
                    <th>PROPERTY LOCATION</th>
                    <th>BARANGAY</th>	               	             	                    	                              
                    <th>PROPERTY KIND</th> 
                    <th>STATUS</th> 
                    <th>TRANSACTION CODE</th>  
                    <th width="5%">ACTIONS</th>       											                    
                </tr>
            </thead>  
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>TDNO</th>	
                    <th>PIN</th>		                                  
                    <th>OWNERNAME</th>
                    <th>LOT NO</th>	                   
                    <th>PROPERTY LOCATION</th>
                    <th>BARANGAY</th>	               	             	                    	                              
                    <th>PROPERTY KIND</th> 
                    <th>STATUS</th> 
                    <th>TRANSACTION CODE</th> 
                    <th width="5%">ACTIONS</th>       											                    
                </tr>
            </tfoot>                                            
          </table>
        </section>
      </main>
    <!------------CONTENT----------->    
    </body>
</html>
