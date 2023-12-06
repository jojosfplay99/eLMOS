<!DOCTYPE html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>LGU Management and Operations System</title>
        <link rel="stylesheet" href="../dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../dist/css/sweetalert2.min.css">
        <link rel="stylesheet" href="../dist/fontawesome/css/all.css">  
        <link rel="stylesheet" href="../dist/datatables/datatables.min.css">  
        <link rel="stylesheet" href="../dist/select2/css/select2.min.css">
        <link rel="stylesheet" href="../dist/select2/css/select2-bootstrap-5-theme.min.css">
        
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/js/js.cookie.min.js"></script>
        <script src="../dist/js/jquery.redirect.js"></script>
        <script src="../dist/js/bootstrap.bundle.min.js"></script>
        <script src="../dist/js/sweetalert2.all.min.js"></script>
        <script src="../dist/select2/js/select2.full.min.js"></script>
        <script src="../dist/fontawesome/js/all.js"></script>
        <script src="../dist/datatables/datatables.min.js"></script>    
        <script src="../dist/tinymce/tinymce.min.js"></script>
        <script src="user_account/datatable.js?timestamp=<?php echo date('ymdhis')?>"></script>        
        <!-- Custom styles for this template -->
    </head>
<body>       
<?php include 'navbar.php'?>
<?php include 'user_account/modal.php'?>
    <div class="container-fluid">
        <section>
            <div class="card mb-3">                
                <div class="card-body">
                    <h2 class="text-center mb-3" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Features Settings</h2>
                    <table class="table table-bordered table-stripped" style="border:solid 1px;">
                        <tr class="text-center" style="font-weight:bold;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                            <td width="30%">FEATURE</td>
                            <td width="40%">STATUS</td>
                            <td width="30%">STATUS</td>
                        </tr>
                        <tr class="text-center" style="font-family:'Times New Roman', Times, serif">
                            <td>
                                <div style="margin-top:10px;">
                                    <button class="btn btn-primary" style="padding-top:10px;">LOCK LOGIN</button>
                                </div>                                
                            </td>
                            <td>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="lock_password" name="lock_password" placeholder="name@example.com">
                                    <label for="floatingInput">Lock Password</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-floating">
                                    <select class="form-select" id="homescreen" name="homescreen" aria-label="Floating label select example">
                                        <option value="" selected disabled>Homescreen Lock Options</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    <label for="floatingSelect">Works with selects</label>
                                </div>
                            </td>
                        </tr>
                    </table>                                                                                       
                </div>
            </div>

            <div class="card">                
                <div class="card-body">
                    <h2 class="text-center mb-3" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">USER ACCOUNTS</h2>
                    <table id="example" class="table table-hover table-bordered table-stripped table-responsive display nowrap" style="font-size:12px;width:100%;height:1vh;border:.5px solid;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>	
                                <th>USER</th>		                                  
                                <th>STATUS</th>	                                                               
                                <th>ACTION</th> 													                    
                            </tr>
                        </thead>                                                                         
                    </table>                                                                                                 
                </div>
            </div>
        </section>
        <form id="submit_view" action="#" method="POST">
            <input type="text" name="next_id" id="next_id" hidden>
        </form>
    </div>          
</body>

</html>