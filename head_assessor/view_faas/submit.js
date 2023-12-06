$(document).ready(function(){
    
    $('#edit_new_faas').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "view_faas/edit_faas.php",
            data:$(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated!',
                    text:'Please wait a momement',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function(){
                    window.location.reload(true)
                })
                
            }
        });
    })

    $('#edit_classification_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'view_taxdec/edit_classifications.php',
            data: $(this).serialize(),        
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text:'Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location.reload(true);
                })               
            }        
        })
    })

    $('#edit_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "view_taxdec/edit_taxdec.php",
                    data:$(this).serialize(),
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Updated!',
                            text:'Please wait a momement',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function(){
                            window.location.reload(true)
                        })
                        
                    }
                });
            }
        })
        
    })
    

    $('#add_classification_form2').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "view_faas/add_building_propertyclassifications.php",
            data:$(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Updated!',
                    text:'Please wait a momement',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function(){
                    //window.location.reload(true)
                })
                
            }
        });
    })
})