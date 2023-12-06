$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    
    

    var table1 = new DataTable('#que_table', {                        
        ajax: 'home/server1.php',
        processing: true,
        serverSide: false,
        searching:   false,
        
        pageLength: 5,   
        order:[1,'asc'],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },   
            {
                targets: 3,
                data: null,
                defaultContent: '<button class="btn btn-primary btn-sm mb-1 mx-1"><i class="fa-solid fa-check"></i></button><button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-coins"></i></button>',
            },                                            
        ],
        dom: 'Blfrtip',               
        buttons: [ 
            {
                extend: 'collection',                
                className:'btn btn-success btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-gear"></i> Options',
                autoClose:true,
                buttons: [ 
                    {                                  
                        text: '<i class="fa fa-file" aria-hidden="true"></i> Finish Remaining Que',
                        action: function ( e, dt, node, config ){
                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, Finish Entire Que!"
                              }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: "POST",
                                        url: "home/reset_entire.php",
                                        data:{clerkid:cookie_id},
                                        dataType: "json",
                                        success: function (data) {                        
                                            Swal.fire({
                                                icon: "success",
                                                title: "Success!",
                                                text: "Entire Que Finished!",
                                                timer: 3000,
                                            }).then(function(){
                                                window.location.reload(true)
                                            });
                                        },
                                        
                                    });
                                }
                            });                           
                        }
                    }, 
                    '<hr>',
                    {                           
                        extend: 'selectAll',                
                        className:'btn btn-success btn-sm mb-1 mx-1',
                        text: '<i class="fa-solid fa-check-double"></i> Select All Page',
                        autoClose: true, 
                        selectorModifier: function () {
                            return {
                                search: 'applied'
                            }
                        }                       
                                               
                    },
                    {
                        extend: 'selectAll',
                        className:'btn btn-success btn-sm mb-1 mx-1',
                        text: '<i class="fa-solid fa-check"></i> Select All Current Page',
                        autoClose: true,
                        selectorModifier: function () {
                            return {
                                page: 'current'
                            }
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
        ], 
            
    });

    $('#que_table tbody').on('click', '.btn-success', function () {
        var data = table1.row( $(this).parents('tr') ).data();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Start Priority!"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "home/start_priority.php",
                    data:{clerkid:cookie_id,id:data[0]},
                    success: function (data) {                        
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Next Client Que Started!",
                            timer: 3000,
                        }).then(function(){
                            window.location.reload(true)
                        });
                    },
                    
                });
            }
        });
    })

    callerFunction()
    function callerFunction() {
        $.ajax({
            type: "POST",
            url: "home/que_list.php",
            data:{clerkid:cookie_id},
            dataType: "json",
            success: function (data) {             
                var que_id = data.que_id;
                $('#que_data').html(data.que_number)                
                //setTimeout(callerFunction, 1000);
                $('#next').on('click', function(){
                    $.ajax({
                        type: "POST",
                        url: "home/check_que.php",
                        dataType: "json",
                        success: function (response) { 
                            if(response == 0){
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, Start Que!"
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            type: "POST",
                                            url: "home/start.php",
                                            data:{clerkid:cookie_id},
                                            success: function (data) {                        
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Success!",
                                                    text: "Next Client Que Started!",
                                                    timer: 3000,
                                                }).then(function(){
                                                    window.location.reload(true)
                                                });
                                            },
                                            
                                        });
                                    }
                                });
                            }else{
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, Next Que!"
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            type: "POST",
                                            url: "home/next.php",
                                            data:{que_id:que_id,clerkid:cookie_id},
                                            success: function (data) {                        
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Success!",
                                                    text: "Next Client Que Started!",
                                                    timer: 3000,
                                                }).then(function(){
                                                    window.location.reload(true)
                                                });
                                            },
                                            
                                        });
                                    }
                                });
                            }
                        },
                        
                    });                    
                })

                $('#pay').on('click', function(){
                    $.ajax({
                        type: "POST",
                        url: "home/check_que.php",
                        dataType: "json",
                        success: function (response) { 
                            if(response == 0){
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, Start Que!"
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            type: "POST",
                                            url: "home/start.php",
                                            data:{clerkid:cookie_id},
                                            success: function (data) {                        
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Success!",
                                                    text: "Next Client Que Started!",
                                                    timer: 3000,
                                                }).then(function(){
                                                    //window.location.reload(true)
                                                });
                                            },
                                            
                                        });
                                    }
                                });
                            }else{
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, Next Que!"
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            type: "POST",
                                            url: "home/pay_next.php",
                                            data:{que_id:que_id,clerkid:cookie_id},
                                            success: function (data) {                        
                                                Swal.fire({
                                                    icon: "success",
                                                    title: "Success!",
                                                    text: "Next Client Que Started!",
                                                    timer: 3000,
                                                }).then(function(){
                                                    //window.location.reload(true)
                                                });
                                            },
                                            
                                        });
                                    }
                                });
                            }
                        },
                        
                    });                    
                })

                
                $('#reset').on('click', function(){
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Reset Que!"
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "home/reset.php",
                                data:{clerkid:cookie_id},
                                success: function (result) {                        
                                    if(result == 0){
                                        Swal.fire({
                                            icon: "success",
                                            title: "Success!",
                                            text: "Successfully Resetted!",
                                            timer: 3000,
                                        }).then(function(){
                                            window.location.reload(true)
                                        });
                                    }else{
                                        Swal.fire({
                                            icon: "warning",
                                            title: "Warning!",
                                            text: "Remaing Active Que Detected!",
                                            timer: 3000,
                                        }).then(function(){
                                            window.location.reload(true)
                                        });
                                    }
                                },
                                
                            });
                        }
                    });
                })



            },
            
        });
        table1.ajax.reload();
    }

    
})