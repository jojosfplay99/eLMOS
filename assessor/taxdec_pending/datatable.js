$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';

    var table1 = new DataTable('#example', {                        
        ajax: 'taxdec_pending/server1.php',
        processing: true,
        serverSide: false, 
        deferRender: true,  
        fixedColumns: {
            left: 1,
            right: 2,
        },
        scrollCollapse: true,
        scrollX: true,
        scrollY: true,
        autoWidth  : false,
        order:[1,'asc'],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },                 
           
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-eye"></i></button>',
            },            
        ],
        dom: 'Blrtip',
        rowId: 'id',
        select: {                
            style:    'multi',
            selector: 'td:first-child'
        },        
        buttons: [
            {              
                text: 'Add Manually',
                className:'btn btn-success btn-sm mb-1 mx-1',
                autoClose:true,
                action: function ( e, dt, node, config ){
                    window.location.href='add_taxdec.php'                    
                }
            },             
            {
                extend: 'collection',                
                className:'btn btn-primayr btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-filter"></i> Filter by Property Kind',
                autoClose:true,
                buttons: [                    
                    {              
                        text: 'Land',
                        action: function ( e, dt, node, config ){
                            table1.column( 7 ).search( 'LAND' ).draw();
                            table1.rows({}).deselect();                                                                                                         
                        }
                    },
                    {              
                        text: 'Building',
                        action: function ( e, dt, node, config ){                            
                            table1.column( 7 ).search( 'BUILDING' ).draw(); 
                            table1.rows({}).deselect();                           
                        }
                    },
                    {              
                        text: 'Machinery',
                        action: function ( e, dt, node, config ){
                            table1.column( 7 ).search( 'MACHINERY' ).draw();      
                            table1.rows({}).deselect();                                                                            
                        }
                    },
                    
                    {              
                        text: '-Reset-',
                        action: function ( e, dt, node, config ){
                            table1.column( 7 ).search( '' ).draw();                                                                                  
                            table1.rows({}).deselect();
                        }
                    },
                ]
            }, 
               
            {
                extend: 'collection',
                className:'btn btn-danger btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-gears"></i> Extra Options',
                collectionLayout: 'fixed columns',
                autoClose: true,
                buttons: [ 
                    {
                        className:'btn btn-danger btn-sm mb-1 mx-1',
                        text: 'Set as Active',
                        action: function ( e, dt, node, config ){
                            var values = table1.rows( { selected: true } ).data().pluck(0).toArray()
                            var total_length = values.length
                            if(values.length == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing is Selected!',                          
                                })
                            }
                            else{
                                Swal.fire({
                                    title: 'Set as Active',
                                    text: "Are you sure?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#24a0ed',
                                    cancelButtonColor: '#808080',
                                    confirmButtonText: 'Confirm!'
                                }).then((result) => {
                                    if(result.isConfirmed){ 
                                        var counter = 0;
                                        setActiveData(total_length,counter,values) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            html: '<div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        }); 
                                    }
                                })                                                                                             
                            }
                        }                        
                    },
                    {
                        className:'btn btn-danger btn-sm mb-1 mx-1',
                        text: 'Assign Number',
                        action: function ( e, dt, node, config ){
                            table1.draw();
                        }                        
                    },
                    '<hr>'                                                                                                                      ,
                    {
                        className:'btn btn-success btn-sm mb-1 mx-1',
                        text: '<i class="fa-solid fa-trash"></i> Delete',
                        autoClose: true,
                        action: function ( e, dt, node, config ) {
                            var values = table1.rows( { selected: true } ).data().pluck(0).toArray()
                            var total_length = values.length
                            if(values.length == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing is Selected!',                          
                                })
                            }
                            else{
                                Swal.fire({
                                    title: 'Delete Taxdec',
                                    text: "Are you sure?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#24a0ed',
                                    cancelButtonColor: '#808080',
                                    confirmButtonText: 'Confirm!'
                                }).then((result) => {
                                    if(result.isConfirmed){ 
                                        var counter = 0;
                                        deleteData(total_length,counter,values) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            html: '<div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        });                                         
                                    }
                                })
                                                                                             
                            }
                        }
                    },                  
                ]              
            },   
            {
                extend: 'collection',
                className:'btn btn-secondary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-file-export"></i> Export Options',
                collectionLayout: 'fixed columns',
                autoClose: true,
                buttons: ['csv','excel','pdf','print']              
            },                                                  
        ], 
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;
    
                    // Create input element
                    let input = document.createElement('input');
                    input.id = title+'_search';
                    input.placeholder = title;
                    input.value = "";
                    column.footer().replaceChildren(input);
    
                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                });            
        },       
    });

    $('#example tbody').on('click', '.btn-success', function(){    
        var data = table1.row($(this).parents('tr')).data();  
        $.redirect("view_taxdec.php", {next_id: data[0]}, "POST", "");
        $('#next_id').val(data[0])
    })

    function setActiveData(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec_pending/set_active.php",            
                data:{id:values[counter],counter:counter,total_length:total_length},                                                                                                                                                                    
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
                    setActiveData(total_length,counter,values);                                
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


    //START DELETE TAXDEC RECURSIVE DATA
    function deleteData(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec/set_delete.php",            
                data:{id:values[counter],counter:counter,total_length:total_length},                                                                                                                                                                    
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
                    deleteData(total_length,counter,values);                                
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
    
    setTimeout( function () {
        table1.column( 8 ).search( '' ).draw(); 
    }, 1000);
    
})