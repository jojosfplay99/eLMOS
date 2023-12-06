<!doctype html>
<html lang="en" data-bs-theme="auto">
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
    <script src="../dist/js/jquery.number.min.js"></script>   
    <script src="../dist/tinymce/tinymce.min.js"></script>
    <script src="view_certificate/additional.js?timestamp=<?php echo date('Ymdhis') ?>"></script>
    
    <!-- Custom styles for this template -->
  </head>
  <body>     
    <?php include 'navbar.php'?>
    <?php $id = $_POST['next_id'];?>
    <!------------CONTENT----------->
        <section class="mb-3">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                <li class="nav-item" role="presentation">                    
                    <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" data-bs-target="#edit_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-edit"></i> Edit Taxdec</button>
                </li>  
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" data-bs-target="#preview_cert" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fas fa-eye"></i> Preview Taxdec</button>
                </li>                                                            
            </ul>
        </section>
        <section class="container-fluid">            
            <div class="card-body">
                <!------------------CARD BODY------------------>
                <div class="tab-content" id="myTabContent">                    
                    <div class="tab-pane fade" id="preview_cert" role="tabpanel" aria-labelledby="faas_tab" tabindex="0">                        
                        <div><button class="btn btn-primary" onclick="window.open('view_certificate/preview_certificate.php?id=<?php echo $id;?>', '_blank', 'menubar=no' ,width=800, height=600);"><i class="fa fa-print" aria-hidden="true"></i> Print Taxdec</button></div>
                        <iframe src="view_certificate/preview_certificate.php?id=<?php echo $id;?>" frameborder="0" width="100%" style="height:1800px"></iframe>
                    </div>
                    <div class="tab-pane fade show active" id="edit_tab" role="tabpanel" aria-labelledby="edit_tab" tabindex="0">
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <form id="edit_cert">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>" readonly>
                                            <label for="floatingInput">ID</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tracer_id" name="tracer_id" value="<?php echo date('Ymdhis')?>" readonly>
                                            <label for="floatingInput">TRACER ID</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="date_created" name="date_created" value="<?php echo date('Y-m-d')?>" readonly>
                                            <label for="floatingInput">Date Created</label>
                                        </div>
                                    </div>
                                </div>          
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="CERTIFICATE OF ...." required>
                                    <label for="floatingInput">Title</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="requested_by" name="requested_by" placeholder="Sample Only" required>
                                    <label for="floatingInput">Requested By:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea id="html_taxdec" name="html_taxdec" style="height:1000px;">
                                    <br>
                                    <table class="table table-bordered" style="border:solid 1px;width:100%;font-size:12px;">
                                        <tr>
                                        <th width="20%">TDNO</th>
                                        <th width="20%">OWNERNAME</th>
                                        <th width="20%">PROPERTYLOCATION</th>
                                        <th width="10%">PREVIOUS TAXDEC</th>
                                        <th width="10%">AREA</th>
                                        <th width="10%">MARKET VALUE</th>
                                        <th width="10%">ASSESSED VALUE</th>                
                                        </tr>
                                    </table>
                                    <br>
                                    </textarea>
                                    <label for="floatingInput">Body</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="js-example-basic-single form-control form-select-lg" id="select_propertyid" name="select_propertyid" placeholder="Select Property From Taxdec"></select>
                                </div>
                                <button type="submit" class="btn btn-success float-end btn-sm btn-squared"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit Certitification</button>
                            </form>                      
                        </div>
                          
                        
                        <!-----------------PROPERTY CLASSIFICATION TABLE------------------>                                                                                         
                    </div>                    
                </div> 
                <!------------------CARD BODY------------------>                               
            </div>
        </section>
        
    <!------------CONTENT----------->
    <?php include 'view_taxdec/modal.php'?>
    </body>
</html>
