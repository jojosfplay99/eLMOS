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
    <script src="ctc/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
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
            <form id="form_submit">            
              <input id="or_id" value="<?php echo $_POST['or_id']?>" hidden>
              <h3 class="text-center mb-5" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">CTC Entry</h3>
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="clerkid" name="clerkid" readonly>
                      <label for="clerkid">Clerk ID</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="ornumber" name="ornumber" placeholder="OR NUMBER" readonly>
                      <label for="ornumber">OR Number</label>
                    </div>
                  </div>					
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="transnum" id="transaction_code" value="<?php echo $transaction_code?>" readonly>
                      <label for="transnum">Transaction_number</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="fname" id="fname" placeholder="FIRST NAME" required>
                      <label for="fname">First Name</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="mname" id="mname" placeholder="MIDDLE NAME" required>
                      <label for="mname">Middle Name</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="lname" id="lname" placeholder="LAST NAME"  required>
                      <label for="lname">Last Name</label>
                    </div>
                  </div>
                </div>									
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="gender" name="gender" id="gender" aria-label="Floating label select example" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                      </select>
                      <label for="gender">Gender</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="civil_status" name="civil_status" id="civil_status" aria-label="Floating label select example" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="SINGLE">SINGLE</option>
                        <option value="MARRIED">MARRIED</option>
                        <option value="SEPARATED">SEPARATED</option>
                        <option value="WIDOW">WIDOW</option>
                      </select>
                      <label for="gender">Civil Status</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" name="bdate" id="bdate" placeholder="BIRTH DATE" required>
                      <label for="bdate">Birth Date</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="address" id="address" placeholder="ADDRESS" required>
                  <label for="address">Address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="placeofbirth" id="placeofbirth" placeholder="ADDRESS" required>
                  <label for="placeofbirth">Place of Birth</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="citizenship" id="citizenship" placeholder="ADDRESS" required>
                  <label for="citizenship">Citizenship</label>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="ctctype" name="ctctype" id="ctctype" aria-label="Floating label select example" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="BUSINESS">BUSINESS</option>
                        <option value="CORPORATION">CORPORATION</option>
                      </select>
                      <label for="ctctype">CTC TYPE</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="basic" id="basic" step="0.00" placeholder="ADDRESS">
                      <label for="basic">Basic</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="gross" id="gross" value="0" step="0.00" placeholder="GROSS" required>
                      <label for="gross">Gross</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="taxdue" id="taxdue" step="0.00" placeholder="TAXDUE" >
                      <label for="compute">Taxdue</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="interest" id="interest" placeholder="INTEREST" readonly>
                      <label for="interest">Interest</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="penalty" id="penalty" placeholder="PENALTY" readonly>
                      <label for="grandtotal">Penalty</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="total" id="total" placeholder="GRAND TOTAL" readonly>
                  <label for="grandtotal">Grand Total</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </section>
            </form>
          </div>                 
        </div>
      
    </main>
    <?php include 'ctc/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
