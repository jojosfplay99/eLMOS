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
    <script src="preview.js?timestamp='<?php echo date('ymdhis')?>"></script>
    <style>
        table{
            border:solid 1px;
        }        
    </style>
</head>
<body>
    <input type="text" name="id" id="id" value="<?php echo $_GET['id']?>" hidden>                    
    <section>
        <div class="mx-auto"  id="container" style="width: 100%;height:200px;">        
            <table id="header" class="table table-responsive table-bordered border-light" style="width: 100%;">
                <tr style="width: 100%;">
                    <th><img class="float-end" id="municipality_logo" alt="" height="100" weight="100"></th>
                    <th class="text-center" style="width:40%;line-height:20px;">
                        <div class="flex">
                            <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:light;">REPUBLIC OF THE PHILIPPINES</div>              
                            <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:light;">PROVINCE OF CEBU</div>              
                            <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:bolder;">MUNICIPALITY OF BOLJOON<span id="municipality_title"></span></div>              
                            <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:bolder;">OFFICE OF THE MUNICIPAL ASSESSOR</div>
                        </div>                      
                    </th>
                    <th><img id="province_logo" alt="" height="100" weight="100"></th>
                </tr>        
            </table>
            <h3 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">NOTICE OF ASSESSMENT</h3>
            <br><br>
            <div class="row">
                <div class="col-5">
                    <div class="d-flex flex-column">
                        <div class="flex-fill text-center" id="property_owner" style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">&nbsp;</div>
                        <div class="flex-fill" style="border-bottom:solid 1px;"></div>
                        <div class="flex-fill text-center" style="font-family:'Times New Roman', Times, serif">Property Owner</div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <div class="d-flex flex-column">
                        <div class="flex-fill text-center" id="property_owner" style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">&nbsp;</div>
                        <div class="flex-fill" style="border-bottom:solid 1px;"></div>
                        <div class="flex-fill text-center" style="font-family:'Times New Roman', Times, serif"></div>
                    </div>
                </div>                
            </div>

            <div class="row">
                <div class="col-5">
                    <div class="d-flex flex-column">
                        <div class="flex-fill text-center" id="property_address" style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">&nbsp;</div>
                        <div class="flex-fill" style="border-bottom:solid 1px;"></div>
                        <div class="flex-fill text-center" style="font-family:'Times New Roman', Times, serif">Property Address</div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <div class="d-flex flex-column">
                        <div class="flex-fill text-center" id="property_owner" style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><?php echo date('F Y')?></div>
                        <div class="flex-fill" style="border-bottom:solid 1px;"></div>
                        <div class="flex-fill text-center" style="font-family:'Times New Roman', Times, serif">Date</div>
                    </div>
                </div>                
            </div>
            <br>
            <p style="font-family:'Times New Roman', Times, serif;font-size:18px;text-indent:40px;">This is to inform you that Real Property Tax (es) due and payable for the year <?php echo date('Y')?> on the property / properties  leated in the city / municipality and ownership of which is / are stated in your name for taxation purposes (as well as for subsequent year until you are informed of any  change) is / as follows</p>
            <table id="notice_table" class="table table-bordered table-responsive" style="width:100%">
                <tr style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                    <th class="text-center" colspan="6">NOTICE OF ASSESSEMENT</th>
                    <th class="text-center" colspan="4">TAX BILL</th>
                </tr>
                <tr class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                    <th>TDNO</th>
                    <th>LOTNO</th>
                    <th>BARANGAY</th>
                    <th>CLASSIFICATION</th>
                    <th>YEAR</th>
                    <th>ASSESSED VALUE</th>
                    <th>BASIC TAX</th>
                    <th>SEF TAX</th>
                    <th>ADJUSTMENT</th>
                    <th>TOTAL</th>
                </tr>
                <tbody></tbody>                                
                <tfoot></tfoot>                                
            </table>
            <br><br><br>
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-column">
                        <div class="flex-fill text-center" id="header_signature" style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></div>
                        <div class="flex-fill" style="border-bottom:solid 1px;width:100%;"></div>
                        <div class="flex-fill text-center" style="font-size:12px;font-family:'Times New Roman', Times, serif;">MUNICIPAL ASSESSOR</div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex flex-column">
                        <div class="flex-fill" id="header_signature" style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">&emsp;</div>
                        <div class="flex-fill" style="border-bottom:solid 1px;width:100%;"></div>
                        <div class="flex-fill text-center" style="font-size:12px;font-family:'Times New Roman', Times, serif;">MUNICIPAL TREASURER</div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <p style="font-family:'Times New Roman', Times, serif;font-size:18px;text-indent:20px;">NOTICE:</p>
            <div class="d-flex flex-column">
                <div class="flex-fill" style="margin-left:20px"><b>1. </b>Kindly inform the Assessor's Office of any error or omission that you may have discovered in this Notice.</div>
                <div class="flex-fill" style="margin-left:20px"><b>2. </b>Please present this Notice to Office of the Treasurer when payment is made. Payments may be made every quarter in four (4) equal installments not later than March 31st (1st Quarter) (2nd Quarter); June 30th (3rd Quarter) September 30 (4th Quarter) December 31st.</div>
                <div class="flex-fill" style="margin-left:20px"><b>3. </b>Payments for the entire year should be made not later than March 31st.</div>
                <div class="flex-fill" style="margin-left:20px"><b>4. </b>This Notice pertains only to current year taxes and does not include deliquencees for previous years, which are subjected of a separate Notice when applicable.</div>
                <div class="flex-fill" style="margin-left:20px"><b>5. </b>Delinquent Payments are assessed a penalty of 2% per month of delinquency or fraction thereof.</div>
            </div>            
            <br><br><br>
            <div class="float-end">
                <div class="mb-5" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:16px;">RECEIVED BY:</div>
                <div class="d-flex flex-column">
                    <div class="flex-fill" style="border-bottom:solid 1px;width:500px;"></div>
                    <div class="flex-fill text-center" style="font-size:12px;font-family:'Times New Roman', Times, serif;">SIGNATURE OVER PRINTED NAME</div>
                </div>
            </div>
            
        </div>
    </section>
    <div id="loader"></div>
</body>
</html>