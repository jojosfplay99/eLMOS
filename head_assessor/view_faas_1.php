<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php 
            include 'header.php';        
            $id = $_POST['next_id']; 
            $date_today = date('m/d/Y');        
        ?>        
        <style><?php include 'view_faas/style.css'?></style>        
    </head>
<body>     
      
<?php require 'navbar.php'?> 
<section>
    <div class="mb-3"></div>
    <div class="container-fluid">
        <form id="add_new_faas">  
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body">
                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">View FAAS</h3>                                           
                    <div class="form-floating mb-3">
                        <input type="hidden" class="form-control" name="clerkid" id="clerkid" placeholder="name@example.com" style="font-weight: bolder;" >              
                        <input type="hidden" class="form-control" name="date_generated" id="date_generated" placeholder="name@example.com" style="font-weight: bolder;" >              
                        <input type="hidden" class="form-control" name="transaction_code" id="transaction_code" placeholder="name@example.com" style="font-weight: bolder;" >              
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="id" id="id" placeholder="name@example.com" style="font-weight: bolder;" value="<?php echo $id;?>" readonly>
                                <label for="arp">ID</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="propertyid" id="propertyid" placeholder="name@example.com" style="font-weight: bolder;" value="<?php echo $id;?>" readonly>
                                <label for="arp">PROPERTY ID</label>
                            </div>
                        </div>                        
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
                                <p style="font-size:20px;">MEMORANDA</p>
                            </div>
                            <div class="d-flex flex-column">
                                <textarea id="memoranda" name="memoranda"></textarea> 
                            </div>                                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column">
                                <p style="font-size:20px;">ANNOTATION</p>
                            </div>
                            <div class="d-flex flex-column">
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
                    


            <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="land_reference_div"  style="display:none">
                <div class="card-body">
                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">LAND REFERENCE</h3>                        
                    <div class="form-floating mb-3">
                        <select class="js-example-basic-single form-control form-select-lg" id="select_building1" name="select_building1"></select>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                        <textarea type="text" class="form-control" name="land_ownername" id="land_ownername" placeholder="name@example.com" style="font-weight: bolder;height:200px;" ></textarea>
                        <label for="tdno">Ownername</label>
                        </div>
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
        </form>
    </div>
</section>

<section style="display:block">
    <div class="container-fluid">
        <form id="submit_add_building_data">
            <!--<div id="additional_land" style="display:hidden">-->
            <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="general_description_add">
                <div class="card-body">
                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">GENERAL DESCRIPTION</h3>                        
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="structural_type" id="structural_type" placeholder="name@example.com">
                                <label for="tdno">Structural Type:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="building_number" id="building_number" placeholder="name@example.com">
                                <label for="tdno">Building Number No:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="issued_on" id="buiissued_onlding_number" placeholder="name@example.com">
                                <label for="tdno">Issued On:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="cct" id="cct" placeholder="name@example.com">
                                <label for="tdno">Condominum Certificate of Title:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="year_constructed" id="year_constructed" placeholder="name@example.com">
                                <label for="tdno">Year Constructed:</label>
                            </div>
                        </div>                                
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="coc" id="coc" placeholder="name@example.com">
                                <label for="tdno">Certificate of Completion Issued On:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="year_completed" id="year_completed" placeholder="name@example.com">
                                <label for="tdno">Year Completed:</label>
                            </div>
                        </div>                                
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="coo" id="coo" placeholder="name@example.com">
                                <label for="tdno">Certificate of Occupancy Issued On:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="year_occupied" id="year_occupied" placeholder="name@example.com">
                                <label for="tdno">Year Occupied:</label>
                            </div>
                        </div>                                
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="storey" id="storey" placeholder="name@example.com">
                                <label for="tdno">No. of Storeys: </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="year_renovated" id="year_renovated" placeholder="name@example.com">
                                <label for="tdno">Year Renovated:</label>
                            </div>
                        </div>                                
                    </div>
                </div>                                                        
            </div>                                                                              
        </form>
    </div>
</section>

<section style="display:block">
    <div class="container-fluid">
        <form id="submit_add_building_data">
            <!--<div id="additional_land" style="display:hidden">-->
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
                    

                    
                    
                    

                    
                    
                </div>                                                        
            </div>                                                                              
        </form>
    </div>
</section>

