$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var transaction_code = $('#transaction_code').val();
    var or_id = $('#or_id').val();
    $('#transaction_code').val(transaction_code);
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';

    $.ajax({
        type: "POST",
        url: "daily/check_or.php",
        data:{or_id:or_id},
        dataType: "json",
        success: function (response) { 
            $('#ornumber').val(response.ornumber)            
            $('#batch_code').val(response.batch_code)                        
        }
    })
    

    $('#form_submit').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to Pay this Transaction?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Pay It!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "burial/payment.php",
                    data:$(this).serialize(),
                    success: function (data) {                        
                        //window.location.href='rcd_ctc.php'
                        //window.open('burial/preview_print.php?transaction_code='+transaction_code, '_blank', 'menubar=no' ,width=800, height=600)
                    },                                        
                });
            }
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

