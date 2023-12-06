<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .h1{
            line-height: 5px;
        }
    </style>
</head>
<body>

<?php

$id = $_GET['id'];
if(isset($_GET['office'])){
    if($_GET['office'] == 'IT'){
        $office = "IT OFFICE";
    }
    else if($_GET['office'] == 'TREASURER'){
        $office = "TREASURER'S OFFICE";
    }
    else if($_GET['office'] == 'TREASURER'){
        $office = "TREASURER'S OFFICE";
    }
    else if($_GET['office'] == 'ENGINEERING'){
        $office = "ENGINEERING'S OFFICE";
    }
    else if($_GET['office'] == 'MCR'){
        $office = "MCR OFFICE";
    }
    else if($_GET['office'] == 'MPDC'){
        $office = "MPDC OFFICE";
    }
    else if($_GET['office'] == 'ASSESSOR'){
        $office = "ASSESSOR'S OFFICE";
    }
}

date_default_timezone_set('Asia/Manila');
?>
<center>
<h1 style="color:blue;font-size: 50px;line-height: 5px;"><?php echo $office;?></h1>
<h1>QUE NUMBER:</h1>
<h1 style="font-size: 70px;line-height: 5px;"><?php echo $id;?></h1>
<h3>DATE: <?php echo date('m/d/Y | h:i:s')?></h3>

</center>



    
</body>
</html>
<script type="text/javascript">         
    window.print();
</script>