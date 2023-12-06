
$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $('#clerkid').val(cookie_id)
    var transaction_code = $('#transaction_code').val();
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';

    var table1 = new DataTable('#or_table', {                        
        ajax: 'receipts/server1.php',
        processing: true,
        serverSide: false,
        info:     false,   
        order:[0,'asc'],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },   
            {
                targets: 1,
                render: function ( data, type, row, meta ) {
                    if(data == 'CTC1'){
                        return "CTC REGULAR"
                    }else if(data == 'CTC2'){
                        return "CTC CORPORATION"
                    }else{
                        return data;
                    }
                }
                
            },                                            
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-check"></i></button><button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
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
                        text: '<i class="fa fa-plus" aria-hidden="true"></i> Add O.R. Number',
                        action: function ( e, dt, node, config ){
                            $('#or_create').modal('show');
                            $('#starting_or, #amount_or ,#padding_or').on('change keyup', function(){                                
                                $('#added').remove()
                                if($('#padding_or').val() == '' || $('#padding_or').val() == null){
                                   var padding_or = 0;
                                }else{
                                    var padding_or = $('#padding_or').val()
                                }
                                if($('#starting_or').val() == '' || $('#starting_or').val() == null){
                                   var starting_or = 0;
                                }else{
                                    var starting_or = $('#starting_or').val()
                                }
                                if($('#amount_or').val() == '' || $('#amount_or').val() == null){
                                   var amount_or = 0;
                                }
                                else{
                                    var amount_or = $('#amount_or').val()
                                }
                                
                                const values = [];                                
                                for(i=0;i<amount_or;i++){
                                    var add = parseInt(starting_or) + parseInt(i);
                                    var add1 = add.toString();                                                            
                                    var add1 = String(add1).padStart(padding_or, '0');                                    
                                    values.push(add)                                                                          
                                }
                                console.log(values)
                                var ending = values[amount_or - 1];
                                
                                var ending = ending.toString();                                                            
                                var ending = String(ending).padStart(padding_or, '0');
                                $('#ending_or').val(ending)                                   
                            })                            
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
            {
                extend: 'collection',                
                className:'btn btn-primary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-filter"></i> Filter by Form',
                autoClose:true,
                buttons: [ 
                    {                                  
                        text: 'Daily Collection',
                        action: function ( e, dt, node, config ){
                            table1.column(1).search('FORM 51').draw();                                                      
                        }
                    }, 
                    {                                  
                        text: 'RPT Collection',
                        action: function ( e, dt, node, config ){                            
                            table1.column(1).search('FORM 56').draw();                           
                        }
                    }, 
                    {                                  
                        text: 'Burial Collection',
                        action: function ( e, dt, node, config ){
                            table1.column(1).search('FORM 58').draw();                                                   
                        }
                    },
                    {                                  
                        text: 'CTC Collection',
                        action: function ( e, dt, node, config ){
                            table1.column(1).search('CTC').draw();                                    
                        }
                    },
                    {                                  
                        text: 'Reset',
                        action: function ( e, dt, node, config ){
                            table1.column(1).search('').draw();                                    
                        }
                    },                                           
                ]
            },                                                                                                                     
        ], 
            
    });

    $('#or_table tbody').on('click', '.btn-danger', function(){
        var data = table1.row($(this).parents('tr')).data();        
        Swal.fire({
            html: "<h2>Are you sure?</h2><h5>You won't be able to revert this!</h5><h6>Deleting this will also delete all connected receipts!</h6>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "receipts/delete_receipts.php",
                    data:{id:data[0],batch_code:data[6]},
                    success: function (data1) {                        
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Please Wait!",
                            timer: 3000,
                        }).then(function(){                                        
                            window.location.reload(true)
                        });
                    },                                        
                });
            }
        });
    })

    $('#or_table tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data();        
        $('#or_modal').modal('show')
        var table2 = new DataTable('#or_list', {                                
            ajax: {
                url:'receipts/server2.php',
                data: function ( d ) {
                    d.batch_code = data[6]
                }
            },
            bDestroy:true,
            processing: true,
            serverSide: false,
            info:false,   
            order:[2,'asc'],
            columnDefs: [
                {
                    target: [0],
                    visible: false,
                    searchable: false
                },   
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-check"></i></button>',
                },                                            
            ],     
        });

        $('#or_list tbody').on('click', '.btn-success', function(){
            var data = table2.row($(this).parents('tr')).data();               
            if(data[7] == 'PAID'){
                Swal.fire({
                    title: "This O.R. has been paid!",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Edit it!"
                  }).then((result) => {
                    if (result.isConfirmed) {
                        
                        if(data[1] == 'FORM51'){

                            /* TO DISABLE
                            Swal.fire({
                                icon: "warning",
                                title: "Feature Disabled!",
                                text: "Please Wait!",
                                timer: 3000,
                            }).then(function(){                                                                        
                               //$.redirect("daily_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");
                            });    
                            */
                            $.ajax({
                                type: "POST",
                                url: "receipts/use_transaction.php",
                                data:{id:data[0]},
                                success: function (data1) {                        
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success!",
                                        text: "Please Wait!",
                                        timer: 3000,
                                    }).then(function(){                                        
                                        $.redirect("daily_col.php", {or_id: data[0],transaction_code: data1}, "POST", "");
                                    });
                                },                                        
                            });                        
                        }else if(data[1] == 'FORM56'){
                            $.ajax({
                                type: "POST",
                                url: "receipts/use_transaction.php",
                                data:{id:data[0]},
                                success: function (data1) {                        
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success!",
                                        text: "Please Wait!",
                                        timer: 3000,
                                    }).then(function(){                                        
                                        $.redirect("rpt_col.php", {or_id: data[0],transaction_code: data1}, "POST", "");
                                    });
                                },                                        
                            });                            
                        }else if(data[1] == 'FORM58'){
                            /*
                            Swal.fire({
                                icon: "warning",
                                title: "Feature Disabled!",
                                text: "Please Wait!",
                                timer: 3000,
                            }).then(function(){                                                                        
                               //$.redirect("burial_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");
                            });  
                            */  
                            $.redirect("burial_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");
                                                     
                        }else if(data[1] == 'CTC1' || data[1] == 'CTC2'){
                            /*
                            Swal.fire({
                                icon: "warning",
                                title: "Feature Disabled!",
                                text: "Please Wait!",
                                timer: 3000,
                            }).then(function(){                                                                        
                               //$.redirect("ctc_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");
                            });                            
                            */
                            $.ajax({
                                type: "POST",
                                url: "receipts/use_transaction.php",
                                data:{id:data[0]},
                                success: function (data1) {                        
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success!",
                                        text: "Please Wait!",
                                        timer: 3000,
                                    }).then(function(){                                        
                                        $.redirect("ctc_col.php", {or_id: data[0],transaction_code: data1}, "POST", "");
                                    });
                                },                                        
                            }); 
                        }                        
                    }
                }); 
            }else{
                if(data[1] == 'FORM51'){
                    
                    Swal.fire({
                        icon: "warning",
                        title: "Feature Disabled!",
                        text: "Please Wait!",
                        timer: 3000,
                    }).then(function(){                                                                        
                        $.redirect("daily_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");                   
                    });    
                                      
                    
                }else if(data[1] == 'FORM56'){
                    $.redirect("rpt_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");                   
                }else if(data[1] == 'FORM58'){
                    Swal.fire({
                        icon: "warning",
                        title: "Feature Disabled!",
                        text: "Please Wait!",
                        timer: 3000,
                    }).then(function(){                                                                        
                        $.redirect("burial_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");
                    });                     
                }else if(data[1] == 'CTC1'){
                    
                    Swal.fire({
                        icon: "warning",
                        title: "Feature Disabled!",
                        text: "Please Wait!",
                        timer: 3000,
                    }).then(function(){                                                                        
                        $.redirect("ctc_col.php", {or_id: data[0],transaction_code: transaction_code}, "POST", "");
                    });                     
                                        
                }
                else if(data[1] == 'CTC2'){                    
                    Swal.fire({
                        icon: "warning",
                        title: "Feature Disabled!",
                        text: "Please Wait!",
                        timer: 3000,
                    }).then(function(){                                                                        
                        $.redirect("ctc_col.php", {or_id: data[0],transaction_code: transaction_code,type: "corporation"}, "POST", "");                   
                    });                                         
                    
                }
            }
        })
    })


    $('#or_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "receipts/generate_list.php",
            data:$(this).serialize(),
            success: function (data1) {                        
                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: "Please Wait!",
                    timer: 3000,
                }).then(function(){                                        
                    window.location.reload(true)
                });
            },                                        
        }); 
    })

    

})