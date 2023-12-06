<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    -->  
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
    <script src="home/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    <?php include 'navbar.php';?>

    <!------------CONTENT----------->
    <main class="container-fluid">
      <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="row g-2">
          <div class="col-8">
            <br><br>
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
              <div class="card-body">                
                <div id="que_data" style="text-align:center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:200px;"></div>
              </div>
            </div>   
            <button id="pay" class="btn btn-success"><i class="fa-solid fa-coins"></i> PAY & SERVE NEXT</button> 
            <button id="next" class="btn btn-primary"><i class="fa-solid fa-forward"></i> IGNORE & NEXT SERVE</button> 
            <button id="reset" class="btn btn-danger"><i class="fa-solid fa-rotate-right"></i> RESET SERVE</button>                             
          </div>
          <div class="col-4">
            <h3 class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">PRIORITY SERVE</h3>
            <table class="table table-bordered table-stripped" id="que_table" style="font-size:12px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>QUE</th>
                  <th>STATUS</th>
                  <th width="10%">ACTION</th>
                </tr>
              </thead>              
            </table>
          </div>
        </div>
      </section>
    </main>

    <!------------CONTENT----------->
    </body>
</html>
