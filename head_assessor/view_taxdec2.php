<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php 
            include 'header.php';        
            $id = $_POST['next_id'];            
        ?>
        <style><?php include 'view_taxdec/style.css'?></style>
    </head>
<body>     
      
<?php require 'navbar.php'?> 
<div class="m-5">
    <form id="to_edit" action="edit_taxdec.php" method="POST">
        <input type="text" name="next_id" id="next_id" value="<?php echo $id?>" hidden>                
    </form> 
</div>
<div class="container-fluid">
    <div class="card" style="border:solid 1px;">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between">
                <div class="flex-fill">
                    <button class="btn text-white" type="button"><i class="fa-solid fa-eye"></i> ViewTax Declaration</button>                    
                </div>
                <div class="flex-fill">
                    <div class="d-flex justify-content-end">
                        <div class="mx-1">
                            <button class="btn btn-light" type="button" onclick="$('#to_edit').submit();">
                                <i class="fa-solid fa-pencil text-primary"></i>
                            </button>                            
                        </div>
                        <div>
                            <button class="btn btn-light" type="button" onclick="window.open('view_taxdec_web_print.php?next_id=<?php echo $id?>', '_blank', 'location=yes,height=800,width=600,scrollbars=yes,status=yes');">
                                <i class="fa-solid fa-print text-success"></i>
                            </button>                            
                        </div>
                    </div>                    
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <iframe src="view_taxdec_print.php?id=<?php echo $id?>" width="100%" height="2000px"></iframe>    
        </div>    
    </div>
</div>

    
    <div class="container-fluid">         
        
        
        
        
        
        <!-----END CONTAINER-------->
    </div> 
           
</body>
<?php include 'view_taxdec/modal.php'?>
<?php include 'view_taxdec/script.php'?>
</html>