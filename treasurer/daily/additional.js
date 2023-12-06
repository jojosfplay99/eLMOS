$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var transaction_code = $('#transaction_code').val();
    var or_id = $('#or_id').val();
    $('#transaction_code2').val(transaction_code);
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    const myTimeout = setTimeout(myGreeting, 1000);

    function myGreeting() {
        table1.draw()
    }


    $.ajax({
        type: "POST",
        url: "daily/check_or.php",
        data:{or_id:or_id},
        dataType: "json",
        success: function (response) { 
            $('#ornumber').val(response.ornumber)
            $('#ornumber1').val(response.ornumber)
        }
    })

    var table1 = new DataTable('#daily_table', {                        
        ajax: {
            url: 'daily/server1.php',
            data: {
                user_id: cookie_id,
                transaction_code: transaction_code,
            }
        },
        processing: true,
        serverSide: false,                                        
        order:[0,'asc'],
        pageLength:5,
        info:false,
        orderCellsTop: true,
        fixedHeader: true,
        columnDefs: [
         
            {
                target: [0,1,2,3,4,5,9,10,11,12,13],
                visible: false,
                searchable: false
            },  
            /*           
            {
                targets: [5,6,7,8,9,10,11],
                render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
            },
            */
           
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-check"></i></button><button class="btn btn-danger btn-delete btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
            },                                            
        ],        
        dom: 'lrtip',                                   
    });

   

    $('#rpt_table tbody').on('click', '.btn-success', function(){
        var data = table1.row( $(this).parents('tr') ).data();
        if(data[15] == 'PAID'){
            
        }else{
            
            
        }
    })

    $('#rpt_payment_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to Add this computation?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Add It!"
            }).then((result) => {
            if (result.isConfirmed) {
                
            }
        }); 
    })

    $('#daily_table tbody').on('click', '.btn-delete', function(){
        var data = table1.row( $(this).parents('tr') ).data();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to Delete this computation?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete It!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "daily/delete_computation.php",
                    data:{id:data[0]},
                    success: function (data) {                        
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Successfully Deleted!",
                            timer: 3000,
                        }).then(function(){
                            table1.ajax.reload()
                        });
                    },                                        
                });
            }
        }); 
    })    

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

    $('#add_btn').on('click', function(){        
        if($('#payor').val() == '' || $('#ngascode').val() == '' || $('#amount').val() == ''){            
            Swal.fire({
                icon: "warning",
                title: "Warning!",
                text: "Empty Fields!",
                timer: 3000,
            }).then(function(){
                table1.ajax.reload()
            });
        }
        else{
            $('#payment_form').submit();
        }
    })

    $('#payment_form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "daily/add_payment.php",
            data:$(this).serialize(),
            success: function (data) {                        
                table1.ajax.reload();
            },                                        
        });        
    })

    $('#payment_btn').on('click', function(){        
        Swal.fire({
            title: "Proceed to Payment?",
            text: "Please finalise payment before proceeding!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Proceed!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "daily/payment.php",
                    data:{transaction_code:transaction_code,clerkid:cookie_id},
                    success: function (data) {                        
                        window.location.href='rcd_daily.php'
                        window.open('daily/preview_print.php?transaction_code='+transaction_code, '_blank', 'menubar=no' ,width=800, height=600)
                    },                                        
                }); 
            }
        }); 
    })

})

