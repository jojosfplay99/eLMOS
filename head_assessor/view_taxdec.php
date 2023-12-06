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
    <script src="../dist/tinymce/tinymce.min.js"></script>
    <script src="view_taxdec/fetch_data.js?timestamp=<?php echo date('ymdhis')?>"></script>        
    <script src="view_taxdec/additional_script.js?timestamp=<?php echo date('ymdhis')?>"></script>    
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
                    <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" data-bs-target="#preview_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fas fa-eye"></i> Preview Taxdec</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="faas-tab2" data-bs-toggle="tab" data-bs-target="#faas_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fas fa-eye"></i> Preview FAAS</button>
                </li>                                              
            </ul>
        </section>
        <section class="container-fluid">            
            <div class="card-body">
                <!------------------CARD BODY------------------>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="preview_tab" role="tabpanel" aria-labelledby="preview_tab" tabindex="0">                        
                        <div><button class="btn btn-primary" onclick="window.open('view_taxdec/preview_taxdec.php?id=<?php echo $id;?>', '_blank', 'menubar=no' ,width=800, height=600);"><i class="fa fa-print" aria-hidden="true"></i> Print Taxdec</button></div>
                        <iframe src="view_taxdec/preview_taxdec.php?id=<?php echo $id;?>" frameborder="0" width="100%" style="height:1800px"></iframe>
                    </div>
                    <div class="tab-pane fade" id="faas_tab" role="tabpanel" aria-labelledby="faas_tab" tabindex="0">                        
                        <div><button class="btn btn-primary" onclick="window.open('view_taxdec/preview_faas.php?id=<?php echo $id;?>', '_blank', 'menubar=no' ,width=800, height=600);"><i class="fa fa-print" aria-hidden="true"></i> Print Taxdec</button></div>
                        <iframe src="view_taxdec/preview_faas.php?id=<?php echo $id;?>" frameborder="0" width="100%" style="height:1800px"></iframe>
                    </div>
                    <div class="tab-pane fade show active" id="edit_tab" role="tabpanel" aria-labelledby="edit_tab" tabindex="0">
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <form id="edit_form">
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="propertyid" name="propertyid" placeholder="propertyid" value="<?php echo $id;?>" readonly>
                                            <label for="floatingInput">Property ID</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="clerkid" name="clerkid" placeholder="propertyid" readonly>
                                            <label for="floatingInput">Clerk ID</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="date_created" name="date_created" placeholder="date_created">
                                            <label for="floatingInput">Date Created</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="transaction_code" id="transaction_code" aria-label="Floating label select example" >
                                                <option value="" selected>NONE</option>
                                                <option value="SD">SD</option>
                                                <option value="TR">TR</option>
                                                <option value="DC">DC</option>
                                                <option value="DP">DP</option>
                                                <option value="CS">CS</option>
                                                <option value="PC">PC</option>
                                                <option value="DT">DT</option>
                                                <option value="RC">RC</option>
                                                <option value="GR">GR</option>
                                                <option value="SP">SP</option>                        
                                            </select>                              
                                            <label for="transaction_code">TRANSACTION CODE</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="status" id="status" aria-label="status" required>
                                                <option value=""><------------------SELECT------------------></option>
                                                <option value="PENDING ACTIVE">PENDING ACTIVE</option>
                                                <option value="PENDING CANCELLED">PENDING CANCELLED</option>
                                                <option value="ACTIVE">ACTIVE</option>
                                                <option value="CANCELLED">CANCELLED</option>
                                            </select>                                                     
                                            <label for="status">STATUS</label>                                    
                                            <div class="invalid-feedback">
                                                Please Input STATUS.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tdno" name="tdno" placeholder="tdno">
                                            <label for="floatingInput">Taxdec No.</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pin" name="pin" placeholder="pin">
                                            <label for="floatingInput">PIN</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="arp" name="arp" placeholder="arp">
                                            <label for="floatingInput">ARP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-9">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="ownername" name="ownername" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">Owner Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="ownertin" name="ownertin" placeholder="ownertin">
                                                <label for="floatingInput">TIN</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="tel" class="form-control" id="ownertel" name="ownertel" placeholder="ownertel">
                                                <label for="floatingInput">Tel</label>
                                            </div>
                                        </div>                                
                                    </div>                            
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="owneraddress" name="owneraddress" placeholder="owneraddress">
                                    <label for="floatingInput">Owner Address</label>
                                </div>                                

                                <div class="row mb-1">
                                    <div class="col-9">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="admin" name="admin" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">Admin Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="admintin" name="admintin" placeholder="admintin">
                                                <label for="floatingInput">TIN</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="tel" class="form-control" id="admintel" name="admintel" placeholder="admintel">
                                                <label for="floatingInput">Tel</label>
                                            </div>
                                        </div>                                
                                    </div>                            
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="adminaddress" name="adminaddress" placeholder="adminaddress">
                                    <label for="floatingInput">Admin Address</label>
                                </div>
                                <div class="row mb-1  g-1">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="sitio" name="sitio" placeholder="sitio">
                                            <label for="floatingInput">Sitio</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="barangay" name="barangay" placeholder="barangay">
                                            <label for="floatingInput">Barangay</label>
                                        </div>                               
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="municipality" name="municipality" placeholder="municipality" readonly>
                                            <label for="floatingInput">Municipality</label>
                                        </div>                               
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="province" name="province" placeholder="province" readonly>
                                            <label for="floatingInput">Province</label>
                                        </div>                               
                                    </div>                            
                                </div>
                                <div class="row mb-1  g-1">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="oct" name="oct" placeholder="oct">
                                            <label for="floatingInput">OCT/TCT/CLOA No.:</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="surveyno" name="surveyno" placeholder="surveyno">
                                            <label for="floatingTextarea">Survey No.:</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <div class="row mb-1  g-1">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="cct" name="cct" placeholder="oct">
                                            <label for="floatingInput">CCT:</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="lotno" name="lotno" placeholder="lotno">
                                            <label for="floatingTextarea">Lot No.:</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <div class="row mb-1  g-1">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="dated" name="dated" placeholder="dated">
                                            <label for="floatingInput">Dated:</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="blkno" name="blkno" placeholder="blkno">
                                            <label for="floatingTextarea">Blk No.:</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <h6 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;font-weight:bolder;color:red">BOUNDARIES</h6>
                                <div class="row mb-1 g-1">
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="north" name="north" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">North</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="south" name="south" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">South</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <div class="row mb-3 g-1">
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="east" name="east" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">East</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="west" name="west" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">West</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select form-control" name="propertykind" id="propertykind" aria-label="Floating label select example" >
                                        <option value="" selected>Select Here</option>
                                        <option value="LAND">LAND</option>
                                        <option value="BUILDING">BUILDING</option>
                                        <option value="MACHINERY">MACHINERY</option>                                                        
                                    </select>                              
                                    <label for="propertykind">Property Kind</label>
                                </div>
                                <div class="row mb-1 g-1">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="storey" name="storey" placeholder="storey">
                                            <label for="floatingInput">No of Storeys:</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="specify" name="specify" placeholder="specify">
                                            <label for="floatingTextarea">Specify:</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <div class="form-floating mb-1">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="description">
                                    <label for="floatingTextarea">Brief Description:</label>
                                </div>
                                <div class="row mb-1 g-1">
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="taxable" name="taxable" aria-label="Floating label select example" required>                                        
                                                <option value="YES">YES</option>
                                                <option value="NO">NO</option>
                                            </select>
                                            <label for="floatingSelect">Taxable</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <select class="form-select" id="exempt" name="exempt" aria-label="Floating label select example" readonly>
                                                <option value="YES">YES</option>
                                                <option value="NO" selected>NO</option>
                                            </select>
                                            <label for="floatingSelect">Exempt</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="dateapproved" name="dateapproved" placeholder="dateapproved">
                                            <label for="floatingTextarea">Date Approved:</label>
                                        </div>                               
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="month" class="form-control" id="effectivity" name="effectivity" placeholder="effectivity">
                                            <label for="floatingTextarea">Effectivity:</label>
                                        </div>                               
                                    </div>                                                      
                                </div>
                                <div class="row mb-1">
                                    <div class="col-9">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="prevowner" name="prevowner" style="height:150px;"></textarea>
                                            <label for="floatingTextarea">Previous Owner Name</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="prevtd" name="prevtd" placeholder="prevtd">
                                                <label for="floatingInput">Previous TDNO</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="tel" class="form-control" id="prevassval" name="prevassval" placeholder="prevassval">
                                                <label for="floatingInput">Previous Assessed Value</label>
                                            </div>
                                        </div>                                
                                    </div>                            
                                </div>
                                <div class="row mb-1 p-3">
                                    <label for="memoranda"><h6>Memoranda: </h6></label>
                                    <textarea id="memoranda" name="memoranda"></textarea> 
                                </div>
                                <div class="row mb-1 p-3">
                                    <label for="memoranda"><h6>Annotation: </h6></label>
                                    <textarea id="annotation" name="annotation"></textarea>       
                                </div> 
                                <hr class="horizontal-divider">
                                <div id="land_reference" style="display:none">
                                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">LAND REFERENCE (FOR BUILDING)</h3>                        
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="land_owner" id="land_owner" placeholder="land_owner" style="font-weight: bolder;"></textarea>
                                                <label for="floatingTextarea">OWNERNAME</label>
                                            </div>                                        
                                        </div>                                                                                       
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="land_oct" id="land_oct" placeholder="land_oct" style="font-weight: bolder;" >
                                                <label for="arp">OCT</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="land_surveyno" id="land_surveyno" placeholder="land_surveyno" style="font-weight: bolder;" >
                                                <label for="arp">SURVEY NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="land_lotno" id="land_lotno" placeholder="land_lotno" style="font-weight: bolder;" >
                                                <label for="arp">LOT NO</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="land_blkno" id="land_blkno" placeholder="land_blkno" style="font-weight: bolder;" >
                                                <label for="arp">BLK NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="land_tdno" id="land_tdno" placeholder="land_tdno" style="font-weight: bolder;" >
                                                <label for="arp">TDNO</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="land_area" id="land_area" placeholder="land_area" style="font-weight: bolder;" >
                                                <label for="arp">AREA</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">RECORD OF SUPERCEEDED ASSESSMENT</h3>                        
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="supercede_td" id="supercede_td" placeholder="name@example.com" style="font-weight: bolder;" >
                                            <label for="propertykind">PREVIOUS TD</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="supercede_arp" id="supercede_arp" placeholder="name@example.com" style="font-weight: bolder;" >
                                            <label for="arp">ARP</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="supercede_pin" id="supercede_pin" placeholder="name@example.com" style="font-weight: bolder;" >
                                            <label for="arp">PIN</label>
                                        </div>
                                    </div>                                                   
                                </div>    
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="supercede_effectivity" id="supercede_effectivity" placeholder="name@example.com" style="font-weight: bolder;" >
                                            <label for="tdno">PREVIOUS EFFECTIVITY</label>
                                        </div>                                    
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" name="supercede_date_created" id="supercede_date_created" placeholder="name@example.com" style="font-weight: bolder;" >
                                            <label for="tdno">PREVIOUS DATE CREATED</label>
                                        </div>
                                    </div>
                                </div>                        
                                <button type="submit" class="btn btn-success btn-sm btn-sqaured float-end"><i class="fa-solid fa-arrow-up-right-from-square"></i> Update Taxdec</button>                                
                            </form>                      
                        </div>
                        <!--------------------------BUILDING  DATA------------------------>
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="building_display">
                            <form id="form_general_description" class="was-validated">
                                <div class="card-body">
                                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">GENERAL DESCRIPTION</h3>                        
                                    <input type="hidden" id="status_gen_add" name="status_gen_add">
                                    <input type="hidden" id="gen_id" name="gen_id">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="structural_type" id="structural_type_general" placeholder="name@example.com" required>
                                                <label for="tdno">Structural Type:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="building_number" id="building_number_general" placeholder="name@example.com" required>
                                                <label for="tdno">Building Number No:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="issued_on" id="issued_on_general" placeholder="name@example.com" required>
                                                <label for="tdno">Issued On:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="cct" id="cct_general" placeholder="name@example.com" required>
                                                <label for="tdno">Condominum Certificate of Title:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="year_constructed" id="year_constructed_general" placeholder="name@example.com" required>
                                                <label for="tdno">Year Constructed:</label>
                                            </div>
                                        </div>                                
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="coc" id="coc_general" placeholder="name@example.com" required>
                                                <label for="tdno">Certificate of Completion Issued On:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="year_completed" id="year_completed_general" placeholder="name@example.com" required>
                                                <label for="tdno">Year Completed:</label>
                                            </div>
                                        </div>                                
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="coo" id="coo_general" placeholder="name@example.com" required>
                                                <label for="tdno">Certificate of Occupancy Issued On:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="year_occupied" id="year_occupied_general" placeholder="name@example.com" required>
                                                <label for="tdno">Year Occupied:</label>
                                            </div>
                                        </div>                                
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="storey" id="storey_general" placeholder="name@example.com" required>
                                                <label for="storey">No. of Storeys: </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="year_renovated" id="year_renovated_general" placeholder="name@example.com" required>
                                                <label for="tdno">Year Renovated:</label>
                                            </div>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="float-end p-3">
                                    <button class="btn btn-primary btn-sm btn-sqaured" id="button_gen_add"> <i class="fa fa-plus" aria-hidden="true"></i> Add General Description</button>
                                    <button class="btn btn-success btn-sm btn-sqaured" id="button_gen_edit"> <i class="fa fa-pencil" aria-hidden="true"></i>Edit General Description</button>
                                </div>                                
                            </form> 
                            <hr>
                            <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">STRUCTURAL CHECKLIST</h3>                        
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <h5 class="text-center">ROOFING</h5>
                                            <table id="roofing" class="table table-bordered table-stripped" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>FAAS ID</th>
                                                        <th width="70%">MATERIALS</th>
                                                        <th>ACTION</th>                                
                                                    </tr> 
                                                </thead>                                                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-5" id="general_description_add">
                                        <div class="card-body">
                                            <h5 class="text-center">FOUNDATION</h5>
                                            <table id="foundation" class="table table-bordered table-stripped" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>FAAS ID</th>
                                                        <th width="70%">MATERIALS</th>                                       
                                                        <th>ACTION</th>                                
                                                    </tr> 
                                                </thead>                                                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                                
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="card mb-5" id="general_description_add">
                                        <div class="card-body">
                                            <h5 class="text-center">FLOOR FINISH</h5>
                                            <table id="floor_finish" class="table table-bordered table-stripped" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>FAAS ID</th>
                                                        <th width="50%">MATERIALS</th>
                                                        <th>1F</th> 
                                                        <th>2F</th>
                                                        <th>3F</th>
                                                        <th>4F</th>
                                                        <th>ACTION</th>                                
                                                    </tr> 
                                                </thead>                                                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-5" id="general_description_add">
                                        <div class="card-body">
                                            <h5 class="text-center">WALLINGS</h5>
                                            <table id="wallings" class="table table-bordered table-stripped" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>FAAS ID</th>
                                                        <th width="50%">MATERIALS</th>
                                                        <th>1F</th> 
                                                        <th>2F</th>
                                                        <th>3F</th>
                                                        <th>4F</th>
                                                        <th>ACTION</th>                                
                                                    </tr> 
                                                </thead>                                                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5" id="general_description_add">
                                <div class="card-body">
                                    <h5 class="text-center">ADDITONAL ITEMS</h5>
                                    <table id="additional" class="table table-bordered table-stripped" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FAAS ID</th>
                                                <th width="50%">MATERIALS</th>
                                                <th>1F</th> 
                                                <th>2F</th>
                                                <th>3F</th>
                                                <th>4F</th>
                                                <th>ACTION</th>                                
                                            </tr> 
                                        </thead>                                                                               
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--------------------------BUILDING  DATA------------------------>


                        <!--------------------------MACHINERY DATA------------------------>
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="machinery_display">
                            <div class="card-body">
                                <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY APPRAISAL</h3>                                            
                                <table id="machinery_appraisal" class="table table-bordered table-responsive display" style="width:100%;border: .5px solid;font-size: 11px;">
                                    <thead style="font-weight:bolder;">              
                                        <tr>
                                            <th rowspan="2">ID</th>  
                                            <th rowspan="2">FAAS ID</th>  
                                            <th rowspan="2">PROPERTY ID</th>                        
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">KIND OF MACHINERY</th>                       
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">BRAND</th>
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">MODEL</th>
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">CAPACTIY HP</th>
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">DATE ACCQUIRED</th>
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">CONDITION WHEN ACCQUIRED</th>                 
                                            <th colspan="2" style="word-wrap: break-word;text-align: center;">ECONOMIC LIFE</th> 
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">YEAR INSTALLED</th>                         
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">YEAR OPERATION</th>                         
                                            <th rowspan="2" style="word-wrap: break-word;text-align: center;">ACTION</th>                    
                                        </tr>
                                        <tr>
                                            <th width="10%" style="word-wrap: break-word;text-align: center;">ESTIMATED</th>
                                            <th  width="10%" style="word-wrap: break-word;text-align: center;">REMAINING</th>
                                        </tr>
                                    </thead>
                                </table>

                                <table id="machinery_appraisal2" class="table table-bordered table-responsive display" style="width:100%;border: .5px solid;font-size: 11px;">
                                    <thead style="font-weight:bolder;">              
                                        <tr>
                                            <th rowspan="2">ID</th>  
                                            <th rowspan="2">FAAS ID</th>  
                                            <th rowspan="2">PROPERTY ID</th>                        
                                            <th rowspan="2" width="15%" style="word-wrap: break-word;text-align: center;">ORIGINAL COST</th>                       
                                            <th rowspan="2" width="15%" style="word-wrap: break-word;text-align: center;">CONVERSION FACTOR</th>
                                            <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">NO. OF UNITS</th>
                                            <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">RCN</th>
                                            <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">RATE OF DEPRECIATION</th>
                                            <th colspan="2" width="20%" style="word-wrap: break-word;text-align: center;">TOTAL DEPRECIATION</th> 
                                            <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">DEPRECIATED VALUE</th>                         
                                            <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">DATE CREATED</th>                         
                                            <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">ACTION</th>                    
                                        </tr>
                                        <tr>
                                            <th width="10%" style="word-wrap: break-word;text-align: center;">%</th>
                                            <th width="10%" style="word-wrap: break-word;text-align: center;">VALUE</th>
                                        </tr>        
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="8" style="text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>                                                        
                        </div>
                        <!--------------------------MACHINERY DATA------------------------>
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <h3 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ADDITIONAL CO - OWNERS</h3>
                            <table id="add_co" class="table table-striped table-bordered" style="border:solid 1px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PROPERTY ID</th>
                                        <th>CO - OWNER</th>
                                        <th>ADDRESS</th>
                                        <th>TIN</th>
                                        <th>TEL</th>
                                        <th width="10%">ACTIONS</th>
                                    </tr>
                                </thead>                                                                                                           
                            </table>         
                        </div>
                        <!-----------------PROPERTY CLASSIFICATION TABLE------------------>
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <table id="classification" class="table table-bordered table-stripped text-center" style="width:100%">
                                <h3 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">PROPERTY CLASSIFICATIONS</h3>
                                <tr style="font-size:14px;font-weight:bolder;font-family:Arial, Helvetica, sans-serif;" >
                                    <thead>
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ID</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Property ID</th>                            
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">TDNO</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Classification</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Sub Classification</th>                                                                      
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Area</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Area Mode</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Area</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Basic <br>Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Depreciation <br>Level</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Depreciation <br>Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Market Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Adjustment <br>Level</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Actual Use</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Assessed <br>Level</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Assessed <br>Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Action</th> 
                                    </thead>    
                                    <tbody class="text-center"></tbody>                                 
                                </tr>        
                            </table>     
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
