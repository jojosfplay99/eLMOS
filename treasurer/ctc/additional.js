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
        }
    })

    $('#ctctype, #gross').on('keyup change', function(){
        var type = $('#ctctype').val();        
        var gross = $('#gross').val();
        var currentMonth = (new Date).getMonth() + 1;        
        var interest = currentMonth * .02;
        if(type == "REGULAR" || type == "BUSINESS"){            
            var basic = 5;  
            var dividend = 1000
            var multi = 1;                   
        }else if(type == "CORPORATION"){
            var basic = 500;            
            var dividend = 5000         
            var multi = 2;
        }else{
            var basic = 0;            
            var dividend = 0         
            var multi = 0;
        }
        var taxdue = parseFloat(gross) / parseInt(dividend)
        var penalty = parseFloat(taxdue.toFixed(2)) * parseFloat(interest.toFixed(2))
        $('#basic').val(basic.toFixed(2));
        $('#taxdue').val(taxdue.toFixed(2));
        $('#interest').val(interest.toFixed(2));
        $('#penalty').val(penalty.toFixed(2));
        var total = parseFloat(basic) + parseFloat(taxdue.toFixed(2)) + parseFloat(penalty.toFixed(2))
        $('#total').val(total.toFixed(2));
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
                    url: "ctc/payment.php",
                    data:$(this).serialize(),
                    success: function (data) {                        
                        window.location.href='rcd_ctc.php'
                        window.open('ctc/preview_print.php?transaction_code='+transaction_code, '_blank', 'menubar=no' ,width=800, height=600)
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

