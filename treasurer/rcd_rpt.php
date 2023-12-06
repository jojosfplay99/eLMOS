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
    <script src="../dist/js/moment.min.js"></script>
    <script src="rcd_rpt/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
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
        <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">RPT TRANSACTIONS</h3>        
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
        <!---------------------------------------------------------------------------------------->       
        
      </section>
    </main>
    <?php include 'rcd_rpt/modal.php';?>
    <!------------CONTENT----------->
    </body>
</html>
