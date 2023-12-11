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
    <link rel="stylesheet" href="../dist/jquery_ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../dist/select2/css/select2.min.css">
    <link rel="stylesheet" href="../dist/select2/css/select2-bootstrap-5-theme.min.css">
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/jquery_ui/jquery-ui.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/jquery.number.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>
    <script src="../dist/select2/js/select2.min.js"></script>
    <script src="rpt/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <style type="text/css">
      #rpt_table,#rpt_table2 th{
        text-align: center;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }
      #rpt_table,#rpt_table2 td{
        text-align: center;
        font-family:'Times New Roman', Times, serif
      }  
    </style>
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    <?php 
    include 'navbar.php';    
    $transaction_code = $_POST['transaction_code'];
    $or_id = $_POST['or_id'];
    ?>

    <!------------CONTENT----------->
    <main class="container-fluid">
      <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">        
        <div>
          <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
            <li class="nav-item" role="presentation">
              <button class="nav-link active rounded-5" id="profile-tab2" data-bs-toggle="tab" data-bs-target="#preview_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fas fa-eye"></i> Taxdec Payment</button>
            </li> 
            <li class="nav-item" role="presentation">                    
              <button class="nav-link rounded-5" id="home-tab2" data-bs-toggle="tab" data-bs-target="#edit_tab" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-edit"></i> Computed Tax Dec List</button>
            </li>                                                                       
          </ul>
        </div>
        
        <div class="tab-content" id="myTabContent" style="display:block;">
          <div class="tab-pane fade" id="edit_tab" role="tabpanel" aria-labelledby="preview_tab" tabindex="0">                        
          <br>
            <h3 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">LIST OF COMPUTED TAXDEC PAYMENTS</h3>
            <table class="table table-bordered table-stripped" id="rpt_table" style="font-size:12px;width:100%;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th></th>
                  <th>PROPERTY ID</th>
                  <th>TAXDEC</th>
                  <th>TAX YEAR</th>
                  <th>TOTAL<br>ASSESSED VALUE</th>
                  <th>TAXDUE</th>
                  <th>BASIC</th>
                  <th>SEF</th>
                  <th>PENALTIES</th>
                  <th>DISCOUNT</th>
                  <th>TOTAL TAXDUE</th>
                  <th>PAY DATE</th>
                  <th>CLERKID</th>
                  <th>DATE<br>GENERATED</th>
                  <th>STATUS</th>
                  <th>PAYMENT<br>METHOD</th>
                  <th>COMPUTE</th>
                  <th>PAYMENT FOR</th>
                  <th width="10%">ACTION</th>
                </tr>
              </thead>                           
            </table>
          </div>
          <div class="tab-pane fade show active" id="preview_tab" role="tabpanel" aria-labelledby="faas_tab" tabindex="0">                        
            <br>
            <div class="row">
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="or_id" name="or_id" value="<?php echo $or_id;?>" placeholder="name@example.com" readonly>
                  <label for="floatingInput">OR ID</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="ornumber" name="ornumber" placeholder="name@example.com" readonly>
                  <label for="floatingInput">OR</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="transaction_code" name="transaction_code" value="<?php echo $transaction_code;?>" placeholder="name@example.com" readonly>
                  <label for="floatingInput">Transaction Code</label>
                </div>
              </div>
            </div> 
            <div class="mb-3">
              <select class="large-select2-options-single-field" id="payor_listing_modal" name="payor" data-placeholder="Choose Classification" required></select>
            </div>
            <div>
              <table class="table table-bordered table-stripped" id="rpt_table2" style="font-size:12px;width:100%;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TRANSACTION<br> CODE</th>
                    <th>ORNUMBER</th>
                    <th>PROEPRTY ID</th>
                    <th>TAXDEC</th>
                    <th>TAXYEAR</th>
                    <th>ASSESSED<br> VALUE</th>
                    <th>TAXDUE</th>
                    <th>BASIC</th>
                    <th>SEF</th>
                    <th>PENALTIES</th>
                    <th>DISCOUNT</th>
                    <th>ADDITIONAL<br> PENALTY</th>
                    <th>TOTAL PAYMENT</th>
                    <th>CLERKID</th>
                    <th>DATE PAID</th>
                    <th>COMPUTE CODE</th>
                    <th>ASSESSMENT ID</th>
                    <th>PAYMENT</th>
                    <th>STATUS</th>                    
                    <th width="10%">ACTION</th>
                  </tr>
                </thead>                           
              </table>
              <div class="row">
                <div class="col-10"></div>
                <div class="col">
                  <button id="payment_btn" class="btn btn-primary float-end">Payment</button>
                </div>
              </div>
            </div>           
          </div>
        </div>
       
        <!---------------------------------------------------------------------------------------->       
        
      </section>
    </main>
    <?php include 'rpt/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
