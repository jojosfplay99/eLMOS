

$(document).ready(function(){
    var cookie_id = Cookies.get("id")    
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';    

    // Formatting function for row details - modify as you need   
    var table1 = new DataTable('#daily_table', {   
        ajax: {
            url:'rcd_burial/server3.php',
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
                target: [0,1,2,5,6,7,8,9,10,11,12,13,14,15,16,18,19,20,21,22,23],
                visible: false,
                searchable: false
            },
            {
                targets:[4],
                render: DataTable.render.moment( 'MM/DD/YYYY' )
            },                               
            {
                targets:[17],
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
                    window.open('rcd_burial/preview_rcd.php?clerkid='+cookie_id, '_blank', 'menubar=no', 'height=600', 'width=800', 'resizable=yes', 'scrollbars=yes')                     
                }
            },
            'colvis',
            'searchBuilder',
        ]                               
    });


    $('#daily_table tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data();     
        $('#burial_modal').modal('show')
        $('#id').val(data[0])
        $('#transnum').val(data[1])
        $('#clerkid').val(data[18])
        $('#ornumber').val(data[3])
        $('#payor').val(data[2])
        $('#applicant').val(data[5])
        $('#municipality').val(data[6])
        $('#province').val(data[7])
        $('#dated').val(data[4])
        $('#deceased_person').val(data[8])
        $('#nationality').val(data[9])
        $('#age').val(data[10])
        $('#gender').val(data[11]).trigger('change')
        $('#causeofdeath').val(data[12])
        $('#cemetery').val(data[13])
        $('#ini').val(data[14]).trigger('change')
        $('#ene').val(data[15]).trigger('change')
        $('#dor').val(data[16])
        $('#fee').val(data[17])
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
                    url: "rcd_burial/delete.php",
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

    $('#burial_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "rcd_burial/edit.php",
            data:$(this).serialize(),
            success: function (response) {
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
            }
        });
    })
   
    
})

