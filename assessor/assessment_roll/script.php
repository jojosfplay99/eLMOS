<script>
$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    var groupColumn = 0;

    var table1 = new DataTable('#example', { 
		ajax:{
			url:'assessment_roll/server1.php',
			data: function ( d ) {
				d.extra_search = $('#maxgroup').val();
			}
		},
        //ajax:'assessment_roll/server1.php',                       
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
        order:[0,'asc'],
               
        columnDefs: [
            
            {
                target: [19],
                visible: false,
                searchable: false
            },                 
            
            {
                targets: [13],
                render: $.fn.dataTable.render.number( ',', '.', 2)
            },
            
            {
                targets: [14,15],
                render: $.fn.dataTable.render.number( ',', '.', 2, '' )
            },
                                             
        ],
        dom: 'Blfrtip',       
        buttons: [ 
            {              
                text: '<i class="fa-solid fa-rotate-right"></i> Check / Update Assessment Roll',
                className:'btn btn-success btn-sm mb-1 mx-1',
                action: function ( e, dt, node, config ){
                    $.ajax({
                        method: "POST",
                        url: "assessment_roll/update_data.php",    
                        data:{"filter_by":$('#filter').val()},        
                        success: function(data) {  
                            if(data == '0'){                                
                                Swal.fire({
                                    title: 'Data is up to date!',
                                    text: "Do you want to update data?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, update it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var counter = 0; 
                                        table1.rows({ search: 'applied' }).select();    
                                        var values = table1.rows( { selected: true } ).data().pluck(19).toArray()
                                        var total_length = values.length
                                        setUpdateData(total_length,counter,values) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            text: 'Do Not Refresh the Page!',
                                            html: '<div class="text-center" id="data_value"></div><br><div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        }); 
                                    }
                                }) 
                            }
                            else{    
                                
                                Swal.fire({
                                    title: data+' EMPTY AREA DETECTED!',
                                    text: "Do you want to update data?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, update it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var counter = 0;
                                        table1.column( 13 ).search( 'NO DATA' ).draw(); 
                                        table1.rows({ search: 'applied' }).select();    
                                        var values = table1.rows( { selected: true } ).data().pluck(19).toArray()
                                        var total_length = values.length
                                        setUpdateData(total_length,counter,values) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            text: 'Do Not Refresh the Page!',
                                            html: '<div class="text-center" id="data_value"></div><br><div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        }); 
                                    }
                                })                                         
                            }
                        }
                    });        
                }
            },
            {
                extend: 'collection',                
                className:'btn btn-primary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-filter"></i> Filter by Status',
                autoClose:true,
                buttons: [ 
                    {              
                        text: 'Pending',
                        action: function ( e, dt, node, config ){
                            table1.column( 18 ).search( 'PENDING' ).draw(); 
                            $('#filter').val('PENDING')
                        }
                    },
                    {              
                        text: 'Active',
                        action: function ( e, dt, node, config ){                            
                            table1.column(18).search('^ACTIVE$', true, false, false).draw(false);                            
                            $('#filter').val('ACTIVE')
                        }
                    },
                    {              
                        text: 'Cancelled',
                        action: function ( e, dt, node, config ){
                            table1.column(18).search('^CANCELLED$', true, false, false).draw(false);                           
                            $('#filter').val('CANCELLED')
                        }
                    },
                    
                    {              
                        text: '-Reset-',
                        action: function ( e, dt, node, config ){
                            table1.column( 18 ).search( '' ).draw();
                            $('#filter').val('')
                        }
                    },
                ]
            },                
    
            
            {
                extend: 'collection',                
                className:'btn btn-secondary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-file-export"></i> Export Option',
                buttons: [ 'csv', 'excel', 'pdf',
                    {
                        extend: 'print',
                        text: 'Print current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        },
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .prepend(
                                    '<h2>ASSESSMENT ROLL</h2>'
                                );
        
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        },
                        autoPrint:false,
                    },
                ]
            },

			{              
                text: 'Maximum',
				className:'btn btn-secondary btn-sm mb-1 mx-1',
                action: function ( e, dt, node, config ){
                    var maxgroup = $('#maxgroup').val()
					if(maxgroup == "OFF"){
						$('#maxgroup').val('ON')
					}
					else{
						$('#maxgroup').val('OFF')
					}
					table1.ajax.reload();
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
        rowGroup: {
            endRender: function ( rows, group ) {                                                                          
                var area = rows
                    .data()
                    .pluck(13)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);
                area = $.fn.dataTable.render.number( ',', '.', 2, '' ).display( area);
                var market = rows
                    .data()
                    .pluck(14)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);
                market = $.fn.dataTable.render.number( ',', '.', 2, '₱ ' ).display( market ); 
                var assessedvalue = rows
                    .data()
                    .pluck(15)
                    .reduce( function (a, b) {
                        return a + b*1;
                    }, 0);
                assessedvalue = $.fn.dataTable.render.number( ',', '.', 2, '₱ ' ).display( assessedvalue );                            
                return $('<tr/>')
                .append( '<td class="text-center" colspan="2" style="border:solid 1px;">TOTAL</td>' )
                .append( '<td colspan="11" style="border:solid 1px;"></td>' )
                .append( '<td class="table-primary" style="border:solid 1px;">'+area+' sqm</td></tr>' )
                .append( '<td class="table-primary" style="border:solid 1px;">'+market+'</td></tr>' )
                .append( '<td class="table-primary" style="border:solid 1px;">'+assessedvalue+'</td></tr>' )
                /*
                                      
                
                
                    return $('<tr/>')                  
                    .append( '<td colspan="10"></td>' )
                    .append( '<td><b>'+area+' sqm</b></td>' )   
                */                       
                    //.append( '<td colspan="1"><b>'+market+'</b></td>' )
                    //.append( '<td colspan="1"><b>'+assessedvalue+'</b></td>' )                                                         
            },
            dataSrc: 2
        }             
    });

    

    



    


    //START SET ACTIVE RECURSIVE DATA
    function setUpdateData(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "assessment_roll/update_data2.php",            
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
                    setUpdateData(total_length,counter,values);                                
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

    const myTimeout = setTimeout(reDrawData, 300);
    function reDrawData() {
        table1.draw()
    } 


    /*----------------------------------------------------------------------------------------------------------*/

    var table2 = new DataTable('#example2', { 
        ajax:'assessment_roll/server2.php',                       
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
        order:[0,'asc'],
               
        columnDefs: [
            
            {
                target: [11,12],
                visible: false,
                searchable: false
            },                 
            
            {
                targets: [13],
                render: $.fn.dataTable.render.number( ',', '.', 2)
            }, 
            
            {
                targets: [14,15],
                render: $.fn.dataTable.render.number( ',', '.', 2, '' )
            },
                
            {
                render: function ( data, type, row, meta ) {
                 if (row.is_null == true){
                    console.log('1')
                 }
                }
            }                     
        ],
        dom: 'Blfrtip',       
        buttons: [ 
            {              
                text: '<i class="fa-solid fa-rotate-right"></i> Check / Update Assessment Roll',
                className:'btn btn-success btn-sm mb-1 mx-1',
                action: function ( e, dt, node, config ){
                    $.ajax({
                        method: "POST",
                        url: "assessment_roll/update_data.php",    
                        data:{"filter_by":$('#filter').val()},        
                        success: function(data) {  
                            if(data == '0'){
                                Swal.fire({                                             
                                    title: 'All Data Records are up to date!',
                                    icon: 'success',
                                    showConfirmButton: false,   
                                    timer: 2000                         
                                });
                            }
                            else{    
                                let timerInterval
                                Swal.fire({
                                    title: data+' EMPTY AREA DETECTED!',
                                    text: "Do you want to update data?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, update it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var counter = 0;
                                        table2.column( 12 ).search( 'NO DATA' ).draw(); 
                                        table2.rows({ search: 'applied' }).select();    
                                        var values = table2.rows( { selected: true } ).data().pluck(0).toArray()
                                        var total_length = values.length
                                        setUpdateData(total_length,counter,values) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            text: 'Do Not Refresh the Page!',
                                            html: '<div class="text-center" id="data_value"></div><br><div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        }); 
                                    }
                                })                                         
                            }
                        }
                    });        
                }
            },
            {
                extend: 'collection',                
                className:'btn btn-primary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-filter"></i> Filter by Status',
                autoClose:true,
                buttons: [ 
                    {              
                        text: 'Pending',
                        action: function ( e, dt, node, config ){
                            table2.column( 17 ).search( 'PENDING' ).draw(); 
                            $('#filter').val('PENDING')
                        }
                    },
                    {              
                        text: 'Active',
                        action: function ( e, dt, node, config ){                            
                            table2.column(17).search('^ACTIVE$', true, false, false).draw(false);                            
                            $('#filter').val('ACTIVE')
                        }
                    },
                    {              
                        text: 'Cancelled',
                        action: function ( e, dt, node, config ){
                            table2.column(17).search('^CANCELLED$', true, false, false).draw(false);                           
                            $('#filter').val('CANCELLED')
                        }
                    },
                    
                    {              
                        text: '-Reset-',
                        action: function ( e, dt, node, config ){
                            table2.column( 17 ).search( '' ).draw();
                            $('#filter').val('')
                        }
                    },
                ]
            },                
    
            
            {
                extend: 'collection',                
                className:'btn btn-secondary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-file-export"></i> Export Option',
                buttons: [ 'csv', 'excel', 'pdf',
                    {
                        extend: 'print',
                        text: 'Print current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        },
                        autoPrint:false,
                    },
                ]
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

    
    $('#profile-tab').on('click', function(){
        table2.draw();
    })


    //START SET ACTIVE RECURSIVE DATA
    function setUpdateData(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "assessment_roll/update_data2.php",            
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
                    setUpdateData(total_length,counter,values);                                
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
    
    setTimeout(reDrawData, 1000);

    function reDrawData() {
        table1.draw()
        table2.draw()
    }
}); 





</script>