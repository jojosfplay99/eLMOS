<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $id = $_GET['id'];
    ?>
    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../../dist/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../../dist/fontawesome/css/all.css">  
    <link rel="stylesheet" href="../../dist/datatables/datatables.min.css">  
    <link rel="stylesheet" href="../../dist/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../dist/select2/css/select2-bootstrap-5-theme.min.css">
    
    <script src="../../dist/js/jquery.min.js"></script>
    <script src="../../dist/js/js.cookie.min.js"></script>
    <script src="../../dist/js/jquery.redirect.js"></script>
    <script src="../../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/sweetalert2.all.min.js"></script>
    <script src="../../dist/select2/js/select2.full.min.js"></script>
    <script src="../../dist/fontawesome/js/all.js"></script>
    <script src="../../dist/datatables/datatables.min.js"></script>    
    <script src="../../dist/tinymce/tinymce.min.js"></script>
    <script src="../../dist/js/jquery.number.min.js"></script>
    <script src="data_ajax3.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <style>
        .classifications{
            word-break: break-all;
            text-align: center;
            font-family:'Times New Roman', Times, serif;
            font-weight: bolder;
        }
        
    </style>
</head>
<body>
    <div class="mx-auto" id="container" style="width: 100%;height:3500px;">
        <input type="text" name="next_id" id="next_id" value="<?php echo $id?>" hidden>                
        <table class="table table-responsive table-bordered border-light" style="width: 100%;">
            <tr style="width: 100%;">
                <th><img class="float-end" id="municipality_logo" alt="" height="100" weight="100"></th>
                <th class="text-center" style="width:40%;line-height:20px;">
                    <div class="flex">
                        <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:light;">REPUBLIC OF THE PHILIPPINES</div>              
                        <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:light;">PROVINCE OF CEBU</div>              
                        <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:bolder;">MUNICIPALITY OF <span id="municipality_title"></span></div>              
                        <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:bolder;">OFFICE OF THE MUNICIPAL ASSESOR</div>
                    </div>                      
                </th>
                <th><img id="province_logo" alt="" height="100" weight="100"></th>
            </tr>        
        </table>

        <table class="table table-responsive table-stripped table-bordered border-light" style="width:100%;">
            <tr style="width: 100%;border:solid 1px;">
                <th style="width:40%;">ARP: <span id="arp"></span></th>
                <th style="width:40%;">PIN: <span id="pin"></span></th>
                <th style="width:20%;">STATUS: <span id="status"></span></th>
            </tr>        
        </table>
        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 60%;" rowspan="2">
                    <div >Owner's Name: <span id="ownername" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                
                <td style="width: 20%;height:25px;">
                    <div >TIN: <span id="ownertin" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                                
            </tr>            
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 20%;height:25px;">
                    <div >TEL: <span id="ownertel" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>
            </tr>
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">                               
                <td colspan="2" style="height:50px;">
                    <div >Admin's Address: <span id="adminaddress" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                                
            </tr>   
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 60%;" rowspan="2">
                    <div >Administrator: <span id="admin" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                
                <td style="width: 20%;height:25px;">
                    <div >TIN: <span id="admintin" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                                
            </tr>            
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 20%;height:25px;">
                    <div >TEL: <span id="admintel" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>
            </tr>
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">                               
                <td colspan="2" style="height:50px;">
                    <div >Admin's Address: <span id="adminaddress" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                                
            </tr>        
        </table>
        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 50%;height:50px;">
                    <div >OCT/TCT/Cloa No.: <span id="oct" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>   
                <td style="width: 50%;height:50px;">
                    <div >Survey No.: <span id="surveyno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                              
            </tr>
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 50%;height:50px;">
                    <div >Dated: <span id="dated" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>   
                <td style="width: 50%;height:50px;">
                    <div >Lot No.: <span id="lotno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                              
            </tr>   
            <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 50%;height:50px;">
                    <div >Blk No.: <span id="blkno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>   
                <td style="width: 50%;height:50px;">
                    <div >CAD Lot No.: <span id="surveyno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                              
            </tr>
        </table>        
        <div class="row g-1">
            <div class="col-6">
                <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif" id="location_header">&nbsp;</h5>
                <table class="table table-responsive table-bordered border-light" style="padding:10px;height:100%">
                    <tr>
                        <td style="width: 100%;height:50px;border:solid 1px;">
                            <div >Sitio: <span id="sitio_faas" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td>    
                    </tr>
                    <tr>
                        <td style="width: 100%;height:50px;border:solid 1px;">
                            <div >Barangay: <span id="barangay_faas" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                    </tr>
                    <tr>
                        <td style="width: 100%;height:50px;border:solid 1px;">
                            <div >Municipality: <span id="municipality_faas" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td>  
                    </tr>
                    <tr>
                        <td style="width: 100%;height:50px;border:solid 1px;">
                            <div >Province: <span id="province_faas" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td>  
                    </tr>                     
                </table>               
            </div>
            <div class="col-6" id="land_reference" >
                <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">LAND REFERRENCE</h5>
                <table class="table table-responsive table-bordered border-light" style="padding:10px;height:100%">
                    <tr>
                        <td colspan="2" style="width: 100%;border:solid 1px;">
                            <div >Owner: <span id="land_owner" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td>    
                    </tr>
                    <tr>
                        <td style="height:50px;border:solid 1px;">
                            <div>OCT/TCT/Cloa No: <span id="land_oct" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                        <td style="height:50px;border:solid 1px;">
                            <div >Survey No: <span id="land_surveyno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                    </tr>
                    <tr>
                        <td style="height:50px;border:solid 1px;">
                            <div>Lot No: <span id="land_lotno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                        <td style="height:50px;border:solid 1px;">
                            <div >Blk No: <span id="land_blkno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                    </tr>
                    <tr>
                        <td style="height:50px;border:solid 1px;">
                            <div>TDNO: <span id="land_tdno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                        <td style="height:50px;border:solid 1px;">
                            <div >Area (sqm): <span id="land_area" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                        </td> 
                    </tr>                                        
                </table>
            </div>
        </div>
        <br><br>
        <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">BOUNDARIES</h5>
        <table class="table table-responsive table-bordered border-light" style="padding:10px;border:solid 1px;">
            <tr style="line-height:15px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 50%;height:50px;border:solid 1px;">
                    <div >North: <span id="north" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>   
                <td style="width: 50%;height:50px;border:solid 1px;">
                    <div >South: <span id="south" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                              
            </tr>
            <tr style="line-height:15px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <td style="width: 50%;height:50px;border:solid 1px;">
                    <div >East: <span id="east" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>   
                <td style="width: 50%;height:50px;border:solid 1px;">
                    <div >West: <span id="west" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                </td>                              
            </tr>              
        </table>
        <section id="land_section" style="display:none;">
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY ASSESSMENT</h5>
            <table id="property_appraisal_land" class="text-center table table-bordered mb-3" style="border:solid 1px;font-size:12px;">
                <tr>
                    <th width="30%">Classification</th>
                    <th width="30%">Sub Classification</th>                                   
                    <th width="20%">Area</th>                                 
                    <th width="20%">Base Market <br>Value</th>
                </tr>
            </table> 
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">VALUE ADJUSTMENT</h5>
            <table id="property_appraisal_land2" class="text-center table table-bordered mb-3" style="border:solid 1px;font-size:12px;">
                <tr>
                    <th width="15%">Base Market <br>Value</th>
                    <th width="40%">Adjustment Factor</th>                                   
                    <th width="15%">Adjustment Level</th>                                 
                    <th width="15%">Adjustment Value</th>                                 
                    <th width="15%">Adjusted Market <br>Value</th>
                </tr>
            </table>   
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY ASSESSMENT</h5>
            <table id="property_appraisal_land3" class="text-center table table-bordered" style="border:solid 1px;font-size:12px;">
                <tr>
                    <th>Market Value</th>
                    <th>Actual Use</th>                                   
                    <th>Assessment <br>Level</th>
                    <th>Assessed  <br>Value</th>                    
                </tr>
            </table>
        </section>

        <section id="building_section" style="display:none;">
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">GENERAL DESCRIPTION</h5>
            <table class="table table-responsive table-bordered border-light" style="padding:10px;border:solid 1px;">
                <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <td style="width: 35%;height:50px;border:solid 1px;">
                        <div >Structural Type: <span id="structural_type" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="width: 35%;height:50px;border:solid 1px;">
                        <div >Building Permit No: <span id="building_permit" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td> 
                    <td style="width: 30%;height:50px;border:solid 1px;">
                        <div >Issued On: <span id="issued_on" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                              
                </tr>
                <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <td colspan="2" style="height:50px;border:solid 1px;">
                        <div >Condominium Certificate of Title: <span id="cct_add" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="height:50px;border:solid 1px;">
                        <div >Year Constructed: <span id="date_constructed" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                              
                </tr>
                <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <td colspan="2" style="height:50px;border:solid 1px;">
                        <div >Certificate of Completion Issued On: <span id="coc_add" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="height:50px;border:solid 1px;">
                        <div >Year Completed: <span id="date_completed" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                              
                </tr>
                <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <td colspan="2" style="height:50px;border:solid 1px;">
                        <div >Certificate of Occupancy Issued On: <span id="coo_add" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="height:50px;border:solid 1px;">
                        <div >Year Occupied: <span id="date_occupied" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                              
                </tr> 
                <tr style="line-height:5px;border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <td colspan="2" style="height:50px;border:solid 1px;">
                        <div >No of Storeys: <span id="no_of_storeys" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="height:50px;border:solid 1px;">
                        <div >Year Renovated: <span id="date_renovated" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                              
                </tr>              
            </table>
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">STRUCTURAL MATERIALS</h5>
            <div class="row g-0" style="font-size:12px;">
                <div class="col">
                    <table id="roofing_table1" class="table table-responsive table-bordered border-light" style="border:solid 1px;padding:10px;border:solid 1px;">
                        <tr style="border:solid 1px;">
                            <th>ROOFING</th>
                            <th></th>
                        </tr>                                    
                    </table>
                </div>
                <div class="col">
                    <table id="floor_table1" class="table table-responsive table-bordered border-light" style="border:solid 1px;padding:10px;border:solid 1px;">
                        <tr style="border:solid 1px;">
                            <th>FLOOR FINISH</th>
                            <th>1F</th>
                            <th>2F</th>
                            <th>3F</th>
                            <th>4F</th>
                        </tr>                                                           
                    </table>
                </div>
                <div class="col g-0">
                    <div class="d-flex flex-column">
                        <div class="flex-fill">
                            <table id="wall_table1" class="table table-responsive table-bordered border-light" style="border:solid 1px;padding:10px;border:solid 1px;">                            
                                <tr style="border:solid 1px;">
                                    <th>WALLINGS</th>
                                    <th>1F</th>
                                    <th>2F</th>
                                    <th>3F</th>
                                    <th>4F</th>
                                </tr>                                                    
                            </table>
                        </div>
                        <div class="flex-fill">
                            <table id="foundation_table1" class="table table-responsive table-bordered border-light" style="border:solid 1px;padding:10px;border:solid 1px;">
                                <tr style="border:solid 1px;">
                                    <th>FOUNDATION</th>
                                    <th></th>
                                </tr>                                 
                            </table>
                        </div>
                    </div>                                
                </div>
            </div>
            <div class="row" style="font-size:12px;">
                <div class="col">
                    <table id="add_table1" class="table table-responsive table-bordered border-light" style="border:solid 1px;padding:10px;border:solid 1px;">                            
                        <tr style="border:solid 1px;">
                            <th>ADDITIONAL</th>
                            <th>1F</th>
                            <th>2F</th>
                            <th>3F</th>
                            <th>4F</th>
                        </tr>                                                                            
                    </table>
                </div>
            </div>
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY APPRAISAL</h5>
            <table id="property_appraisal_building" class="text-center table table-bordered" style="border:solid 1px;font-size:12px;">
                <tr>
                    <th>Floor / Item</th>
                    <th>Base Market <br>Value</th>                                   
                    <th>Depreciation <br>Value</th>
                    <th>Adjusted <br>Value</th>
                    <th>% Adjustment</th>                         
                    <th>Adjusted Market <br>Value</th>
                </tr>
            </table>   
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY ASSESSMENT</h5>
            <table id="property_appraisal_building2" class="text-center table table-bordered" style="border:solid 1px;font-size:12px;">
                <tr>
                    <th>Market Value</th>
                    <th>Actual Use</th>                                   
                    <th>Assessment <br>Level</th>
                    <th>Assessed  <br>Value</th>                    
                </tr>
            </table>         
        </section>
                    

        <section id="machine_section">
            <h5 class="text-center mb-2" style="font-weight:bolder;font-family:'Times New Roman', Times, serif;">MACHINERY PROPERTY APPRAISAL</h5>            
            <table id="machinery_appraisal_1" class="table table-bordered table-responsive display" style="width:100%;border: .5px solid;font-size: 11px;">
                <thead style="font-weight:bolder;">              
                    <tr>
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">KIND OF MACHINERY</th>                       
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">BRAND</th>
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">MODEL</th>
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">CAPACTIY HP</th>
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">DATE ACCQUIRED</th>
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">CONDITION WHEN ACCQUIRED</th>                 
                        <th colspan="2" style="word-wrap: break-word;text-align: center;">ECONOMIC LIFE</th> 
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">YEAR INSTALLED</th>                         
                        <th rowspan="2" style="word-wrap: break-word;text-align: center;">YEAR OPERATION</th>                                          
                    </tr>
                    <tr>
                        <th width="10%" style="word-wrap: break-word;text-align: center;">ESTIMATED</th>
                        <th  width="10%" style="word-wrap: break-word;text-align: center;">REMAINING</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <table id="machinery_appraisal_2" class="table table-bordered table-responsive display" style="width:100%;border: .5px solid;font-size: 11px;">
                <thead style="font-weight:bolder;">              
                    <tr>                                           
                        <th rowspan="2" width="15%" style="word-wrap: break-word;text-align: center;">ORIGINAL COST</th>                       
                        <th rowspan="2" width="15%" style="word-wrap: break-word;text-align: center;">CONVERSION FACTOR</th>
                        <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">NO. OF UNITS</th>
                        <th rowspan="2" width="10%" style="word-wrap: break-word;text-align: center;">RCN</th>
                        <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">RATE OF DEPRECIATION</th>
                        <th colspan="2" width="20%" style="word-wrap: break-word;text-align: center;">TOTAL DEPRECIATION</th> 
                        <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">DEPRECIATED VALUE</th>                         
                        <th rowspan="2" width="5%" style="word-wrap: break-word;text-align: center;">DATE CREATED</th>                                        
                    </tr>
                    <tr>
                        <th width="5%" style="word-wrap: break-word;text-align: center;">%</th>
                        <th width="10%" style="word-wrap: break-word;text-align: center;">VALUE</th>
                    </tr>        
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th colspan="7" style="text-align:right">Total:</th>
                        <th><span id="total_sum_value"></span></th>                        
                        <th colspan="2"></th>
                    </tr>
                </tfoot>
            </table>  
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">PROPERTY ASSESSMENT</h5>
            <table id="property_appraisal_machine2" class="text-center table table-bordered" style="border:solid 1px;font-size:12px;">
                <tr>
                    <th>Market Value</th>
                    <th>Actual Use</th>                                   
                    <th>Assessment <br>Level</th>
                    <th>Assessed  <br>Value</th>                    
                </tr>
            </table>   
        </section>

        <section>
            <table class="table table-responsive table-stripped table-bordered border-light" style="width:100%;">                
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;">
                    <td style="width:70%" colspan="2">
                        <div>PREVIOUS OWNER: <span id="prevowner2" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="width:30%">
                        <div>TAXABLE: <span id="taxable" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                                                         
                </tr> 
                
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;">
                    <td style="width:70%" colspan="2">
                        <div>PREVIOUS ASSESSED VALUE: ₱ <span id="prevassval2" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="width:30%">
                        <div>EFFECTIVITY: <span id="effectivity" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                                                         
                </tr>                
            </table>
            <br><br>
            <div class="row mb-5">
                <div class="col-6 d-flex flex-column">
                    <div style="font-family:'Times New Roman', Times, serif;font-size:16px;">APPRAISED BY:</div>
                    <br>
                    <div class="d-flex flex-column text-center g-0" style="line-height:20px;">
                        <div>&nbsp;<span style="font-size:18px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;text-transform: uppercase"></span></div>
                        <div style="border-bottom:solid 1px;"></div>
                        <div style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;text-transform: uppercase">NAME</div>                        
                    </div>
                </div>
                <div class="col-6 d-flex flex-column">
                    <div style="font-family:'Times New Roman', Times, serif;font-size:16px;">RECOMMENDING APPROVAL:</div>
                    <br>
                    <div class="d-flex flex-column text-center g-0" style="line-height:20px;">
                        <div>&nbsp;<span id="head_name" style="font-size:18px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;text-transform: uppercase"></span></div>
                        <div style="border-bottom:solid 1px;"></div>
                        <div style="font-family:10px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;text-transform: uppercase">Municipal Assessor</div>                        
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6 d-flex flex-column">
                    <div style="font-family:'Times New Roman', Times, serif;font-size:16px;">APPROVED BY:</div>
                    <br>
                    <div class="d-flex flex-column text-center g-0" style="line-height:20px;">
                        <div>&nbsp;<span style="font-size:18px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;text-transform: uppercase">MARIFLOR D. VERO</span></div>
                        <div style="border-bottom:solid 1px;"></div>
                        <div style="font-family:10px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;text-transform: uppercase">Provincial/Municipal Assessor</div>                        
                    </div>
                </div>                
            </div>
            <table class="table" style="width:100%;">
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <td>
                        <div>MEMORANDA:<br>&emsp;<span id="memoranda" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                                               
                </tr>                                                       
            </table>
            <table class="table" style="width:100%;">
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <td>
                        <div>ANNOTATION:<br>&emsp;<span id="annotation" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                                               
                </tr>                                                       
            </table>
            <h5 style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">RECORD OF SUPERSEDED ASSESSMENT</h5>
            <table class="table table-responsive table-stripped table-bordered border-light" style="width:100%;font-size:14px;">
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;">
                    <td>
                        <div>PIN: <span id="supercede_pin" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td>
                        <div>ARP: <span id="supercede_arp" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>       
                    <td>
                        <div>TDNO: <span id="supercede_tdno" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                              
                </tr>
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;">
                    <td style="width:70%" colspan="2">
                        <div>OWNERNAME: <span id="supercede_ownername" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="width:30%">
                        <div>ASSESSED VALUE: ₱ <span id="supercede_assval" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                                                         
                </tr>
                <tr style="border:solid 1px;font-family:'Times New Roman', Times, serif;">
                    <td style="width:30%">
                        <div>EFFECTIVITY: <span id="supercede_effectivity" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>   
                    <td style="width:40%">
                        <div>RECORDING PERSON: <span id="supercede_clerkid" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td> 
                    <td style="width:30%">
                        <div>DATE CREATED: <span id="supercede_date_created" style="font-weight:bolder;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></span>
                    </td>                                                         
                </tr>
                                                                       
            </table>
            
        </section>
               


        
    
    </div>
</body>
</html>