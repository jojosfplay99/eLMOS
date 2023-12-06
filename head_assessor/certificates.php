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
    <link rel="stylesheet" href="../dist/select2/css/select2.min.css">
    <link rel="stylesheet" href="../dist/select2/css/select2-bootstrap-5-theme.min.css">
    
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/select2/js/select2.full.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>    
    <script src="../dist/tinymce/tinymce.min.js"></script>
    <script src="../dist/js/jquery.insert-at-cursor.min.js"></script>
    <script src="../dist/js/jquery.number.min.js"></script>
    <script src="certificates/datatable.js?timestamp=<?php echo date('ymdhis')?>"></script>    
  
    <!-- Custom styles for this template -->
  </head>
  <body>     
    <?php include 'navbar.php'?>
    <!------------CONTENT----------->
      <main class="container-fluid">
        <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
          <table id="example" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:100%;">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>TITLE</th>	
                  <th>TRACER ID</th>		                                  
                  <th>REQUESTED BY</th>	                   
                  <th>DATE CREATED</th>	               	             	                    	                                                  
                  <th>ACTION</th> 													                    
                </tr>
            </thead>  
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>	
                    <th>TRACER ID</th>		                                  
                    <th>REQUESTED BY</th>	                   
                    <th>DATE CREATED</th>	               	             	                    	                                                  
                    <th>ACTION</th> 
                </tr>
            </tfoot>                                            
          </table>
        </section>
      </main>
    <!------------CONTENT----------->
    <?php include 'certificates/modal.php'?>
    </body>
</html>
