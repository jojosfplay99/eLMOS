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
    <script src="daily/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <style type="text/css">
      #daily_table th{
        font-size:14px;
        text-align: center;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }
      #daily_table td{
        font-size:12px;
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
      <div class="row">          
          <div class="col">
            <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">        
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
                  <div>                    
                    <div class="row mb-5">
                      <div class="col">
                        <table class="table table-bordered table-stripped mb-5" id="daily_table" style="width:100%;">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>CLERKID</th>
                              <th>ORNUMBER</th>
                              <th>TRANSNUM</th>
                              <th>DATE PAID</th>
                              <th>PAYOR</th>
                              <th width="20%">NGAS CODE</th>
                              <th>NATURE<br>COLLECTION</th>
                              <th width="20%">AMOUNT</th>
                              <th>STATUS</th>
                              <th>REMITTANCE</th>
                              <th>BATCH</th>
                              <th>BATCH<br> CODE</th>
                              <th>REMITTANCE NUMBER</th>                                   
                              <th width="10%">ACTION</th>
                            </tr>
                          </thead>                           
                        </table>
                      </div>                      
                    </div>                                        
                  </div> 
            </section>
          </div>
          <div class="col-4">            
              <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded"> 
                <div class="alert alert-primary" role="alert">
                  <div class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ADD TO PAYMENT</div>
                </div>
                  <form id="payment_form">          
                    <div>
                      <input type="hidden" class="form-control" id="clerkid" name="clerkid"> 
                      <input type="hidden" class="form-control" id="date_paid" name="date_paid" value="<?php echo date('Y-m-d')?>"> 
                      <input type="hidden" class="form-control" id="transaction_code2" name="transaction_code">                                        
                      <input type="hidden" class="form-control" id="ornumber1" name="ornumber">                                        
                      <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Payor" id="payor" name="payor" style="height:80px;" required></textarea>
                        <label for="floatingTextarea">Payor</label>
                      </div>
                      <div class="mb-3">
                        <select class="large-select2-options-single-field" id="add_subclass_select" name="naturecol" data-placeholder="Choose Classification" required></select>
                      </div>               
                      <input type="hidden" class="form-control" id="ngascode" name="ngascode" required>                                           
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="0" placeholder="name@example.com" required>
                        <label for="floatingInput">Amount</label>
                      </div>
                    </div>
                  </form>
                <div class="row">
                  <div class="col-6">
                    <button id="payment_btn" class="btn btn-success form-control btn-sm btn-squared"> <i class="fa fa-coins" aria-hidden="true"></i> PAY</button>
                  </div>
                  <div class="col-6">
                    <button id="add_btn" class="btn btn-primary form-control btn-sm btn-squared"> <i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                  </div>
                </div>
              </section>              
            
          </div>          
        </div>
      
    </main>
    <?php include 'daily/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
