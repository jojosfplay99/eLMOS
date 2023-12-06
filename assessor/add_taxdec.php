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
    <script src="add_taxdec/additional.js?timestamp=<?php echo date('ymdhis')?>"></script>
    
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    <?php include 'navbar.php';?>

    <!------------CONTENT----------->
    <main class="container-fluid">
      <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">        
        <form id="add_form">
          <div class="row mb-1">             
              <div class="col">
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="clerkid" name="clerkid" placeholder="propertyid" readonly>
                      <label for="floatingInput">Clerk ID</label>
                  </div>
              </div>
              <div class="col">
                  <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="date_created" name="date_created" value="<?php echo date('Y-m-d')?>" placeholder="date_created">
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
                            <option value="">-------SELECT-------</option>
                            
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
            <br>
            <div id="land_reference">                                
                <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">LAND REFERENCE (FOR BUILDING)</h3>                        
                <div class="form-floating mb-3">
                    <select class="large-select2-options-single-field" id="select_land_reference" name="land_reference_propertyid" data-placeholder="Choose Taxdec" required>                        
                        
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="land_owner" id="land_owner" placeholder="land_owner" style="font-weight: bolder;height:200px;"></textarea>
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
                <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">RECORD OF SUPERCEEDED ASSESSMENT</h3>                        
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select class="large-select2-options-single-field" id="select_superceded" name="land_reference_propertyid" data-placeholder="Choose Taxdec" required>                        
                                
                            </select>
                        </div>
                    </div>
                </div>
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
                            <input type="month" class="form-control" name="supercede_effectivity" id="supercede_effectivity" placeholder="name@example.com" style="font-weight: bolder;" >
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
            </div>                                                

          <div class="row mb-1 p-3">
              <label for="memoranda"><h6>Memoranda: </h6></label>
              <textarea id="memoranda" name="memoranda"></textarea> 
          </div>
          <div class="row mb-1 p-3">
              <label for="memoranda"><h6>Annotation: </h6></label>
              <textarea id="annotation" name="annotation"></textarea>       
          </div> 
          <button class="btn btn-success btn-sm btn-sqaured float-end"><i class="fa-solid fa-arrow-up-right-from-square"></i> Edit Taxdec</button>                                
        </form>                                                                       
      </section>
    </main>

    <!------------CONTENT----------->
    </body>
</html>
