<?php
include '../db.php';
$taxdec_view = $_GET['id'];
include 'data.php';

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <script src="data_ajax2.jsx?timestamp=<?php echo date('Ymdhis')?>"></script>
    <style>
        body {
         
        }
        main[size="Letter"] {
            background: white !important;
            width: 11in !important;
            height:  14.29in !important;            
        }
        @media print {
           
        }
        .ellipsis {
            width:1050px;
            height:100px;
            overflow: hidden;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <input type="text" id="next_id" value="<?php echo $_GET['id']?>" hidden>
<main size="Letter" style="font-size:16px;">
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

    <hr>
<!-----------------row---------------------->
<div class="row">
    <div class="col-6"></div>
    <div class="col-6">
        <table class="table table-responsive table-bordered border-light">
            <tr style="line-height:5px;">
                <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                    <div class="align-bottom">PIN:</div>
                </td>
                <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="pin"></div></td>                   
            </tr>        
        </table>
    </div>
</div>
<!-----------------row---------------------->   

<!-----------------row---------------------->
    <div class="row">
        <div class="col-6">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">TDNO:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="tdno"></div></td>                   
                </tr>        
            </table>      
        </div>        
        <div class="col-6">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">ARP:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="arp"></div></td>                   
                </tr>        
            </table>     
       </div>       
    </div>
    <div class="row">
        <div class="col-9">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">OWNERNAME:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="ownername"></div></td>                   
                </tr>        
            </table>      
        </div>        
        <div class="col">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">TIN:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="ownertin"></div></td>                   
                </tr>        
            </table>     
       </div>       
    </div>

    <div class="row">
        <div class="col-9">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">ADDRESS:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="owneraddress"></div></td>                   
                </tr>        
            </table>      
        </div>        
        <div class="col">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">TEL:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="ownertel"></div></td>                   
                </tr>        
            </table>     
       </div>       
    </div>

    <div class="row">
        <div class="col-9">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">ADMIN:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="admin"></div></td>                   
                </tr>        
            </table>      
        </div>        
        <div class="col">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">TIN:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="admintin"></div></td>                   
                </tr>        
            </table>     
       </div>       
    </div>

    <div class="row">
        <div class="col-9">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">ADDRESS:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="adminaddress"></div></td>                   
                </tr>        
            </table>      
        </div>        
        <div class="col">
            <table class="table table-responsive table-bordered border-light">
                <tr style="line-height:5px;">
                    <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                        <div class="align-bottom">TEL:</div>
                    </td>
                    <td class="align-bottom" style="width: 60%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="admintel"></div></td>                   
                </tr>        
            </table>     
       </div>       
    </div>
    
    <table class="table table-responsive table-bordered border-light g-1" style="padding:10px;">
        <tr style="line-height:5px;">
            <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <div style="line-height:16px;">PROPERTY<br>LOCATION:</div>
            </td>
            <td class="align-bottom" style="width: 35%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <div class="d-flex flex-column">
                    <div class="text-center" style="font-weight:bolder" id="sitio1"></div>
                    <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                    <div class="text-center" style="font-size:14px;">SITIO</div>
                </div>
            </td>
            <td class="align-bottom text-center" style="width: 30%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <div class="d-flex flex-column">
                    <div class="text-center" style="font-weight:bolder" id="barangay1"></div>
                    <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                    <div class="text-center" style="font-size:14px;">BARANGAY</div>
                </div>
            </td>
            <td class="align-bottom" style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <div class="d-flex flex-column">
                    <div class="text-center" style="font-weight:bolder" id="municipality123"></div>
                    <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                    <div class="text-center" style="font-size:14px;">MUNICIPALITY</div>
                </div>
            </td>
            <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:20px;">
                <div class="d-flex flex-column">
                    <div class="text-center" style="font-weight:bolder" id="province"></div>
                    <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                    <div class="text-center" style="font-size:14px;">PROVINCE</div>
                </div>
            </td>
        </tr>        
    </table>
<!-----------------row---------------------->
    
    <div class="row">
        <div class="col-6">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">OCT/TCT/CLOA: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="oct" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;word-break: break-all"></div>
                    </td>                   
                </tr>
            </table>     
        </div>        
        <div class="col-6">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">SURVEYNO: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="surveyno" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;word-break: break-all"></div>
                    </td>                   
                </tr>
            </table>    
       </div>       
    </div>

    <div class="row">
        <div class="col-6">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">CCT: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="cct" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>     
        </div>        
        <div class="col-6">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">LOT NO: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="lotno" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>    
       </div>       
    </div>

    <div class="row">
        <div class="col-6">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">DATED: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="dated" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>     
        </div>        
        <div class="col-6">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">BLK NO: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="blkno" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>    
       </div>       
    </div>


<!-----------------row---------------------->
<h6><dt>BOUNDARIES</dt></h6>
<!-----------------row---------------------->
    <div class="row">
        <div class="col">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">NORTH: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="north" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>
        </div>
        <div class="col">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">SOUTH: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="south" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">EAST: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="east" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>
        </div>
        <div class="col">
            <table class="table" style="margin-bottom:0px !important;">
                <tr style="line-height:15px;">
                    <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                        <div class="align-bottom">WEST: </div>
                    </td>
                    <td class="align-bottom border-bottom border-dark">
                        <div class="align-bottom" id="west" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                    </td>                   
                </tr>
            </table>
        </div>
    </div>
<!-----------------row---------------------->



<h6><dt>KIND OF PROPERTY ASSESSED</dt></h6>

<input type="hidden" id="propertykind" value="<?php echo $propertykind?>">

<div class="row">
    <div class="col">
        <div class="list-group mx-1" >
            <label class="list-group-item d-flex gap-2" style="border:none !important">
            <input class="form-check-input flex-shrink-0" type="checkbox" name="land_check" id="land_check" value="" style="margin-top:10px;">
            <span style="font-weight:bolder;font-size:24px;">LAND</span>
        </div>
    </div>
    <div class="col">
        <div class="list-group mx-1">
            <label class="list-group-item d-flex gap-2" style="border:none !important">
            <input class="form-check-input flex-shrink-0" type="checkbox" name="building_check" id="building_check" value=""  style="margin-top:10px;">
            <span style="font-weight:bolder;font-size:24px;">BUILDING</span>
        </div>
    </div>
    <div class="col">
        <div class="list-group mx-1">
            <label class="list-group-item d-flex gap-2" style="border:none !important">
            <input class="form-check-input flex-shrink-0" type="checkbox" name="machinery_check" id="machinery_check" value=""  style="margin-top:10px;">
            <span style="font-weight:bolder;font-size:24px;">MACHINERY</span>
        </div>
    </div>
    <div class="col">
        <div class="list-group mx-1">
            <label class="list-group-item d-flex gap-2" style="border:none !important">
            <input class="form-check-input flex-shrink-6" type="checkbox" name="other_check" id="other_check" value=""  style="margin-top:10px;">
            <span style="font-weight:bolder;font-size:24px;">OTHERS</span>
        </div>
    </div>            
</div>

<!-----------------row---------------------->
<div class="row">
    <div class="col">
        <table class="table" style="margin-bottom:0px !important;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="align-bottom">STOREYS: </div>
                </td>
                <td class="align-bottom border-bottom border-dark">
                    <div class="align-bottom" id="storeys" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                </td>                   
            </tr>
        </table>
    </div>
    <div class="col">
        <table class="table" style="margin-bottom:0px !important;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="align-bottom">SPECIFY: </div>
                </td>
                <td class="align-bottom border-bottom border-dark">
                    <div class="align-bottom" id="specify" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                </td>                   
            </tr>
        </table>
    </div>
</div>
<!-----------------row---------------------->
<div class="row mb-2">
    <div class="col">
        <table class="table" style="margin-bottom:0px !important;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 25%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="align-bottom">BRIEF DESCRIPTION: </div>
                </td>
                <td class="align-bottom border-bottom border-dark">
                    <div class="align-bottom" id="storeys" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                </td>                   
            </tr>
        </table>
    </div>    
</div>


<!------------------table------------------->

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
<!------------------table------------------->

<table class="table table-responsive table-bordered border-light" style="padding:10px;line-height:15px;">
    <tr>
        <td style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">TOTAL ASSESSED VALUE:</td>                            
        <td style="width: 80%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:18px"><div class="text-center" id="inwords"></div></td>
    </tr>        
</table>

<!-----------------row---------------------->

<table class="table table-responsive table-bordered border-light" style="margin-bottom:0px !important;">
    <tr>
        <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">
            <div class="list-group mx-1">
                <label class="list-group-item d-flex gap-2" style="border:none !important">
                <input class="form-check-input flex-shrink-6" type="checkbox" name="taxable_check" id="taxable_check" value="" >
                <span style="font-weight:bolder;font-size:24px;">TAXABLE</span>
            </div>                           
        </td>                            
        <td style="width: 15%;font-family:'Times New Roman', Times, serif;font-size:16px;">
            <div class="list-group mx-1">
                <label class="list-group-item d-flex gap-2" style="border:none !important">
                <input class="form-check-input flex-shrink-6" type="checkbox" name="exempt_check" id="exempt_check" value="" >
                <span style="font-weight:bolder;font-size:24px;">EXEMPT</span>
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

<table class="table table-responsive table-bordered border-light" style="margin-bottom:0px !important">
    <tr>
        <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:14px;">APPROVED BY:</td>
        <td class="align-bottom" style="width: 40%;font-family:'Times New Roman', Times, serif;font-size:18px;">
            <div class="d-flex flex-column">
                <div class="text-center" id="approved_by" style="font-family:Arial, Helvetica, sans-serif;font-weight:bolder;"></div>
                <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                <div class="text-center" style="font-size:14px;">ICO - MUNICIPAL ASSESSOR</div>
            </div>
        </td> 
        <td style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:14px;">DATE APPROVED</td>
        <td class="align-bottom" style="width: 40%;font-family:'Times New Roman', Times, serif;font-size:14px;">
            <div class="d-flex flex-column">
                <div class="text-center" id="date_approved" style="font-family:Arial, Helvetica, sans-serif;font-weight:bolder;"></div>
                <div class="m-2" style="border-bottom: solid 1px;width:100%;"></div>
                <div class="text-center" style="font-size:14px;">&nbsp;</div>
            </div>
        </td>
    </tr>        
</table>
<table class="table table-responsive table-bordered border-light" style="margin-bottom:0px !important">
    <tr>
        <td class="align-bottom" style="width: 10%;font-family:'Times New Roman', Times, serif;font-size:14px;">
            <div class="align-bottom">PREVIOUS OWNERNAME:</div>
        </td>
        <td class="align-bottom" style="width: 90%;border-bottom:solid 1px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:20px"><div id="previous_owner"></div></td>                
    </tr>        
</table>
    
<div class="row">
    <div class="col-6">
        <table class="table" style="margin-bottom:0px !important;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="align-bottom">PREVIOUS TDNO: </div>
                </td>
                <td class="align-bottom border-bottom border-dark">
                    <div class="align-bottom" id="previoustd" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                </td>                   
            </tr>
        </table>     
    </div>        
    <div class="col-6">
        <table class="table" style="margin-bottom:0px !important;">
            <tr style="line-height:15px;">
                <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                    <div class="align-bottom">PREV ASSVAL: </div>
                </td>
                <td class="align-bottom border-bottom border-dark">
                    <div class="align-bottom" id="previous_assval" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></div>
                </td>                   
            </tr>
        </table>    
    </div>       
</div> 
<br>
<div class="ellipsis" style="line-height:15px;border:solid 1px;height:100px;">
    <div class="align-bottom" style="font-family:'Times New Roman', Times, serif;font-size:16px;">MEMORANDA: <br><br><span class="align-bottom" id="memoranda1" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></span></div>                
</div>
<br>
<div class="ellipsis" style="line-height:15px;border:solid 1px;height:100px;">
    <div class="align-bottom" style="font-family:'Times New Roman', Times, serif;font-size:16px;">ANNOTATION: <br><br><span class="align-bottom" id="annotation1" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></span></div>                
</div>





<code style="color:black">Notice:</code>
<h3 style="font-size: 12px;text-align: justify;">This declaration is for real property taxation purposes only and the value applies is in pursuance to SP Ordinance No. 2022 - 11, dated December 19,2022, approved by the Cebu Provincial Governor, Gwendolyn F. Garcia, adopting 2023 Schedule of Market Values (SMV). It does not and cannot by itself alone confer any ownership or legal title to the property.</h3>

<div id="additional_page" style="display:none"></div>
<div id="content_next" style="display:none"></div>    
<div class="container-fluid" id="content_2next" style="display:none">
    <br>
        <div class="row mb-5">
            <div class="col">
                <table class="table" style="margin-bottom:0px !important;border:solid 1px;">
                    <tr style="line-height:15px;">
                        <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                            <div class="align-bottom" >MEMORANDA: <span class="align-bottom" id="memoranda2" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></span></div>                
                        </td>                
                    </tr>
                </table>          
            </div>                 
        </div>

        <div class="row">
            <div class="col">
                <table class="table" style="margin-bottom:0px !important;border:solid 1px;">
                    <tr style="line-height:15px;">
                        <td class="align-bottom" style="width: 20%;font-family:'Times New Roman', Times, serif;font-size:16px;">
                            <div class="align-bottom" >ANNOTATION: <span class="align-bottom" id="annotation2" style="width: 100%;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></span></div>               
                        </td>                
                    </tr>
                </table>          
            </div>                 
        </div>
    </div>

</main>




</body>

</html>


