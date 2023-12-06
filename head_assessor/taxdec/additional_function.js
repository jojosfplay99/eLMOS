function setActiveData(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec/set_active.php",            
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
    
    //START SET PENDING RECURSIVE DATA
    function setPendingData(total_length,counter,values,clerkid){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec/set_pending.php",            
                data:{id:values[counter],counter:counter,total_length:total_length,clerkid:clerkid},                                                                                                                                                                    
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
                    var clerkid = cookie_id
                    setPendingData(total_length,counter,values,clerkid);                                
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

    function setReviseData(total_length,counter,values,clerkid){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec/set_revise.php",            
                data:{id:values[counter],counter:counter,total_length:total_length,clerkid:clerkid},                                                                                                                                                                    
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
                    var clerkid = cookie_id
                    setReviseData(total_length,counter,values,clerkid);                                
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

    //START SET CANCELLED RECURSIVE DATA
    function setCancelledData(total_length,counter,values,clerkid){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec/set_cancel.php",            
                data:{id:values[counter],counter:counter,total_length:total_length,clerkid:clerkid},                                                                                                                                                                    
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
                    var clerkid = cookie_id
                    setCancelledData(total_length,counter,values);                                
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

    //START SET FUSE RECURSIVE DATA
    function setFuseData(fuse_id,fuse_td,fuse_name){     
        $('#fuse_modal').modal('show')
            $('#id').val(fuse_id)            
            $('#tdno').val(fuse_td)
            $('#ownername').text(fuse_name)
            
            var table2 = new DataTable('#example2', {
                bDestroy:true,                        
                ajax: 'taxdec/server1.php',
                processing: true,
                serverSide: false, 
                deferRender: true,  
                fixedColumns: {
                    left: 1,
                },
                scrollCollapse: true,
                scrollX: true,
                
                order:[1,'asc'],
                columnDefs: [
                    {
                        target: [0],
                        visible: false,
                        searchable: false
                    },                                          
                ],
                dom: 'Blfrtip',
                rowId: 'id',
                select: {                
                    style:    'multi',
                    selector: 'td:first-child'
                },        
                buttons: [                                                                             
                    {
                        extend: 'collection',                
                        className:'btn btn-primayr btn-sm mb-1 mx-1',
                        text: '<i class="fa-solid fa-filter"></i> Filter by Status',
                        dropup: true,
                        autoClose:true,
                        buttons: [                    
                            {              
                                text: 'Pending',
                                action: function ( e, dt, node, config ){
                                    table2.column( 8 ).search( 'PENDING' ).draw();                            
                                    table2.buttons('.active_options').nodes().css("display", "none");
                                    table2.buttons('.pending_options').nodes().css("display", "inline");
                                    table2.buttons('.cancelled_option').nodes().css("display", "none");
                                    extra_button1()
                                }
                            },
                            {              
                                text: 'Active',
                                action: function ( e, dt, node, config ){                            
                                    table2.column(8).search('^ACTIVE$', true, false, false).draw(false);
                                    //table1.column( 8 ).search( '^ACTIVE$' ).draw();                            
                                    table2.buttons('.pending_options').nodes().css("display", "none");
                                    table2.buttons('.active_options').nodes().css("display", "inline");
                                    table2.buttons('.cancelled_option').nodes().css("display", "none");
                                }
                            },
                            {              
                                text: 'Cancelled',
                                action: function ( e, dt, node, config ){
                                    table2.column(8).search('^CANCELLED$', true, false, false).draw(false);                           
                                    table2.buttons('.active_options').nodes().css("display", "none");
                                    table2.buttons('.cancelled_option').nodes().css("display", "inline");
                                    table2.buttons('.pending_options').nodes().css("display", "none");                                    
                                }
                            },
                            {              
                                text: '-Reset-',
                                action: function ( e, dt, node, config ){
                                    table2.column( 8 ).search( '' ).draw();                            
                                    table2.buttons('.active_options').nodes().css("display", "none");
                                    table2.buttons('.pending_options').nodes().css("display", "none");
                                    table2.buttons('.cancelled_option').nodes().css("display", "none");
                                }
                            },
                        ]
                    },                    
                    {
                        extend: 'collection',
                        className:'btn btn-danger btn-sm mb-1 mx-1',
                        text: 'Extra Options',
                        buttons: [                     
                            {
                                extend: 'selectAll',                
                                className:'btn btn-success btn-sm mb-1 mx-1',
                                text: '<i class="fa-solid fa-check-double"></i> Select All Page',
                                autoClose: true,
                                action: function ( e, dt, node, config ) {
                                    table2.rows({
                                        
                                    }).select();
                                }
                                
                            },
                            {
                                className:'btn btn-success btn-sm mb-1 mx-1',
                                text: '<i class="fa-solid fa-check"></i> Select All Current Page',
                                autoClose: true,
                                action: function ( e, dt, node, config ) {
                                    table2.rows({
                                        page: 'current'
                                    }).select();
                                }
                            },
                            {
                                extend: 'selectNone',                
                                className:'btn btn-success btn-sm mb-1 mx-1',
                                autoClose: true,
                                text: '<i class="fa-solid fa-square-xmark"></i> Select None',
                            },                                                                                                
                        ]
                    
                    },
                    {
                        className:'btn btn-success btn-sm mb-1 mx-1',
                        text: '<i class="fa-solid fa-check"></i> Fuse',
                        autoClose: true,
                        action: function ( e, dt, node, config ) {
                            var values2 = table2.rows( { selected: true } ).data().pluck(0).toArray()
                            $.ajax({
                                method: "POST",
                                url: "taxdec/set_fuse.php",            
                                data:{main_id:fuse_id,secondary_id:values2},                                                                                                                                                                    
                                success: function(data) {  
                                                                   
                                }
                            });  
                        }
                    }, 
                    
                        //PENDING, ACTIVE, CANCELLED                                     
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

            const myTimeout1 = setTimeout(reDrawData2, 300);

            function reDrawData2() {
                table2.draw()
            } 

    }

    function extra_button3(){
        $('#header_span').html('CANCELLED LIST').removeClass().addClass('badge bg-danger');
        table1.buttons( '.pending_options' ).remove();
        table1.buttons( '.cancelled_options' ).remove();
        table1.buttons( '.active_options' ).remove();
        table1.button().add( 4, {
                extend: 'collection',
                className:'btn btn-secondary btn-sm mb-1 mx-1 cancelled_options',
                text: 'Cancelled Options',                
                autoClose: true,
                buttons: [
                    {
                        className:'btn btn-danger btn-sm mb-1 mx-1',
                        text: 'Set as Pending',
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
                                    title: 'Set as Pending',
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
                                        setPendingData(total_length,counter,values,clerkid) 
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
                            //END RECURSIVE DATA FOR SET PENDING
                        }                        
                    },                    
                ]
        } );
    }
    
    function extra_button2(){        
        $('#header_span').html('ACTIVE LIST').removeClass().addClass('badge bg-primary');
        table1.buttons( '.pending_options' ).remove();
        table1.buttons( '.cancelled_options' ).remove();
        table1.buttons( '.active_options' ).remove();
        table1.button().add( 4, {
            extend: 'collection',
            className:'btn btn-secondary btn-sm mb-1 mx-1 active_options',
            text: 'Active Options',
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
                                alert(cookie_id)                                      
                                $.ajax({
                                    method: "POST",
                                    url: "taxdec/split.php",
                                    data: {"id":values[0],"cookies":cookie_id,"split":split},
                                        success: function(data) {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Split Successfully',
                                            icon: 'success',
                                            showConfirmButton: false,   
                                            timer: 1200                         
                                        }).then(function(){
                                            table.ajax.reload();                                    
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
                                text: 'Single Selection Not Allowed!',                          
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
                                title: 'Fuse Multiple Taxdec?',
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
            ]
        } );
    }

    function extra_button1(){
        $('#header_span').html('PENDING LIST').removeClass().addClass('badge bg-success');
        table1.buttons( '.pending_options' ).remove();
        table1.buttons( '.cancelled_options' ).remove();
        table1.buttons( '.active_options' ).remove();
        var second_button = table1.button().add( 4, {
            extend: 'collection',
            className:'btn btn-secondary btn-sm mb-1 mx-1 pending_options',
            text: 'Pending Options',
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
            ]
        } );
    }
    table1.buttons( '.revise' ).disable();
  