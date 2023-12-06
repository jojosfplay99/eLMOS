<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $id = $_GET['id'];        
    ?>
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
    <script src="data_ajax2.jsx"></script>
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
    <div class="mx-auto" id="container" style="width: 100%;">
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

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;">
                <td style="width: 50%;"></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">PIN:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="pin"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;">
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">TDNO:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="tdno"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">ARP:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="arp"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;">
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">OWNERNAME:</div>
                </td>
                <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="ownername"></div></td>
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">TIN:</div>
                </td>
                <td class="align-bottom"  style="width: 20%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="ownertin"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;">
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">ADDRESS:</div>
                </td>
                <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px;word-break: break-all;"><div id="owneraddress"></div></td>
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">TEL:</div>
                </td>
                <td class="align-bottom"  style="width: 20%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="ownertel"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;">
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">ADMIN:</div>
                </td>
                <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="admin"></div></td>
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">TIN:</div>
                </td>
                <td class="align-bottom"  style="width: 20%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="admintin"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:5px;">
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">ADDRESS:</div>
                </td>
                <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px;word-break: break-all;"><div id="adminaddress"></div></td>
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">TEL:</div>
                </td>
                <td class="align-bottom"  style="width: 20%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="admintel"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light g-1" style="padding:10px;">
            <tr style="line-height:5px;">
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div style="line-height:20px;">PROPERTY<br>LOCATION:</div>
                </td>
                <td class="align-bottom" style="width: 35%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="sitio"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">SITIO</div>
                    </div>
                </td>
                <td class="align-bottom text-center" style="width: 30%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="barangay1"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">BARANGAY</div>
                    </div>
                </td>
                <td class="align-bottom" style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="municipality123"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">MUNICIPALITY</div>
                    </div>
                </td>
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center"id="province"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">PROVINCE</div>
                    </div>
                </td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
            <tr>
                <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">OCT/TCT/CLOA No.:</td>
                <td style="width: 35%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="oct"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">SURVEY No.:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="surveyno"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:5px;">
            <tr>
                <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">CCT.:</td>
                <td style="width: 35%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="cct"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">LOT No.:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="lotno"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:5px;">
            <tr>
                <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">DATED.:</td>
                <td style="width: 35%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="dated"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">BLK No.:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="blkno"></div></td>
            </tr>        
        </table>

        <code>BOUNDARIES</code>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:5px;">
            <tr>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">NORTH:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="north"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">SOUTH:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="south"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:5px;">
            <tr>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">EAST:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="east"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">WEST:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="west"></div></td>
            </tr>        
        </table>

        <code>KIND OF PROPERTY ASSESSED</code>
        <br><br>
        <div class="d-flex justify-content-center mb-3" style="position:relative;transform: scale(2);">
            <div class="p-2 bd-highlight">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="land_check">
                    <label class="form-check-label" for="flexCheckIndeterminate" style="font-weight:bolder">
                    LAND
                    </label>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="building_check">
                    <label class="form-check-label" for="flexCheckIndeterminate" style="font-weight:bolder">
                    BUILDING
                    </label>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="machinery_check">
                    <label class="form-check-label" for="flexCheckIndeterminate" style="font-weight:bolder">
                    MACHINERY
                    </label>
                </div>
            </div>
            <div class="p-2 bd-highlight">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="other_check">
                    <label class="form-check-label" for="flexCheckIndeterminate" style="font-weight:bolder">
                    OTHERS
                    </label>
                </div>
            </div>
        </div>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
            <tr>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">NO OF STOREYS:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="north"></div></td>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">SPECIFY:</td>
                <td style="width: 40%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="south"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
            <tr>
                <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:16px;">BRIEF DESCRIPTION:</td>                            
                <td style="width: 90%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="south"></div></td>
            </tr>        
        </table>

        <table class="table table-bordered table-responsive table-bordered border-dark" style="border:solid 1px;padding:10px;line-height:15px;" id="classvalue">
            <tr class="text-center" style="font-size:20px;font-weight:bolder;font-family:Arial, Helvetica, sans-serif;" >
                <td style="width: 20%;font-family:'Times New Roman', Times, serif;">CLASSIFICATION</td>                            
                <td style="width: 20%;font-family:'Times New Roman', Times, serif;">AREA</td>   
                <td style="width: 20%;font-family:'Times New Roman', Times, serif;">ACTUAL USE</td>                            
                <td style="width: 20%;font-family:'Times New Roman', Times, serif;">MARKET VALUE</td>   
                <td style="width: 20%;font-family:'Times New Roman', Times, serif;">ASSESSED VALUE</td>   
            </tr> 
            <tr></tr>       
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
            <tr>
                <td style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">TOTAL ASSESSED VALUE:</td>                            
                <td style="width: 80%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:18px"><div class="text-center" id="inwords"></div></td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
            <tr>
                <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="d-flex justify-content-center mb-3" style="position:relative;transform: scale(1.5);">
                        <div class="p-2 bd-highlight">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="taxable_check">
                                <label class="form-check-label" for="flexCheckIndeterminate" style="font-weight:bolder;padding:5px;">
                                    TAXABLE
                                </label>
                            </div>
                        </div>  
                    </div>         
                </td>                            
                <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="d-flex justify-content-center mb-3" style="position:relative;transform: scale(1.5);">
                        <div class="p-2 bd-highlight">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="exempt_check">
                                <label class="form-check-label" for="flexCheckIndeterminate" style="font-weight:bolder;padding:5px;">
                                    EXEMPT
                                </label>
                            </div>
                        </div>  
                    </div>         
                </td> 
                <td style="width: 50%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div style="padding-top:15px;font-size:18px;font-weight:bolder;text-align:right;">EFFECTIVITY OF ASSESSMENT / REASSESSMENT</div>
                </td>     
                <td class="align-bottom" style="width: auto;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="quarter_effectivity" style="font-family:Arial, Helvetica, sans-serif;font-weight:bolder;"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">QUARTER</div>
                    </div>
                </td>
                <td class="align-bottom" style="width: auto;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="year_effectivity" style="font-family:Arial, Helvetica, sans-serif;font-weight:bolder;"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">YEAR</div>
                    </div>
                </td>                                      
            </tr>        
        </table>
        <table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
            <tr>
                <td style="width: 12%;font-family:'Times New Roman', Times, serif;font-size:14px;">APPROVED BY:</td>
                <td class="align-bottom" style="width: 48%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="approved_by" style="font-family:Arial, Helvetica, sans-serif;font-weight:bolder;"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">ICO - MUNICIPAL ASSESSOR</div>
                    </div>
                </td> 
                <td style="width: 12%;font-family:'Times New Roman', Times, serif;font-size:14px;">DATE APPROVED</td>
                <td class="align-bottom" style="width: 28%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="d-flex flex-column">
                        <div class="text-center" id="date_approved" style="font-family:Arial, Helvetica, sans-serif;font-weight:bolder;"></div>
                        <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                        <div class="text-center" style="font-size:14px;">&nbsp;</div>
                    </div>
                </td>
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 25%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">PREVIOUS OWNERNAME:</div>
                </td>
                <td class="align-bottom" style="width: 75%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="previous_owner"></div></td>                
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 25%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">MEMORANDA:</div>
                </td>
                <td class="align-bottom" style="width: 75%;"></td>                
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="margin-top:-20px;">
            <tr style="line-height:20px;">                
                <td class="align-bottom" style="width: auto;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:16px">
                    <div style="border-bottom:solid 1px;width:100%;">
                        <span class="underline-div" style="border-bottom:solid 1px;position:absolute;"></span>
                        <span id="memoranda" style="display:inline;"></span>
                    </div>
                </td>                
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="padding:10px;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 25%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">ANNOTATION:</div>
                </td>
                <td class="align-bottom" style="width: 75%;"></td>                
            </tr>        
        </table>

        <table class="table table-responsive table-bordered border-light" style="margin-top:-20px;">
            <tr style="line-height:20px;">                
                <td class="align-bottom" style="width: auto;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:16px"><p id="annotation" style="display:inline;border-bottom:solid 1px;width:100%;"></p></td>                
            </tr>        
        </table>
        <div style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px;"><h5 class="mb-3 mx-2">NOTICE:</h5></div>
        <table class="table table-responsive table-bordered border-light" style="margin-top:-20px;">
            <tr style="line-height:20px;">                
                <td class="align-bottom" style="width: auto;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:14px;text-align:justify;">
                    <p>This declaration is for real property taxation purposes only and the value applies is in pursuance to SP Ordinance No. 2022 - 11, dated December 19,2022, approved by the Cebu Provincial Governor, Gwendolyn F. Garcia, adopting 2023 Schedule of Market Values (SMV). It does not and cannot by itself alone confer any ownership or legal title to the property.</p>
                </td>                
            </tr>        
        </table>

        
    
    </div>
</body>
</html>