<section style="display:block">
    <div class="container-fluid">
        <form id="submit_add_building_data">
            <!--<div id="additional_land" style="display:hidden">-->
            <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="building_property_classification">
                <div class="card-body">
                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY CLASSIFICATIONS</h3>                        
                    <table id="property_classification3" class="table table-hover table-bordered table-responsive display" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PROPERTYID</th>
                                <th>TDNO</th>
                                <th>CLASSIFICATION</th>
                                <th>SUB-CLASSIFICATION</th>
                                <th>AREA</th>
                                <th>MODE</th>
                                <th>AREA SQM</th>
                                <th>UNIT VALUE</th>
                                <th>FLOOR / ITEM</th>
                                <th>DEPRECIATION LEVEL</th>
                                <th>DEPRECIATION VALUE</th>
                                <th>BASE MARKET VALUE</th>
                                <th>ADJUSTMENT LEVEL</th>  
                                <th>MARKET VALUE</th>                                                                                       
                                <th>ACTUAL USE</th>                   
                                <th>ASSESSED LEVEL</th>                     
                                <th>ASSESSED VALUE</th>                     
                                <th>STATUS</th>                     
                                <th>CLERKID</th>                   
                            </tr>
                        </thead>                                               
                        <tbody class="text-center"></tbody>
                    </table>
                    <hr class="horizontal divider">
                    <table id="property_classification4" class="table table-hover table-bordered table-responsive display" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PROPERTYID</th>
                                <th>TDNO</th>
                                <th>CLASSIFICATION</th>
                                <th>SUB-CLASSIFICATION</th>
                                <th>AREA</th>
                                <th>MODE</th>
                                <th>AREA SQM</th>
                                <th>UNIT VALUE</th>
                                <th>FLOOR / ITEM</th>
                                <th>DEPRECIATION LEVEL</th>
                                <th>DEPRECIATION VALUE</th>
                                <th>BASE MARKET VALUE</th>
                                <th>ADJUSTMENT LEVEL</th>  
                                <th>MARKET VALUE</th>                                                                                       
                                <th>ACTUAL USE</th>                   
                                <th>ASSESSED LEVEL</th>                     
                                <th>ASSESSED VALUE</th>                     
                                <th>STATUS</th>                     
                                <th>CLERKID</th>                       
                            </tr> 
                        </thead>                                               
                        <tbody class="text-center"></tbody>
                    </table>
                </div>                                                        
            </div>                                                                              
        </form>
    </div>
</section>

<section id="machinery_appraisal_block" style="display:block">
    <div class="container-fluid">
        <form id="submit_add_building_data">
            <!--<div id="additional_land" style="display:hidden">-->
            <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
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
        </form>
    </div>
</section>

<section>
    <div class="container-fluid">
        <form id="submit_add_building_data">
            <!--<div id="additional_land" style="display:hidden">-->
            <div class="card mb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" id="land_property_classification">
                <div class="card-body">
                    <h3 class="mb-5" style="text-align: center;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY CLASSIFICATIONS</h3>                        
                    <table id="property_classification1" class="table table-hover table-bordered table-responsive display" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PROPERTYID</th>
                                <th>TDNO</th>
                                <th>CLASSIFICATION</th>
                                <th>SUB-CLASSIFICATION</th>
                                <th>AREA</th>
                                <th>MODE</th>
                                <th>AREA SQM</th>
                                <th>UNIT VALUE</th>
                                <th>DEPRECIATION LEVEL</th>
                                <th>DEPRECIATION VALUE</th>
                                <th>BASE MARKET VALUE</th>
                                <th>ADJUSTMENT LEVEL</th>  
                                <th>MARKET VALUE</th>                                                                                       
                                <th>ACTUAL USE</th>                   
                                <th>ASSESSED LEVEL</th>                     
                                <th>ASSESSED VALUE</th>                     
                                <th>STATUS</th>                     
                                <th>CLERKID</th>                     
                            </tr> 
                        </thead>                                               
                        <tbody class="text-center"></tbody>
                    </table>
                    <hr class="horizontal divider">
                    <table id="property_classification2" class="table table-hover table-bordered table-responsive display" style="font-size:14px;width:100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PROPERTYID</th>
                                <th>TDNO</th>
                                <th>CLASSIFICATION</th>
                                <th>SUB-CLASSIFICATION</th>
                                <th>AREA</th>
                                <th>MODE</th>
                                <th>AREA SQM</th>
                                <th>UNIT VALUE</th>
                                <th>DEPRECIATION LEVEL</th>
                                <th>DEPRECIATION VALUE</th>
                                <th>BASE MARKET VALUE</th>
                                <th>ADJUSTMENT LEVEL</th>  
                                <th>MARKET VALUE</th>                                                                                       
                                <th>ACTUAL USE</th>                   
                                <th>ASSESSED LEVEL</th>                     
                                <th>ASSESSED VALUE</th>                     
                                <th>STATUS</th>                     
                                <th>CLERKID</th>                      
                            </tr> 
                        </thead>                                               
                        <tbody class="text-center"></tbody>
                    </table>
                </div>                                                        
            </div>                                                                              
        </form>
    </div>
</section>

<br>
           
</body>
<?php include 'view_faas/modal.php'?>
<?php include 'view_faas/script.php'?>
</html>