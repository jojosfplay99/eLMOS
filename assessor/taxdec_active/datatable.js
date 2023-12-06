$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    var table1 = new DataTable('#example', {                        
        ajax: 'taxdec_active/server1.php',
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
                        text: 'Set as Cancelled',
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
                                    title: 'Set as Cancelled',
                                    text: "Are you sure?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#24a0ed',
                                    cancelButtonColor: '#808080',
                                    confirmButtonText: 'Confirm!'
                                }).then((result) => {
                                    if(result.isConfirmed){ 
                                        var counter = 0;
                                        var clerkid = cookie_id;
                                        setCancelledData(total_length,counter,values) 
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
                    text: 'Split',
                    action: function ( e, dt, node, config ){
                        var values = table1.rows( { selected: true } ).data().pluck(0).toArray()
                            var total_length = values.length                     
                            if(values.length  > 1){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Multiple Selection Not Allowed!',                          
                                })
                            }
                            else if(values.length  == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing Selected!',                          
                                })
                            }
                            else{
                                Swal.fire({
                                    title: 'Split Tax Declaration',
                                    html: `<input type="number" id="split" class="swal2-input" placeholder="Split">`,
                                    confirmButtonText: '<i class="fa-solid fa-scissors"></i> Split',
                                    focusConfirm: false,
                                    preConfirm: () => {
                                        const split = Swal.getPopup().querySelector('#split').value
                                        if (!split) {
                                            Swal.showValidationMessage(`Please enter a number`)
                                        }
                                        return { split: split}
                                    }
                                }).then((result) => {   
                                    var split = result.value.split;                               
                                    $.ajax({
                                        method: "POST",
                                        url: "taxdec_active/split.php",
                                        data: {"id":values[0],"cookies":cookie_id,"split":split},
                                            success: function(data) {
                                            Swal.fire({
                                                title: 'Success!',
                                                text: 'Split Successfully',
                                                icon: 'success',
                                                showConfirmButton: false,   
                                                timer: 1200                         
                                            }).then(function(){
                                                window.location.reload(true)
                                            });                                                                                                                            
                                        }
                                    });
                                })                                                                                                                             
                            }
                        }                        
                    },              
                    {
                        className:'btn btn-danger btn-sm mb-1 mx-1',
                        text: 'Fuse',
                        action: function ( e, dt, node, config ){
                            var values = table1.rows( { selected: true } ).data().toArray()
                            var total_length = values.length                                                       
                            if(total_length  > 1){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Multiple Selection Not Allowed!',                          
                                })
                            }
                            else if(total_length  == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing Selected!',                          
                                })
                            }
                            else{
                                Swal.fire({
                                    title: 'Use this as Main Taxdec Data?',
                                    text: "Are you sure?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#24a0ed',
                                    cancelButtonColor: '#808080',
                                    confirmButtonText: 'Confirm!'
                                }).then((result) => {
                                    if(result.isConfirmed){ 
                                        var clerkid = cookie_id;
                                        var fuse_id = values[0][0]
                                        var fuse_td = values[0][1]
                                        var fuse_name = values[0][3]
                                        setFuseData(fuse_id,fuse_td,fuse_name)                                         
                                    }
                                })                                                                                                                             
                            }
                        }                        
                    },
                    {
                        className:'btn btn-danger btn-sm mb-1 mx-1',
                        text: 'Revise',
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
                                    icon: 'warning',
                                    html: "<h2 class='text-center header1'>Do you want to proceed Revision?</h2>",
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: "New Value",
                                    denyButtonText: `Old Value`
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        var counter = 0;
                                        var clerkid = cookie_id;
                                        setReviseData2(total_length,counter,values,clerkid) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            html: '<div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        });
                                    } else if (result.isDenied) {
                                        var counter = 0;
                                        var clerkid = cookie_id;
                                        setReviseData1(total_length,counter,values,clerkid) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            html: '<div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        });
                                    }
                                });                                                                                                                          
                            }
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
                buttons: [                                                                                                                        
                    'csv',
                    'excel',
                    'pdf',
                    'print',
                ]              
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

    // ADDITIONAL

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
    

    setTimeout( function () {
        table1.column( 8 ).search( '' ).draw(); 
    }, 1000 );
})