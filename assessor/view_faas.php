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
    <script src="view_faas/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <script src="view_faas/additional_script.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <script src="view_faas/datatable.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <script src="view_faas/submit.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <!-- Custom styles for this template -->
  </head>
  <body>     
    <?php include 'navbar.php'?>
    <?php $id = $_POST['next_id'];?>
    <!------------CONTENT----------->
        <section class="mb-3">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" data-bs-target="#preview_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fas fa-eye"></i> Preview Taxdec</button>
                </li>
                <li class="nav-item" role="presentation">                    
                    <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" data-bs-target="#edit_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-edit"></i> Edit Taxdec</button>
                </li>                                
            </ul>
        </section>
        <section class="container-fluid">            
            <div class="card-body">
                <div class="tab-content card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="myTabContent">
                    <div class="tab-pane fade " id="preview_tab" role="tabpanel" aria-labelledby="preview_tab" tabindex="0">                        
                        <div><button class="btn btn-primary" onclick="window.open('view_taxdec/preview_taxdec.php?id=<?php echo $id;?>', '_blank', 'menubar=no' ,width=800, height=600);"><i class="fa fa-print" aria-hidden="true"></i> Print Taxdec</button></div>
                        <!---<iframe src="view_taxdec/preview_taxdec.php?id=<?php echo $id;?>" frameborder="0" width="100%" style="height:1800px"></iframe>--->
                    </div>
                    <div class="tab-pane fade show active" id="edit_tab" role="tabpanel" aria-labelledby="edit_tab" tabindex="0">                        
                        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                            <div class="card-body">  
                                <form id="edit_new_faas">  
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="faasid" id="faasid" placeholder="faasid" style="font-weight: bolder;" value="<?php echo $id;?>" readonly>
                                                <label for="arp">FAAS ID</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="propertyid" id="propertyid" placeholder="propertyid" style="font-weight: bolder;" readonly>
                                                <label for="arp">PROPERTY ID</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="transaction_code" id="transaction_code" aria-label="Floating label select example" style="font-weight: bolder;">
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
                                                <select class="form-select" name="status" id="status" aria-label="status" required style="font-weight: bolder;">
                                                    <option value="">-------SELECT-------</option>                                                    
                                                    <option value="PENDING ACTIVE">PENDING ACTIVE</option>
                                                    <option value="PENDING CANCELLED">PENDING CANCELLED</option>
                                                    <option value="ACTIVE">ACTIVE</option>
                                                    <option value="CANCELLED">CANCELLED</option>
                                                </select>                                                     
                                                <label for="status">STATUS</label>                                                                                
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" name="date_created" id="date_created" placeholder="faasid" style="font-weight: bolder;" readonly>
                                                <label for="arp">DATE CREATED</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="pin" id="pin" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">PIN</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="tdno" id="tdno" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="tdno">TDNO</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="arp" id="arp" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">ARP</label>
                                            </div>
                                        </div>                                                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="oct" id="oct" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">OCT/TCT/CLOA NO.</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="surveyno" id="surveyno" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">SURVEY NO</label>
                                            </div>
                                        </div>                
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dated" id="dated" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">DATED</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="lotno" id="lotno" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">LOT NO</label>
                                            </div>
                                        </div>                
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="blkno" id="blkno" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">BLK</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="cad_lotno" id="cad_lotno" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">CAD LOT NO</label>
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
                                    <hr class="horizontal-divider">
                                    <code><p>PROPERTY LOCATION</p></code>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="sitio" id="sitio" placeholder="name@example.com" style="font-weight: bolder;text-transform: uppercase;" >
                                                <label for="sitio">SITIO / NO. STREET</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="barangay" id="barangay" placeholder="name@example.com" style="font-weight: bolder;text-transform: uppercase;" >
                                                <label for="barangay">BARANGAY</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="municipality" id="municipality" placeholder="name@example.com" style="font-weight: bolder;text-transform: uppercase;" >
                                                <label for="municipality">MUNICIPALITY</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="province" id="province" placeholder="name@example.com" style="font-weight: bolder;text-transform: uppercase;" >
                                                <label for="province">PROVINCE</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <textarea type="text" class="form-control" name="north" id="north" placeholder="name@example.com" style="height:100px;font-weight: bolder;" ></textarea>
                                                <label for="north">NORTH</label>
                                            </div>                          
                                            <div class="form-floating mb-3">
                                                <textarea type="text" class="form-control" name="south" id="south" placeholder="name@example.com" style="height:100px;font-weight: bolder;" ></textarea>
                                                <label for="south">SOUTH</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea type="text" class="form-control" name="east" id="east" placeholder="name@example.com" style="height:100px;font-weight: bolder;" ></textarea>
                                                <label for="east">EAST</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea type="text" class="form-control" name="west" id="west" placeholder="name@example.com" style="height:100px;font-weight: bolder;" ></textarea>
                                                <label for="west">WEST</label>
                                            </div>                  
                                        </div>                                      
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="propertykind" name="propertykind" aria-label="Floating label select example" required>
                                            <option value="" selected disabled>Open this select menu</option>
                                            <option value="LAND">LAND</option>
                                            <option value="BUILDING">BUILDING</option>
                                            <option value="MACHINERY">MACHINERY</option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                    <div class="row mb-3">                
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="month" class="form-control" name="effectivity" id="effectivity" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">EFFECTIVITY</label>
                                            </div>
                                        </div>                                
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="taxable" name="taxable" aria-label="Floating label select example" required>
                                                    <option value="" selected disabled>Open this select menu</option>
                                                    <option value="YES">YES</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                                <label for="floatingSelect">Taxable</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="exempt" name="exempt" aria-label="Floating label select example" required>
                                                    <option value="" selected disabled>Open this select menu</option>
                                                    <option value="YES">YES</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                                <label for="floatingSelect">Exempt</label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="d-flex flex-column">
                                                <label for="memoranda">Memoranda</label>
                                                <textarea id="memoranda" name="memoranda"></textarea> 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col">
                                            <div class="d-flex flex-column">
                                                <label for="annotation">Annotation</label>
                                                <textarea id="annotation" name="annotation"></textarea> 
                                            </div>                                                  
                                        </div>                                                                    
                                    </div>
                                    <hr class="horizontal-divider">
                                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">RECORD OF SUPERCEEDED ASSESSMENT</h3>                        
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="prevtd" id="prevtd" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="propertykind">PREVIOUS TD</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="prevarp" id="prevarp" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">ARP</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="prevpin" id="prevpin" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="arp">PIN</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="month" class="form-control" name="preveffectivity" id="preveffectivity" placeholder="name@example.com" style="font-weight: bolder;" >
                                                <label for="tdno">PREVIOUS EFFECTIVITY</label>
                                            </div>
                                        </div>               
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-floating">
                                                <textarea type="text" class="form-control" name="prevownername" id="prevownername" placeholder="name@example.com" style="height:150px;font-weight: bolder;" ></textarea>
                                                <label for="owner">PREVIOUS OWNERNAME</label>
                                            </div>
                                        </div>                          
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="prevassval" id="prevassval" placeholder="name@example.com" style="font-weight: bolder;" >
                                        <label for="status">PREVIOUS ASSESSED VALUE</label>
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa-solid fa-arrow-up-right-from-square"></i> Update FAAS Info</button>
                                        </div>                            
                                    </div>
                                </form>
                                
                                
                            </div>
                        </div>                                                                                    
                                             
                            
                        
                        
                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="land_class_table">
                            <table id="land_classifications" class="table table-bordered table-stripped text-center" style="width:100%">
                                <tr class="text-center" style="font-size:12px;font-weight:bolder;font-family:Arial, Helvetica, sans-serif;" >
                                    <thead>
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ID</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Property ID</th>                            
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">TDNO</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Classification</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Sub Classification</th>                                                                      
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Area</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Area Mode</th> 
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Area/Sqm</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Basic Value</th>  
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Depreciation Level</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Depreciation Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Base Market Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Adjustment Level</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Market Value</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Actual Use</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Assessed <br>Level</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Assessed <br>Value</th>
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Status</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Clerk ID</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Faas ID</th>   
                                        <th class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Action</th> 
                                    </thead>                                      
                                </tr>                                        
                            </table> 
                        </div>

                        <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="structural_checklist">
                            <div class="card-body">                    
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
                                <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="building_property_classification">
                                    <div class="card-body">
                                        <h3 class="mb-5" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY CLASSIFICATIONS</h3>                        
                                        <table id="property_classification3" class="text-center table table-hover table-bordered table-responsive display" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                                            <tr>
                                                <thead>
                                                    <th class="text-center">ID</th>
                                                    <th class="text-center">PROPERTYID</th>
                                                    <th class="text-center">TDNO</th>
                                                    <th class="text-center">CLASSIFICATION</th>
                                                    <th class="text-center">SUB-CLASSIFICATION</th>
                                                    <th class="text-center">AREA</th>
                                                    <th class="text-center">MODE</th>
                                                    <th class="text-center">AREA SQM</th>
                                                    <th class="text-center">UNIT VALUE</th>
                                                    <th class="text-center">FLOOR / ITEM</th>
                                                    <th class="text-center">DEPRECIATION<br>LEVEL</th>
                                                    <th class="text-center">DEPRECIATION<br>VALUE</th>
                                                    <th class="text-center">BASE MARKET VALUE</th>
                                                    <th class="text-center">ADJUSTMENT<br>LEVEL</th>  
                                                    <th class="text-center">MARKET VALUE</th>                                                                                       
                                                    <th class="text-center">ACTUAL USE</th>                   
                                                    <th class="text-center">ASSESSED<br>LEVEL</th>                     
                                                    <th class="text-center">ASSESSED VALUE</th>                     
                                                    <th class="text-center">STATUS</th>                     
                                                    <th class="text-center">CLERKID</th>                   
                                                    <th class="text-center">ACTION</th>                   
                                                </thead> 
                                            </tr>                                                                                                                                    
                                        </table>
                                        
                                    </div>                                                        
                                </div>               
                            </div>                                                        
                        </div>  
                    <!---TAB END--->
                    </div>    
                    
                </div>                                
            </div>
        </section>
        
    <!------------CONTENT----------->
    <?php include 'view_faas/modal.php'?>
    </body>
</html>
