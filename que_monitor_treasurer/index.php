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
    <link rel="stylesheet" href="../dist/css/video-js.min.css">

    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/jquery_ui/jquery-ui.min.js"></script>
    <script src="../dist/js/js.cookie.min.js"></script>
    <script src="../dist/js/jquery.redirect.js"></script>
    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/sweetalert2.all.min.js"></script>
    <script src="../dist/fontawesome/js/all.js"></script>
    <script src="../dist/datatables/datatables.min.js"></script>
    <script src="home/additional.js?timestamp=<?php echo date('Ymdhis')?>"></script>
    <script src="../dist/js/video.min.js"></script>
    
    
    <!-- Custom styles for this template -->
  </head>
  <body>    
    

    <!------------CONTENT----------->
    <main class="container-fluid">
      <section class="shadow-lg p-1 bg-body-tertiary rounded">
        <div class="row">
          <div class="col-4">
            <div class="d-flex flex-column">
              <div class="card shadow-lg p-1 mb-1 bg-body-tertiary rounded">
                <div class="card-body">                
                  <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:15px;">WINDOW 1</p>               
                  <div id="que_data1" style="text-align:center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:90px;"></div>
                </div>
              </div>
              <div class="card shadow-lg p-1 mb-1 bg-body-tertiary rounded">
                <div class="card-body">                
                  <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:15px;">WINDOW 2</p>               
                  <div id="que_data2" style="text-align:center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:90px;"></div>
                </div>
              </div>
              <div class="card shadow-lg p-1 mb-1 bg-body-tertiary rounded">
                <div class="card-body"> 
                  <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:15px;">WINDOW 3</p>               
                  <div id="que_data3" style="text-align:center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size:90px;"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-8" style="display:block;">
            <div class="card shadow-lg p-3 mb-1 bg-body-tertiary rounded" style="height:auto;object-fit:cover">
              <div class="card-body">
                <!--
                <div id="video-container">
                  <video id="myVideo" style="width:100%;height:590px;" autoplay muted>
                    Sources will be appended here using jQuery
                  </video>
                </div>                            
                -->
                <div id="carouselExampleFade" class="carousel slide carousel-fade" >
                  <div class="carousel-inner" id="carousel1">
                                       
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next" id="next1">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </section>
    </main>

    <!------------CONTENT----------->
    </body>
</html>
