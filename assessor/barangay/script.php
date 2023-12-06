<script>
$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    
    var table1 = new DataTable('#example', {                        
        ajax: 'barangay/server1.php',
        processing: true,
        serverSide: false,         
        order:[0,'asc'],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },                 
           
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-primary btn-sm mb-1 mx-1"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
            },            
        ],
        dom: 'Blfrtip', 
        select: {                
            style:    'multi',
            selector: 'td:first-child'
        },            
        buttons: [ 
            {              
                text: '<i class="fa-solid fa-plus"></i> Add New Barangay',
                className:'btn btn-success btn-sm mb-1 mx-1 btn-squared',                
                action: function ( e, dt, node, config ){
                    $('#add_new_barangay').modal('show');                                        
                    $('#submit_new_barangay').on('submit', function(e){
                        e.preventDefault();
                        $.ajax({
                            method: "POST",
                            url: "barangay/add_barangay.php",            
                            data:$(this).serialize(),
                            success: function(data) { 
                                if(data == "success"){
                                    Swal.fire({
                                        icon:'success',
                                        title: 'Success!',                
                                        text: 'Updated Succefully!',
                                        timer: 2000,
                                        timerProgressBar: true,                        
                                    }).then(function(){
                                        window.location.reload(true);
                                    })    
                                } 
                                else{
                                    Swal.fire({
                                        icon:'error',
                                        title: 'Error!',                
                                        text: 'Duplicate Entry!',
                                        timer: 2000,
                                        timerProgressBar: true,                        
                                    }).then(function(){
                                        window.location.reload(true);
                                    })    
                                }
                            }
                        });

                    });
                }
            },                                                              
        ],             
    });

    $('#example tbody').on('click', '.btn-primary', function(){
        var data = table1.row($(this).parents('tr')).data();  
        $('#edit_barangay').modal('show');
        $('#edit_id').val(data[0])
        $('#edited_barangay').val(data[1])
        
        $('#edit_code').val(data[2])

        $('#submit_edit_barangay').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "barangay/edit_barangay.php",            
                data:$(this).serialize(),
                success: function(data) {  
                    Swal.fire({
                        icon:'success',
                        title: 'Update Successfully!',                
                        timer: 2000,
                        timerProgressBar: true,                        
                    }).then(function(){
                        window.location.reload(true)
                    })                     
                }
            }); 
        })
    })

    $('#example tbody').on('click', '.btn-danger', function(){
        var data = table1.row($(this).parents('tr')).data(); 
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "barangay/delete_barangay.php",            
                data:{id:data[0]},
                success: function(data) { 
                    Swal.fire({
                        icon:'success',
                        title: 'Deleted Successfully!',                
                        timer: 2000,
                        timerProgressBar: true,                        
                    }).then(function(){
                        window.location.reload(true)
                    }) 
                }
            });
        }
        })                
    })

   
    
});    

</script>