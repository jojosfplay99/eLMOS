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
    <script src="view_notice/additional.js?timestamp=<?php echo date('ymdhis')?>"></script>    
  
    <!-- Custom styles for this template -->
  </head>
  <body>     
    <?php $id = $_POST['next_id'];?>
    <?php include 'navbar.php'?>
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
                        <div><button class="btn btn-primary" onclick="window.open('view_notice/preview_notice.php?id=<?php echo $id;?>', '_blank', 'menubar=no' ,width=800, height=600);"><i class="fa fa-print" aria-hidden="true"></i> Print Taxdec</button></div>
                        <iframe src="view_notice/preview_notice.php?id=<?php echo $id;?>" frameborder="0" width="100%" style="height:100vw"></iframe>
                    </div>
                    <div class="tab-pane fade show active" id="edit_tab" role="tabpanel" aria-labelledby="edit_tab" tabindex="0">
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>" readonly>
                                        <label for="floatingInput">ID</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="tdno" name="tdno" readonly>
                                        <label for="floatingInput">TDNO</label>
                                    </div>
                                </div>                                    
                            </div> 
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="ownername" name="ownername" style="height:100px;"></textarea>
                                <label for="floatingTextarea">OWNERNAME</label>
                            </div> 
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="propertylocation" name="propertylocation" placeholder="CERTIFICATE OF ...." required>
                                        <label for="floatingInput">PROPERTY LOCATION</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="effectivity" name="effectivity" placeholder="CERTIFICATE OF ...." required>
                                        <label for="floatingInput">DATE</label>
                                    </div>
                                </div>
                            </div> 
                            <table id="example" class="table table-hover table-bordered table-stripped" style="font-size:12px;width:100%;border:.5px solid;">
                                <thead>
                                    <tr >
                                        <th class="text-center">ID</th>
                                        <th class="text-center">PROPERTYID</th>
                                        <th class="text-center">OWNERNAME</th>
                                        <th class="text-center">TDNO</th>
                                        <th class="text-center">LOTNO</th>
                                        <th class="text-center">PROPERTY <br>LOCATION</th>
                                        <th class="text-center">CLASSIFICATION</th>
                                        <th class="text-center">YEAR</th>
                                        <th class="text-center">ASSESSED <br>VALUE</th>
                                        <th class="text-center">BASIC TAX</th>
                                        <th class="text-center">BASIC SEF</th>
                                        <th class="text-center">ADJUSTMENT</th>
                                        <th class="text-center">ADJUSTMENT <br>VALUE</th>
                                        <th class="text-center">TOTAL <br>DATA</th>
                                        <th class="text-center">DATE <br>CREATED</th>
                                        <th class="text-center">ACTIONS</th>                                        
                                    </tr>
                                </thead>                                                        
                            </table>                   
                        </div>                                          
                        <!-----------------PROPERTY CLASSIFICATION TABLE------------------>                                                                                         
                    </div>                    
                </div> 
                <!------------------CARD BODY------------------>                               
            </div>
        </section>
    <!------------CONTENT----------->
    <?php include 'view_notice/modal.php'?>
    </body>
</html>
