<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGU Management and Operations System</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="dist/css/sweetalert2.min.css">
    <link rel="stylesheet" href="dist/fontawesome/css/all.css">    
    <link rel="stylesheet" href="dist/css/login.css">
    <link rel="stylesheet" href="dist/select2/css/select2.min.css">
    <link rel="stylesheet" href="dist/select2/css/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="dist/jquery_ui/jquery-ui.min.css">
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/jquery_ui/jquery-ui.min.js"></script>
    <script src="dist/js/js.cookie.min.js"></script>
    <script src="dist/js/jquery.redirect.js"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/sweetalert2.all.min.js"></script>
    <script src="dist/fontawesome/js/all.js"></script>
    <script src="dist/select2/js/select2.min.js"></script>
    <script src="register.js?timestamp=<?php echo date('Ymdhis')?>"></script>
</head>
<body>    
    <div class="container">	 
        <div class="card shadow-lg bg-body-tertiary rounded position-absolute top-50 start-50 translate-middle" style="width:60%;">
            <div class="card-body">
                <div class="row p-1">
                    <div class="col-7">
                        <div class="position-relative top-50 start-50 translate-middle">
                            <div class="d-flex justify-content-center">                           
                                <div>                                    
                                    <h3 class="text-center"><span class="text-primary text-heading">LMOS</span></h3>
                                    <div class="mx-auto"> 
                                        <form id="register_form">
                                            <div id="alert"></div>
                                            <div class="input-group mb-1 input-group-lg mb-2">                        
                                                <input type="text" class="form-control" aria-label="Sizing example input" id="name" name="name" aria-describedby="inputGroup-sizing-default" autocomplete="off" placeholder="Name" required>
                                                <span class="input-group-text credential-icon" id="inputGroup-sizing-default" ><i class="fa-solid fa-square-pen"></i></span>
                                            </div>
                                            <div class="input-group mb-1 input-group-lg mb-2">                        
                                                <input type="text" class="form-control" aria-label="Sizing example input" id="user" name="username" aria-describedby="inputGroup-sizing-default" autocomplete="off" placeholder="Username" required>
                                                <span class="input-group-text credential-icon" id="inputGroup-sizing-default" ><i class="fa-solid fa-user"></i></span>
                                            </div>
                                            <div class="input-group mb-1 input-group-lg mb-2">                        
                                                <input type="password" class="form-control" aria-label="Sizing example input" id="password" name="password" aria-describedby="inputGroup-sizing-default" placeholder="Password" autocomplete="off" required>
                                                <span class="input-group-text credential-icon" id="inputGroup-sizing-default"><i class="fa-solid fa-key"></i></span>
                                            </div>
                                            <div class="input-group mb-1 input-group-lg mb-2">                        
                                                <input type="password" class="form-control" aria-label="Sizing example input" id="confirm_password" name="confirm_password" aria-describedby="inputGroup-sizing-default" placeholder="Confirm Password" autocomplete="off" required>
                                                <span class="input-group-text credential-icon" id="inputGroup-sizing-default"><i class="fa-solid fa-key"></i></span>
                                            </div>                                            
                                            <div class="input-group mb-1 input-group-lg mb-2">                        
                                                <select class="large-select2-options-single-field" id="select_designation" name="select_designation" data-placeholder="Choose Designation" required></select>    
                                                <span class="input-group-text credential-icon" id="inputGroup-sizing-default"><i class="fa-solid fa-list"></i></span>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="" id="see_password">
                                                <label class="form-check-label" for="flexCheckIndeterminate">
                                                    See Password
                                                </label>
                                            </div>                                             
                                            <button type="submit" class="btn btn-success form-control">Create New</button>
                                        </form>                                                                                                                     
                                    </div>                                                                                                                  
                                </div>
                            </div>
                        </div>                                                
                    </div>
                    <div class="col">                        
                        <div class="position-relative top-50 start-50 translate-middle">
                            <div class="d-flex justify-content-center">                           
                                <div>                                    
                                    <img src="dist/images/alcoy.png" alt="" width="200" height="200">    
                                </div>
                            </div>
                        </div>                                                         
                    </div>                 
                </div>
            </div>
        </div>                
    </div>
    		

</body>
</html>