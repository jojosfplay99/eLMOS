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
    <link rel="stylesheet" href="../dist/select2/css/select2.min.css">
    <link rel="stylesheet" href="../dist/select2/css/select2-bootstrap-5-theme.min.css">
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/jquery_ui/jquery-ui.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>
    <script src="../dist/select2/js/select2.full.min.js"></script>
    <script src="../dist/js/crypto-js.min.js"></script>
    <script src="../dist/js/cryptojs-aes-format.js"></script>
    <script src="../dist/js/cryptojs-aes.min.js"></script>
    <script src="accounts/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    <?php include 'navbar.php';?>

    <!------------CONTENT----------->
    <main class="container-fluid">
        <section class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h3 class="text-center" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">User Account Settings</h3>
            <div class="p-5">
                <div id="alert_data">
                    <div class="alert alert-danger" role="alert">
                        <div>Field Locked <i class="fa fa-lock" aria-hidden="true"></i></div>
                    </div>
                </div>    

                <form id="form_update">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="clerkid" name="clerkid" placeholder="clerkid" readonly>
                        <label for="floatingInput">User ID</label>
                    </div> 
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" readonly>
                        <label for="floatingInput">User Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" readonly>
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="js-example-basic-single form-control form-select-lg" id="select_designation" name="select_designation" required placeholder="Select Property From Taxdec" disabled></select>
                    </div>
                    <button type="button" id="btn_unlock" class="btn btn-primary btn-sm btn-squared"> <i class="fa-solid fa-lock-open"></i> Unlock Field</button>
                    <button type="submit" class="btn btn-success btn-sm btn-squared float-end" id="btn_update" disabled> <i class="fa-solid fa-pen-nib" ></i> Update User Account</button>
                </form>                
            </div>
            
        </section>
    </main>

    <!------------CONTENT----------->
    </body>
</html>
