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
                    <h2 class="text-center mb-3" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">MACHINERY SETTINGS</h2>
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sub Classifications</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Actual Use</button>
                        </li>                                           
                    </ul>
                    <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <table id="example" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:100%;height:1vh;border:.5px solid;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CODE</th>
                                        <th>GENERAL CLASS</th>	                                        	                                  
                                        <th>DESCRIPTION</th>                                        
                                        <th>VALUE</th>
                                        <th>STATUS</th>	                                                               
                                        <th>ACTION</th> 													                    
                                    </tr>
                                </thead>                                                                         
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <table id="example2" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:100%;height:1vh;border:.5px solid;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CODE</th>	
                                        <th>GENERAL CLASS</th>		
                                        <th>DESCRIPTION</th>		                                  		                                  
                                        <th>VALUE</th>
                                        <th>STATUS</th>	                                                               
                                        <th>ACTION</th> 													                    
                                    </tr>
                                </thead>                                                                         
                            </table>
                        </div>                        
                    </div>                                                            
                </div>
            </div>
        </section>
        <form id="submit_view" action="#" method="POST">
            <input type="text" name="next_id" id="next_id" hidden>
        </form>
    </div>          
</body>
<?php include 'classification3/modal.php'?>
<?php include 'classification3/modal2.php'?>
<?php include 'classification3/script.php'?>
<?php include 'classification3/script2.php'?>
</html>