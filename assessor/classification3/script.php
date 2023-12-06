<script>
$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    
    var table1 = new DataTable('#example', {                        
        ajax: 'classification3/server1.php',
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
                text: '<i class="fa-solid fa-plus"></i> Add New Sub Classification',
                className:'btn btn-success btn-sm mb-1 mx-1 btn-squared',                
                action: function ( e, dt, node, config ){
                    $('#add_new_subclass').modal('show');                    
                    $( '#add_subclass_select' ).select2( {
                        theme: "bootstrap-5",
                        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                        placeholder: $( this ).data( 'placeholder' ),                
                        dropdownParent: $('#add_new_subclass'),
                        allowClear: true,
                        selectionCssClass: 'select2--large',
                        dropdownCssClass: 'select2--large',
                        ajax: {
                            url: "classification3/classification_select.php",
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
                    });

                    $('#submit_new_subclass').on('submit', function(e){
                        e.preventDefault();
                        $.ajax({
                            method: "POST",
                            url: "classification3/add_subclass.php",            
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
                                        window.location.reload(true)
                                    });    
                                } 
                                else{
                                    Swal.fire({
                                        icon:'error',
                                        title: 'Error!',                
                                        text: 'Duplicate Entry!',
                                        timer: 2000,
                                        timerProgressBar: true,                        
                                    }).then(function(){
                                        window.location.reload(true)
                                    });       
                                }
                            }
                        });

                    });
                }
            },
            {
                extend: 'collection',                
                className:'btn btn-primary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-list-check"></i> Set Options',
                autoClose: true,
                buttons: [ 
                    {              
                        text: '<i class="fa-solid fa-check"></i> Set Building Class Code',
                        action: function ( e, dt, node, config ){
                            var values = table1.rows( { selected: true } ).data().pluck(0).toArray();
                            var total_length = values.length;
                            if(values.length == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing Selected!',
                                })
                            }
                            else{
                                $('#set_class').modal('show')                                
                                $('#set_classification').select2( {
                                    theme: "bootstrap-5",
                                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                                    placeholder: $( this ).data( 'placeholder' ),                
                                    dropdownParent: $('#set_class'),
                                    allowClear: true,
                                    selectionCssClass: 'select2--large',
                                    dropdownCssClass: 'select2--large',
                                    ajax: {
                                        url: "classification3/classification_select.php",
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
                                });
                                
                                $('#submit_set_class').on('submit', function(e){                                    
                                    e.preventDefault();
                                    var classname = $('#set_classification').val();
                                    var counter = 0;
                                    setClassCode(total_length,counter,values,classname)                                     
                                });
                            }

                            function setClassCode(total_length,counter,values,classname){  
                                if(counter < total_length){
                                    $('#data_value').html(counter + ' / ' + total_length);
                                    $.ajax({
                                        method: "POST",
                                        url: "classification3/set_classification.php",            
                                        data:{id:values[counter],counter:counter,total_length:total_length,classname:classname},                                                                                                                                                                    
                                        success: function(data) {  
                                            var results = JSON.parse(data);
                                            var final_length = total_length - 1
                                            var current_percentage = results.counter / final_length; 
                                            var percentage = current_percentage * 100;
                                            var percentage = Math.floor(percentage);                                                                
                                            $( "#progressbar" ).progressbar({
                                                value: percentage,                                                                      
                                                create: function(event, ui) {
                                                    $(this).find('.ui-widget-header').css({'background-color':'#1E90FF'})
                                                }
                                            });                                                             
                                            var counter = results.next_counter
                                            var classname = results.classname
                                            setClassCode(total_length,counter,values,classname);
                                        }
                                    });                                                  
                                }
                                else{
                                    swal.close();
                                    Swal.fire({                                             
                                        title: 'Successfully Finalized!',
                                        icon: 'success',
                                        showConfirmButton: false,   
                                        timer: 2000                         
                                    }).then(function(){
                                        window.location.reload(true);
                                    });
                                }        
                            }

                        }
                    },
                    {              
                        text: '<i class="fa-solid fa-check"></i> Set Building Mode',
                        action: function ( e, dt, node, config ){
                            var values = table1.rows( { selected: true } ).data().pluck(0).toArray();
                            var total_length = values.length;
                            if(values.length == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing Selected!',
                                })
                            }
                            else{
                                $('#set_mode').modal('show')
                                $('#submit_set_mode').on('submit', function(e){                                    
                                    e.preventDefault();
                                    var classmode = $('#set_classmode').val();
                                    var counter = 0;
                                    setClassMode(total_length,counter,values,classmode)                                   
                                });
                                function setClassMode(total_length,counter,values,classmode){  
                                    if(counter < total_length){
                                        $('#data_value').html(counter + ' / ' + total_length);
                                        $.ajax({
                                            method: "POST",
                                            url: "classification3/set_mode.php",            
                                            data:{id:values[counter],counter:counter,total_length:total_length,classmode:classmode},                                                                                                                                                                    
                                            success: function(data) {  
                                                var results = JSON.parse(data);
                                                var final_length = total_length - 1
                                                var current_percentage = results.counter / final_length; 
                                                var percentage = current_percentage * 100;
                                                var percentage = Math.floor(percentage);                                                                
                                                $( "#progressbar" ).progressbar({
                                                    value: percentage,                                                                      
                                                    create: function(event, ui) {
                                                        $(this).find('.ui-widget-header').css({'background-color':'#1E90FF'})
                                                    }
                                                });                                                             
                                                var counter = results.next_counter
                                                var classname = results.classname
                                                setClassMode(total_length,counter,values,classmode);
                                            }
                                        });                                                  
                                    }
                                    else{
                                        swal.close();
                                        Swal.fire({                                             
                                            title: 'Successfully Finalized!',
                                            icon: 'success',
                                            showConfirmButton: false,   
                                            timer: 2000                         
                                        }).then(function(){
                                            window.location.reload(true);
                                        });
                                    }        
                                }
                            }
                        }
                    },
                ]
            },                                                    
        ],             
    });

    $('#example tbody').on('click', '.btn-primary', function(){
        var data = table1.row($(this).parents('tr')).data();  
        $('#add_edit_subclass').modal('show');
        $('#edit_subclass_id').val(data[0])
        $('#edit_subclass_select').val(data[2]).trigger('change')
        $('#edit_subclass_code').val(data[1])
        $('#edit_subclass_description').val(data[3])        
        $('#edit_subclass_value').val(data[4])
        $('#edit_subclass_status').val(data[5])
        if(data[2] != null){
            var select_id = data[2];
            $.ajax({
                method: "POST",
                url: "classification3/classification_select.php",            
                data:{searchTerm2:data[2]},
                success: function(data) {  
                    var response = JSON.parse(data);                                                 
                    $('#edit_subclass_select').append('<option value='+response[0].id+' selected="selected">'+response[0].text+'</option>').trigger('change');
                }
            });
        }
        else{
            var select_id = "";
        }  

        $('#edit_subclass_select').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),                
            dropdownParent: $('#add_edit_subclass'),
            allowClear: true,
            selectionCssClass: 'select2--large',
            dropdownCssClass: 'select2--large',
            ajax: {
                url: "classification3/classification_select.php",
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
        });

        $('#submit_edit_subclass').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "classification3/edit_subclass.php",            
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
                url: "classification3/delete_subclass.php",            
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