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
    <input type="hidden" id="filter" value="">    
    <input type="hidden" id="toggle" value="OFF">  
    <input type="hidden" id="maxgroup" value="OFF">   
        <section>
            <div class="card">                
                <div class="card-body">                      
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Assessment Roll (DETAILED)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Assessment Roll (MERGED)</button>
                        </li>               
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="text-center">
                                <br>
                                <h2 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ASSESSMENT ROLL (DETAILED LIST)</h2>                       
                            </div>                    
                            <table id="example" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:3vh;height:1vh;border:.5px solid;">
                                <thead>
                                    <tr>
                                        <th>PROPERTY ID</th>
                                        <th>PIN</th>
                                        <th>TDNO</th>
                                        <th>OWNERNAME</th>
                                        <th>OWNER ADDRESS</th>
                                        <th>PROPERTY LOCATION</th>
                                        <th>BARANGAY</th>
                                        <th>PROPERTY KIND</th>
                                        <th>EFFECTIVITY</th>
                                        <th>PREVIOUS TDNO</th>
                                        <th>PREVIOUS ASSESSED VALUE</th>
                                        <th>CLASSIFICATION</th>
                                        <th>SUB CLASSIFICATION</th>
                                        <th width="10%">TOTAL AREA</th>                           
                                        <th>MARKET VALUE</th>                                   
                                        <th>ASSESSED VALUE</th> 
                                        <th>TAXABLE</th>   
                                        <th>TRANSACTION CODE</th>
                                        <th>STATUS</th> 
                                        <th>ID</th>                             
                                    </tr>
                                </thead> 
                                <tfoot>
                                    <tr>
                                        <th>PROPERTY ID</th>
                                        <th>PIN</th>
                                        <th>TDNO</th>
                                        <th>OWNERNAME</th>
                                        <th>OWNER ADDRESS</th>
                                        <th>PROPERTY LOCATION</th>
                                        <th>BARANGAY</th>
                                        <th>PROPERTY KIND</th>
                                        <th>EFFECTIVITY</th>
                                        <th>PREVIOUS TDNO</th>
                                        <th>PREVIOUS ASSESSED VALUE</th>
                                        <th>CLASSIFICATION</th>
                                        <th>SUB CLASSIFICATION</th>
                                        <th width="10%">TOTAL AREA</th>                           
                                        <th>MARKET VALUE</th>                                   
                                        <th>ASSESSED VALUE</th> 
                                        <th>TAXABLE</th>   
                                        <th>TRANSACTION CODE</th> 
                                        <th>STATUS</th> 
                                        <th>ID</th>       
                                    </tr>
                                </tfoot>                                           
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="text-center">
                                <br>
                                <h2 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ASSESSMENT ROLL (MERGED LIST)</h2>                       
                            </div>                    
                            <table id="example2" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:3vh;height:1vh;border:.5px solid;">
                                <thead>
                                    <tr>
                                        <th>PROPERTY ID</th>
                                        <th>PIN</th>
                                        <th>TDNO</th>
                                        <th>OWNERNAME</th>
                                        <th>OWNER ADDRESS</th>
                                        <th>PROPERTY LOCATION</th>
                                        <th>BARANGAY</th>
                                        <th>PROPERTY KIND</th>
                                        <th>EFFECTIVITY</th>
                                        <th>PREVIOUS TDNO</th>
                                        <th>PREVIOUS ASSESSED VALUE</th>
                                        <th>CLASSIFICATION</th>
                                        <th>SUB CLASSIFICATION</th>
                                        <th width="10%">TOTAL AREA</th>                           
                                        <th>MARKET VALUE</th>                                   
                                        <th>ASSESSED VALUE</th> 
                                        <th>TAXABLE</th>   
                                        <th>TRANSACTION CODE</th>
                                        <th>STATUS</th>                              
                                    </tr>
                                </thead> 
                                <tfoot>
                                    <tr>
                                        <th>PROPERTY ID</th>
                                        <th>PIN</th>
                                        <th>TDNO</th>
                                        <th>OWNERNAME</th>
                                        <th>OWNER ADDRESS</th>
                                        <th>PROPERTY LOCATION</th>
                                        <th>BARANGAY</th>
                                        <th>PROPERTY KIND</th>
                                        <th>EFFECTIVITY</th>
                                        <th>PREVIOUS TDNO</th>
                                        <th>PREVIOUS ASSESSED VALUE</th>
                                        <th>CLASSIFICATION</th>
                                        <th>SUB CLASSIFICATION</th>
                                        <th width="10%">TOTAL AREA</th>                           
                                        <th>MARKET VALUE</th>                                   
                                        <th>ASSESSED VALUE</th> 
                                        <th>TAXABLE</th>   
                                        <th>TRANSACTION CODE</th> 
                                        <th>STATUS</th>     
                                    </tr>
                                </tfoot>                                           
                            </table>
                        </div>
                    </div>

                
                    
                </div>
            </div>
        </section>       
    </div>   
           
</body>
<?php //include 'assessment_roll/modal.php'?>
<?php include 'assessment_roll/script.php'?>
</html>