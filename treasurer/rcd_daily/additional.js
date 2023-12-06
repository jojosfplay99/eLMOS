

$(document).ready(function(){
    var cookie_id = Cookies.get("id")    
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';    

    // Formatting function for row details - modify as you need   
    var table1 = new DataTable('#daily_table', {   
        ajax: {
            url:'rcd_daily/server1.php',
            data: function ( d ) {
                d.clerkid = cookie_id
            }
        },                     
        processing: true,
        serverSide: false,       
        pageLength: 50,                   
        order:[0,'asc'],       
        columnDefs: [         
            {
                target: [0,1,2,3,5,9,10,11,12,13],
                visible: false,
                searchable: false
            },   
            {
                targets:[4],
                render: DataTable.render.moment( 'MM/DD/YYYY' )
            },
            {
                target:[8],
                render: $.fn.dataTable.render.number( ',', '.', 2 )
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
                    window.open('rcd_daily/preview_rcd.php?clerkid='+cookie_id, '_blank', 'menubar=no', 'height=600', 'width=800', 'resizable=yes', 'scrollbars=yes')                     
                }
            },
            'colvis',
            'searchBuilder',
        ]                               
    });

        $('#daily_table tbody').on('click', '.btn-success', function(){
            var data = table1.row($(this).parents('tr')).data(); 
            $('#daily_modal').modal('show')
            $('#id').val(data[0])
            $('#payor').val(data[5])
            $('#ngascode').val(data[6])
            
            $( '#add_subclass_select' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),                
            //dropdownParent: $('#daily_modal'),
            allowClear: true,
            selectionCssClass: 'select2--large',
            dropdownCssClass: 'select2--large',
            ajax: {
                url: "daily/property_selection.php",
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
        }).on('select2:select', function(event) {
            var additional = event.params.data
            var amount = additional.amount
            var ngascode = additional.ngascode
            $('#amount').val(amount) 
            $('#ngascode').val(ngascode)
        }).on('select2:clear', function(event) {
            
        });

       
    })



    

    $('#daily_table tbody').on('click', '.btn-danger', function(){
        var data = table1.row($(this).parents('tr')).data(); 
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "rcd_daily/delete.php",
                    data:{id:data[0]},
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Delete Successfully',                          
                            timer: 3000,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                        }).then(function(){
                            window.location.reload(true);
                        }) 
                    }
                });                
            }
        });            
    })

    $('#daily_submit_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "rcd_daily/edit.php",
            data:$(this).serialize(),
            success: function (response) {
                /*
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Edit Successfully',                          
                    timer: 3000,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                }).then(function(){
                    window.location.reload(true);
                }) 
                */
            }
        });
    })
   
    
})

