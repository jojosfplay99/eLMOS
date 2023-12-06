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
    <link rel="stylesheet" href="../dist/datatables/DateTime-1.5.1/css/dataTables.dateTime.min.css">
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
    <script src="../dist/datatables/DateTime-1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="../dist/datatables/DateTime-1.5.1/js/datetime.js"></script>
    <script src="../dist/js/moment.min.js"></script>
    <script src="rcd_daily/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <style type="text/css">
     
      #rpt_table,#rpt_table2 td{
        width:auto;
        text-align: center;
        font-family:'Times New Roman', Times, serif
      }  
    </style>
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    <?php 
    include 'navbar.php';        
    ?>

    <!------------CONTENT----------->
    <main class="container-fluid">
      <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">        
        <!---------------------------------------------------------------------------------------->
        <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DAILY TRANSACTIONS</h3>        
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
        <!---------------------------------------------------------------------------------------->       
        
      </section>
    </main>
    <?php include 'rcd_daily/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
