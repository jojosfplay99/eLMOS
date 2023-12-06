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
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/jquery_ui/jquery-ui.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>
    <script src="receipts/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <!-- Custom styles for this template -->
  </head>
  
  <body>    
    <?php 
    include 'navbar.php';
    $transaction_code = date('Ymdhis');
    ?>

    <!------------CONTENT----------->
    <input type="text" id="transaction_code" value="<?php echo $transaction_code;?>" hidden>
    <main class="container-fluid">
      <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h3 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="text-center">OR NUMBERS</h3>
        <table class="table table-bordered table-stripped" id="or_table" style="font-size:12px;">
          <thead>
            <tr>
              <th>ID</th>
              <th>FORM</th>
              <th>START OR</th>
              <th>END OR</th>
              <th>DATE</th>
              <th>BATCH NO</th>
              <th>BATCH CODE</th>
              <th width="10%">ACTION</th>
            </tr>
          </thead>              
        </table>
      </section>
    </main>
    <?php include 'receipts/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
