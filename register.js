$(document).ready(function(){
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val()
    
    $('#see_password').on('click', function(){
        if( $('#see_password').is(':checked') ){
            $('#password,#confirm_password').attr('type','text')
        }
        else{
            $('#password, #confirm_password').attr('type','password')
        } 
    })
    
    $( '#select_designation' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: "Select Designation",                
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "designation.php",
            type: "post",
            dataType: 'json',
            delay: 250,
                data: function (params) {
                return {
                        searchTerm: params.term, // search term                                
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },                        
        } 
    } ).on('select2:select', function(event) {
        var additional = event.params.data;        
        
    }).on('select2:clear', function(event) {
        
    });

    $('#user').on('change', function(e){
        e.preventDefault();
        var user = $('#user').val();
        if(user.length < 8){
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Username Too Short! Minimum 8 Characters",
                timer: 2000,
            }).then(function(){
                $('#user').val('')
            }); 
        }else{

        }
        $.ajax({
            method: "POST",
            url: "check_username.php",            
            data:$('#register_form').serialize(),
            success: function(response) {             
              if(response != 0){
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Username Already Exists!",
                    timer: 2000,
                }).then(function(){
                    $('#user').val('')
                });                
              }else{
                
              }
            }
        });  
    })
    
    $('#password').on('change', function(e){
        e.preventDefault();
        var password = $('#password').val();
        
        if(password.length < 10){
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Password Too Short! Minimum 10 Characters",
                timer: 3000,
            }).then(function(){
                $('#password').val('')
            });
        }
    })

    $('#confirm_password').on('change', function(e){
        e.preventDefault();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val() 

        if(password != confirm_password){
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Passwords do not match!",
                timer: 2000,
            }).then(function(){
                $('#password').val('');
                $('#confirm_password').val('') 
            });
        }          
    })

    $('#register_form').on('submit', function(e){
        e.preventDefault();  
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Submit!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "register_submit.php",            
                    data:$('#register_form').serialize(),
                    success: function(response) {             
                        Swal.fire({
                            icon: "success",
                            title: "Successfully Added!",
                            text: "Please contact your Head to Activate Account!",
                            timer: 2000,
                        }).then(function(){
                            window.location.reload(true);
                        });
                    }
                });
            }
        });                    
        
    })
})