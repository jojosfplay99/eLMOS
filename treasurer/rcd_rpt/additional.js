

$(document).ready(function(){
    var cookie_id = Cookies.get("id")    
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';    

    // Formatting function for row details - modify as you need   
    var table2 = new DataTable('#rpt_table2', {   
        ajax: {
            url:'rcd_rpt/server2.php',
            data: function ( d ) {
                d.clerkid = cookie_id
            }
        },                     
        processing: true,
        serverSide: false,
        info:     false,  
        searching:     false,  
        paging:     false,
        paging: false, 
        pageLength: 50,                   
        order:[0,'asc'],                
        columnDefs: [                        
            {
                target: [0,1,3,6,7,8,9,10,11,12,14,16,17,19],
                visible: false,
                searchable: false
            },            
            {
                targets: [6,7,8,9,10,11,12,13],
                render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
            },              
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-check"></i></button><button class="btn btn-danger btn-delete btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
            },                                            
        ],     
        dom: 'Blfrtip',                
        buttons: [                  
            {
                text: 'Print',
                className: 'btn btn-primary',
                action: function ( e, dt, node, config ) {                                        
                    window.open('rcd_rpt/preview_rcd.php?clerkid='+cookie_id, '_blank', 'menubar=no', 'height=600', 'width=800', 'resizable=yes', 'scrollbars=yes')                     
                }
            },
            'colvis',
            'searchBuilder',
        ]                               
    });

   
    
})

