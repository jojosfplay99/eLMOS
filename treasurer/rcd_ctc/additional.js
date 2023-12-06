

$(document).ready(function(){
    var cookie_id = Cookies.get("id")    
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';    

    // Formatting function for row details - modify as you need   
    var table1 = new DataTable('#daily_table', {   
        ajax: {
            url:'rcd_ctc/server1.php',
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
                target: [0,3,4,5,6,7,8,,9,10,11,16,17,18,19,20,21,22,23],
                visible: false,
                searchable: false
            },
            {
                targets:[8],
                render: DataTable.render.moment( 'MM/DD/YYYY' )
            },
            {
                targets:[12,13,14,15],
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
                    window.open('rcd_ctc/preview_rcd.php?clerkid='+cookie_id, '_blank', 'menubar=no', 'height=600', 'width=800', 'resizable=yes', 'scrollbars=yes')                     
                }
            },
            'colvis',
            'searchBuilder',
        ]                               
    });


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
                    url: "rcd_ctc/delete.php",
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

    $('#daily_table tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data(); 
        $('#ctc_modal').modal('show')
        $('#id').val(data[0])
        $('#ornumber').val(data[17])
        $('#transaction_code').val(data[2])
        $('#fname').val(data[3])
        $('#mname').val(data[4])
        $('#lname').val(data[5])
        $('#gender').val(data[6])
        $('#civil_status').val(data[7])
        $('#bdate').val(data[8])
        $('#address').val(data[9])
        $('#placeofbirth').val(data[10])
        $('#citizenship').val(data[11])
        $('#ctctype').val(data[1]).trigger('change')
        if(data[1] == "REGULAR"){
            $('#basic').val('0')
        }else if(data[1] == "BUSINESS"){
            $('#basic').val('300')
        }if(data[1] == "CORPORATION"){
            $('#basic').val('500')
        }
        $('#gross').val(data[12])
        $('#taxdue').val(data[13])
        $('#interest').val(data[16])
        $('#penalty').val(data[14])
        $('#total').val(data[15])
    })

    $('#ctc_submit_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "rcd_ctc/edit.php",
            data:$(this).serialize(),
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
    })

   
    
})

