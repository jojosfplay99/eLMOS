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
        
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/js/js.cookie.min.js"></script>
        <script src="../dist/js/jquery.redirect.js"></script>
        <script src="../dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dist/js/sweetalert2.all.min.js"></script>
        <script src="../dist/select2/js/select2.full.min.js"></script>
        <script src="../dist/fontawesome/js/all.js"></script>
        <script src="../dist/datatables/datatables.min.js"></script>    
        <script src="../dist/tinymce/tinymce.min.js"></script>
        <script src="view_taxdec/fetch_data.js?timestamp=<?php echo date('ymdhis')?>"></script>        
        <script src="view_taxdec/additional_script.js?timestamp=<?php echo date('ymdhis')?>"></script>    
        <!-- Custom styles for this template -->
    </head>
<body>       
<?php include 'navbar.php'?>
    <div class="container-fluid">
        <section>
            <div class="card">                
                <div class="card-body">
                    <h2 class="text-center mb-3" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">GENERAL CLASSES</h2>
                    <table id="example" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:100%;height:1vh;border:.5px solid;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CODE</th>	
                                <th>DESCRIPTION</th>		                                  
                                <th>VALUE</th>
                                <th>STATUS</th>	                                                               
                                <th>ACTION</th> 													                    
                            </tr>
                        </thead>                                                                         
                    </table>                                                                                                 
                </div>
            </div>
        </section>
        <form id="submit_view" action="#" method="POST">
            <input type="text" name="next_id" id="next_id" hidden>
        </form>
    </div>          
</body>
<?php include 'general_class/modal.php'?>
<?php include 'general_class/script.php'?>
</html>