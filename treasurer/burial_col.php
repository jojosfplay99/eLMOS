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
    <script src="burial/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
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
              <h3 class="text-center mb-5" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Burial Permit</h3>
              <input type="text" class="form-control" id="batch_code" name="batch_code" hidden>
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

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="payor" name="payor" placeholder="Payor">
                  <label for="payor">Payor</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="applicant" id="applicant" placeholder="Applicant"  required>
                  <label for="applicant">Applicant</label>
                </div>


                <div class="row">                  
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="municipality" id="municipality" placeholder="MUNICIPALITY" >
                      <label for="municipality">Municipality</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="province" id="province" placeholder="PROVINCE" value="CEBU">
                      <label for="province">Province</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" name="dated" id="dated" placeholder="PROVINCE" value="<?php echo date('Y-m-d')?>" required>
                      <label for="dated">Date Applied</label>
                    </div>
                  </div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="deceased_person" id="deceased_person" placeholder="DECEASED PERSON" required>
                  <label for="deceased_person">Deceased Person</label>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="nationality" id="nationality" placeholder="NATIONALITY" required>
                      <label for="nationality">Nationality</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" name="age" id="age" placeholder="AGE" required>
                      <label for="age">Age</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect" name="gender" id="gender" aria-label="Floating label select example" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                      </select>
                      <label for="gender">Gender</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="causeofdeath" id="causeofdeath" placeholder="CAUSE OF DEATH" required>
                  <label for="cemetery">Cause of Death</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="cemetery" id="cemetery" placeholder="CEMETERY" required>
                  <label for="cemetery">Cemetery</label>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" name="ini" id="ini" aria-label="Floating label select example" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="YES">INFECTIOUS</option>
                        <option value="NO">NOT INFECTIOUS</option>
                      </select>
                      <label for="ini">Infectious / Not Infectious</label>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" name="ene" id="ene" aria-label="Floating label select example" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="YES">EMBALMED</option>
                        <option value="NO">NOT EMBALMED</option>
                      </select>
                      <label for="ene">Embalmed / Not Embalmed</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="dor" id="dor" placeholder="FEE" required>
                  <label for="dor">Disposition of Remains</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" name="fee" id="fee" placeholder="FEE" required>
                  <label for="cemetery">Fees</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </section>
            </form>
          </div>                 
        </div>
      
    </main>
    <?php include 'burial/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
