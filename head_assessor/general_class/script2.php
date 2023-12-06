<script>
$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    
    var table2 = new DataTable('#example2', {                        
        ajax: 'classification/server2.php',
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
                text: '<i class="fa-solid fa-plus"></i> Add New Actual Use',
                className:'btn btn-success btn-sm mb-1 mx-1 btn-squared',                
                action: function ( e, dt, node, config ){
                    $('#add_new_actual').modal('show');                    
                    $( '#add_actual_select' ).select2( {
                        theme: "bootstrap-5",
                        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                        placeholder: $( this ).data( 'placeholder' ),                
                        dropdownParent: $('#add_new_actual'),
                        allowClear: true,
                        selectionCssClass: 'select2--large',
                        dropdownCssClass: 'select2--large',
                        ajax: {
                            url: "classification/classification_select.php",
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

                    $('#submit_new_actual').on('submit', function(e){
                        e.preventDefault();
                        $.ajax({
                            method: "POST",
                            url: "classification/add_actual.php",            
                            data:$(this).serialize(),
                            success: function(data) { 
                                if(data == "success"){
                                    Swal.fire({
                                        icon:'success',
                                        title: 'Success!',                
                                        text: 'Added Succefully!',
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
            {
                extend: 'collection',                
                className:'btn btn-primary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-list-check"></i> Set Options',
                autoClose: true,
                buttons: [ 
                    {              
                        text: '<i class="fa-solid fa-check"></i> Set Building Class Code',
                        action: function ( e, dt, node, config ){
                            var values = table2.rows( { selected: true } ).data().pluck(0).toArray();
                            var total_length = values.length;
                            if(values.length == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing Selected!',
                                })
                            }
                            else{
                                $('#set_class2').modal('show')                                
                                $('#set_classification2').select2( {
                                    theme: "bootstrap-5",
                                    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                                    placeholder: $( this ).data( 'placeholder' ),                
                                    dropdownParent: $('#set_class2'),
                                    allowClear: true,
                                    selectionCssClass: 'select2--large',
                                    dropdownCssClass: 'select2--large',
                                    ajax: {
                                        url: "classification/classification_select.php",
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
                                
                                $('#submit_set_class2').on('submit', function(e){                                    
                                    e.preventDefault();
                                    var classname = $('#set_classification2').val();
                                    var counter = 0;
                                    setClassCode2(total_length,counter,values,classname)                                     
                                });
                            }

                            function setClassCode2(total_length,counter,values,classname){  
                                if(counter < total_length){
                                    $('#data_value').html(counter + ' / ' + total_length);
                                    $.ajax({
                                        method: "POST",
                                        url: "classification/set_classification2.php",            
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
                                            setClassCode2(total_length,counter,values,classname);
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
                                        //window.location.reload(true);
                                    });
                                }        
                            }

                        }
                    },                    
                ]
            },                                                    
        ],             
    });

    $('#example2 tbody').on('click', '.btn-primary', function(){
        var data = table2.row($(this).parents('tr')).data();  
        $('#add_edit_actual').modal('show');
        $('#edit_actual_id').val(data[0])
        $('#edit_actual_select').val(data[2])
        $('#edit_actual_code').val(data[1])
        $('#edit_actual_description').val(data[3])
        $('#edit_actual_value').val(data[4])
        $('#edit_actual_status').val(data[5])
        
        
        if(data[1] != null){
            var select_id = data[1];
            $.ajax({
                method: "POST",
                url: "classification/classification_select.php",            
                data:{searchTerm2:data[2]},
                success: function(data) {  
                    var response = JSON.parse(data);                                                 
                    $('#edit_actual_select').append('<option value='+response[0].id+' selected="selected">'+response[0].text+'</option>').trigger('change');
                }
            });
        }
        else{
            var select_id = "";
        }  

        $('#edit_actual_select').select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),                
            dropdownParent: $('#add_edit_actual'),
            allowClear: true,
            selectionCssClass: 'select2--large',
            dropdownCssClass: 'select2--large',
            ajax: {
                url: "classification/classification_select.php",
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

        $('#submit_edit_actual').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                method: "POST",
                url: "classification/edit_actual.php",            
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

    $('#example2 tbody').on('click', '.btn-danger', function(){
        var data = table2.row($(this).parents('tr')).data(); 
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
                url: "classification/delete_actualuse.php",            
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