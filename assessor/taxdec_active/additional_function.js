//CANCELLED

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

//


function setFuseData(fuse_id,fuse_td,fuse_name){     
        $('#fuse_modal').modal('show')
            $('#id').val(fuse_id)            
            $('#tdno').val(fuse_td)
            $('#ownername').text(fuse_name)
            
            var table2 = new DataTable('#example2', {
                bDestroy:true,       
                ajax:{
                    url: 'taxdec_active/server2.php',
                    data: function ( d ) {
                        d.extra_search = fuse_id;
                    }
                },                          
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
                                }
                            },
                            {              
                                text: 'Active',
                                action: function ( e, dt, node, config ){                            
                                    table2.column(8).search('^ACTIVE$', true, false, false).draw(false);                                   
                                }
                            },
                            {              
                                text: 'Cancelled',
                                action: function ( e, dt, node, config ){
                                    table2.column(8).search('^CANCELLED$', true, false, false).draw(false);                                                                                         
                                }
                            },
                            {              
                                text: '-Reset-',
                                action: function ( e, dt, node, config ){
                                    table2.column( 8 ).search( '' ).draw();                                                                
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
                                url: "taxdec_active/set_fuse.php",            
                                data:{main_id:fuse_id,secondary_id:values2},                                                                                                                                                                    
                                success: function(data) {  
                                    Swal.fire({
                                        title: 'Successfully Fused!',
                                        icon: 'success',
                                        showConfirmButton: false,   
                                        timer: 2000
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                                                   
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

            
            table2.row(':eq('+fuse_id+')').select();

            const myTimeout1 = setTimeout(reDrawData2, 300);

            function reDrawData2() {
                table2.draw()
            } 

    }

    //DELETE

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

function setReviseData1(total_length,counter,values,clerkid){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec_active/set_revise1.php",            
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
                    var clerkid = results.clerkid
                    setReviseData1(total_length,counter,values,clerkid);                                
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

    function setReviseData2(total_length,counter,values,clerkid){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec_active/set_revise2.php",            
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
                    var clerkid = results.clerkid
                    setReviseData2(total_length,counter,values,clerkid);                                
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