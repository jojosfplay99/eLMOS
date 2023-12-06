$(document).ready(function(){
    var clerkid = $('#id').val()
    var min = $('#min').val()
    var max = $('#max').val()
    $.ajax({
        type: "POST",
        url: "fetch_data.php",
        data:{id:clerkid},
        success: function (response) {
            var response = JSON.parse(response)
            var date_created = response.date_created;
            var municipality = response.prefix_municipality;
            var image_municipality = '../../dist/images/'+(response.prefix_municipality).toLowerCase()+'.png';
            var image_province = '../../dist/images/'+(response.prefix_province).toLowerCase()+'.png';                              
            $('#municipality_title').html(municipality)
            $('#municipality_logo').attr('src', image_municipality)
            $('#province_logo').attr('src', image_province)
            $('#clerkid').val(clerkid)
            $('#name').val(response.clerkname)
        }
    });

    $('#max').on('change keyup', function(){
        table2.ajax.reload()        
    })

    $('#min').on('change keyup', function(){        
        table2.ajax.reload()        
    })

    var table2 = new DataTable('#rpt_table2', {   
        ajax: {
            url:'server3.php',
            data: function ( d ) {
                d.clerkid = clerkid
                d.max = $('#max').val();
                d.min = $('#min').val();
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
        ],     
        dom: 'Blrtip',                
        buttons: [                             
            {
                extend: 'colvis',
                className: 'btn btn-primary btn-sm btn-squared hidden',               
            },
            {
                extend: 'searchBuilder',
                className: 'btn btn-primary btn-sm btn-squared hidden',               
            },
            
        ],
                                   
    });


})