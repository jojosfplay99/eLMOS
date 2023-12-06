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
    
    <script>document.write("<link type='text/javascript' src='taxdec/taxdec.css?v=" + Date.now() + "'><\/link>");</script>  
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/select2/js/select2.full.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>    
    <script src="../dist/tinymce/tinymce.min.js"></script>
    <script src="add_faas/additional.js?timestamp=<?php echo date('ymdhis')?>"></script>
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    <?php include 'navbar.php';?>

    <!------------CONTENT----------->
    <main class="container-fluid">
      <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      <section>
    <div class="mb-3"></div>
    <div class="container-fluid">
      <form id="add_new_faas">  
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
          <div class="card-body">
            <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">ADD PROPERTY INFORMATION</h3>                        
            <div class="form-floating mb-3">
                <select class="js-example-basic-single form-control form-select-lg" id="select_propertyid" name="select_propertyid" required placeholder="Select Property From Taxdec"></select>
            </div>
            <div class="form-floating mb-3">
              <input type="hidden" class="form-control" name="clerkid" id="clerkid" placeholder="name@example.com" style="font-weight: bolder;" >              
              <input type="hidden" class="form-control" name="date_generated" id="date_generated" placeholder="name@example.com" style="font-weight: bolder;" >              
              <input type="hidden" class="form-control" name="transaction_code" id="transaction_code" placeholder="name@example.com" style="font-weight: bolder;" >              
            </div>
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="arp" id="arp" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="arp">ARP</label>
                </div>
              </div>
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
                  <input type="text" class="form-control" name="status" id="status" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="status">STATUS</label>
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
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <textarea type="text" class="form-control" name="ownername" id="ownername" placeholder="name@example.com" style="height:100px;font-weight: bolder;" ></textarea>
                  <label for="owner">OWNERNAME</label>
                </div>
              </div>                          
            </div>
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="owneraddress" id="owneraddress" placeholder="name@example.com" style="font-weight: bolder;text-transform: uppercase;" >
                  <label for="owneraddress">ADDRESS</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="ownertel" id="ownertel" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="ownertel">TEL</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="ownertin" id="ownertin" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="ownertin">TIN</label>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <textarea type="text" class="form-control" name="admin" id="admin" placeholder="name@example.com" style="height:100px;font-weight: bolder;text-transform: uppercase;" ></textarea>
                  <label for="admin">ADMIN / BENIFICIAL USER</label>
                </div>
              </div>                          
            </div>
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="adminaddress" id="adminaddress" placeholder="name@example.com" style="font-weight: bolder;text-transform: uppercase;" >
                  <label for="adminaddress">ADDRESS</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="admintel" id="admintel" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="admintel">TEL</label>
                </div>
              </div>
              <div class="col-2">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="admintin" id="admintin" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="admintin">TIN</label>
                </div>
              </div>              
            </div>
            <hr>
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
            <div class="row">
              <div class="col">
                <div class="d-flex flex-column">
                  <label for="annotation">Annotation</label>
                  <textarea id="annotation" name="annotation"></textarea> 
                </div>                                                  
              </div>                                                                    
            </div>
          </div>
        </div>                                                   
            
            
        <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
          <div class="card-body">
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
                  <input type="text" class="form-control" name="prevarp" id="arp" placeholder="name@example.com" style="font-weight: bolder;" >
                  <label for="arp">ARP</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="prevpin" id="pin" placeholder="name@example.com" style="font-weight: bolder;" >
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
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <textarea type="text" class="form-control" name="prevownername" id="prevownername" placeholder="name@example.com" style="height:150px;font-weight: bolder;" ></textarea>
                  <label for="owner">PREVIOUS OWNERNAME</label>
                </div>
              </div>                          
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="prevassval" id="prevassval" placeholder="name@example.com" style="font-weight: bolder;" >
              <label for="status">PREVIOUS ASSESSED VALUE</label>
            </div> 
          </div>
        </div>                       
          
        <form>
          <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="land_reference_div" style="width:100%;">
            <div class="card-body">
              <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">LAND REFERENCE</h3>                        
              <div class="form-floating mb-3">
                <select class="js-example-basic-single form-control form-select-lg" id="select_building1" name="select_building1"></select>
              </div>
              <div class="form-floating mb-3">
                <textarea type="text" class="form-control" name="land_ownername" id="land_ownername" placeholder="name@example.com" style="font-weight: bolder;height:200px;" ></textarea>
                <label for="tdno">Ownername</label>
              </div>                            
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="land_tdno" id="land_tdno" placeholder="name@example.com" style="font-weight: bolder;" >
                    <label for="tdno">TDNO</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="land_area" id="land_per_sqm" placeholder="name@example.com" style="font-weight: bolder;" >
                    <label for="tdno">AREA (SQM)</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="land_oct" id="land_oct" placeholder="name@example.com" style="font-weight: bolder;" >
                    <label for="land_oct">OCT</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="land_surveyno" id="land_surveyno" placeholder="name@example.com" style="font-weight: bolder;" >
                    <label for="land_surveyno">SURVEY NO</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="land_blkno" id="land_blkno" placeholder="name@example.com" style="font-weight: bolder;" >
                    <label for="land_lotno">BLK NO</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="land_lotno" id="land_lotno" placeholder="name@example.com" style="font-weight: bolder;" >
                    <label for="land_lotno">LOT NO</label>
                  </div>
                </div>
              </div>                    
            </div>
          </div> 
          <button type="submit" class="btn btn-primary float-center"><i class="fa-solid fa-arrow-up-right-from-square"></i> Submit New FAAS</button>
        </form>                
      </div>

          

      </section>
    </main>

    <!------------CONTENT----------->
    </body>
</html>
