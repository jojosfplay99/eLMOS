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
    <script src="preview.js?timestamp='<?php echo date('ymdhis') ?>"></script>
    <style>
        table{
            border:solid 1px;
        }
        
    </style>
</head>
<body>
    <div class="mx-auto" id="container" style="width: 100%;height:3500px;">
        <input type="text" name="id" id="id" value="<?php echo $id?>" hidden>                
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
        <br>
        <table class="table table-responsive table-bordered border-light" style="width: 100%;">
            <tr>
                <th><h2 class="text-center" id="title" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></h2></th>
            </tr>
        </table>
        <section>
            <article>
                <p class="text-justify" id="html_text" style="text-indent: 40px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></p>
            </article>
        </section>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
                <div class="d-flex flex-column float-end">
                    <div class="flex-fill text-center"><span id="requested_by" style="text-transform:uppercase;font-weight:bolder;"></span></div>
                    <div style="border-bottom:solid 1px;width:600px;"></div>
                    <div class="flex-fill text-center" style="font-family:'Times New Roman', Times, serif">REQUESTED BY</div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="row">            
            <div class="col-6">
                <div class="d-flex flex-column float-start">
                    <div class="flex-fill text-center"><span id="head" style="text-transform:uppercase;font-weight:bolder;"></span></div>
                    <div style="border-bottom:solid 1px;width:600px;"></div>
                    <div class="flex-fill text-center" style="font-family:'Times New Roman', Times, serif">ASSESOR HEAD / OIC</div>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
        

    
               


        
    
    </div>
</body>
</html>