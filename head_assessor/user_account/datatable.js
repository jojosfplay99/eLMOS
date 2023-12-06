$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    
    var table1 = new DataTable('#example', {                        
        ajax: 'user_account/server1.php',
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
    });

    $('#example tbody').on('click', '.btn-primary', function(){
        var data = table1.row($(this).parents('tr')).data();  
        $('#edit_modal').modal('show');
        $('#edit_id').val(data[0])
        $('#edit_status').val(data[3]).trigger('change')
        $('#submit_edit').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "user_account/edit.php",            
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
                url: "user_account/delete.php",            
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

    $.ajax({
        method: "POST",
        url: "user_account/check_status.php", 
        dataType: "json",           
        success: function(data) { 
           $('#locklogin_status').html(data)
           $('#lock_password').val(data.lockpass)
           $('#homescreen').val(data.lock_home).trigger('change');
           $('#lock_password').on('change', function(){
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
                        Swal.fire({
                            title: "Enter Password",
                            input: "password",
                            inputAttributes: {
                              autocapitalize: "off",
                            },
                            showCancelButton: true,
                            confirmButtonText: "Continue",
                            showLoaderOnConfirm: true,
                            preConfirm: async (login) => {
                                try {
                                    const githubUrl = `
                                        user_account/confirm_login.php?login=${login}&clerkid=${cookie_id}
                                    `;
                                    const response = await fetch(githubUrl);
                                    if (!response.ok) {
                                        return Swal.showValidationMessage(`
                                            ${JSON.stringify(await response.json())}
                                        `);
                                    }
                                    return response.json();
                                } catch (error) {
                                    Swal.showValidationMessage(`
                                        Request failed: ${error}
                                    `);
                                }
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                            }).then((result) => {
                            if (result.isConfirmed) {
                                if(result.value.login == 0){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Invalid Pasword!',                          
                                        timer: 3000,
                                        allowEscapeKey: false,
                                        showConfirmButton: false,
                                    }).then(function(){
                                    window.location.reload(true);
                                    })                                
                                }else{
                                    Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Please wait a momement!',                          
                                    timer: 3000,
                                    allowEscapeKey: false,
                                    showConfirmButton: false,
                                    }).then(function(){
                                        var lock_password = $('#lock_password').val();
                                        $.ajax({
                                            method: "POST",
                                            url: "user_account/update_status2.php",            
                                            data:{lock_password:lock_password},
                                            success: function(data) { 
                                                Swal.fire({
                                                    icon:'success',
                                                    title: 'Updated Successfully!',                
                                                    timer: 2000,
                                                    timerProgressBar: true,                        
                                                }).then(function(){
                                                    window.location.reload(true)
                                                }) 
                                            }
                                        });
                                    }) 
                                }
                              
                            }
                        });                        
                    }
                })
           })
           $('#homescreen').on('change', function(){
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
                        var homescreen = $('#homescreen').val();
                        $.ajax({
                            method: "POST",
                            url: "user_account/update_status.php",            
                            data:{homescreen:homescreen},
                            success: function(data) { 
                                Swal.fire({
                                    icon:'success',
                                    title: 'Updated Successfully!',                
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
        }
    });
    
    
});    
