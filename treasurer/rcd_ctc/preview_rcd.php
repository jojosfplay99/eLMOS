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
    <script src="preview_data.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <style>
        body {
         
        }
        
        main[size="Letter"] {
            background: white !important;
            width: 11in !important;
            height:  14.29in !important;            
        }
        @media print {
           .hidden{
                display:none
            }
        }
        .ellipsis {
            width:1050px;
            height:100px;
            overflow: hidden;
            word-wrap: break-word;
        }
        td{
            text-align:center;
            font-family: 'Times New Roman', Times, serif;
        }        
    </style>
</head>
<body>
<?php
$date_year = date('Y');
$date_month = date('m');
$number = cal_days_in_month(CAL_GREGORIAN,$date_month,$date_year);

?>
<input type="text" id="id" value="<?php echo $_GET['clerkid']?>" hidden>
<main class="mx-auto" size="Letter" style="font-size:16px;">
    <table class="table table-responsive table-bordered border-light" style="width: 100%;">
        <tr style="width: 100%;">
            <th><img class="float-end" id="municipality_logo" alt="" height="100" weight="100"></th>
            <th class="text-center" style="width:40%;line-height:20px;">
                <div class="flex">
                    <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:light;">REPUBLIC OF THE PHILIPPINES</div>              
                    <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:light;">PROVINCE OF CEBU</div>              
                    <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:bolder;">MUNICIPALITY OF <span id="municipality_title"></span></div>              
                    <div style="font-family: 'Times', sans-serif; font-size:20px;font-weight:bolder;">OFFICE OF THE MUNICIPAL TREASURER</div>
                </div>                      
            </th>
            <th><img id="province_logo" alt="" height="100" weight="100"></th>
        </tr>        
    </table>
    <hr>
    <h2 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CTC COLLECTION RCD</h2>
    <br>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="clerkid" placeholder="name@example.com">
                <label for="floatingInput">Clerkid</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" placeholder="name@example.com">
                <label for="floatingInput">Clerk Name</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="min" value="<?php echo date('Y-m')."-01"?>" placeholder="name@example.com">
                <label for="floatingInput">From Date</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="max" value="<?php echo date('Y')."-".$date_month."-".$number?>" placeholder="name@example.com">
                <label for="floatingInput">To Date</label>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-stripped mb-5" id="ctc_table" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>CTC TYPE</th>
                <th>DATE</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>LAST NAME</th>
                <th>GENDER</th>
                <th>CIVIL<br>STATUS</th>
                <th>BDATE</th>
                <th>CITIZENSHIP</th>
                <th>PLACE OF <br>BIRTH</th>
                <th>ADDRESS</th>
                <th>GROSS</th>
                <th>COMPUTE</th>                                   
                <th>INTEREST</th>                                   
                <th>TOTAL</th>                                   
                <th>TRANSNUM</th>                                   
                <th>OR NUMBER</th>                                   
                <th>STATUS</th>                                   
                <th>CLERKID</th>                                   
                <th>REMITTANCE</th>                                   
                <th>BATCH</th>                                   
                <th>OR CODE</th>                                   
                <th>REMITTANCE NUMBER</th>                                   
            </tr>
        </thead>                           
    </table>
</main>




</body>

</html>


