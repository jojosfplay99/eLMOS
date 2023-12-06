$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var id = $('#id').val();
    $.ajax({
        method: "POST",
        url: "view_notice/fetch_data2.php",            
        data:{id:id},
        dataType: "json",
        success: function(response) {  
            $('#tdno').val(response.tdno)
            $('#ownername').html(response.property_owner)
            $('#propertylocation').val(response.property_address)
            var effectivity = response.effectivity.split("-")
            var today = new Date();
            $('#effectivity').val(today.toLocaleString('default', { month: 'long' }) + " " + effectivity[0])
            $('#assessment_propertyid').val(id)
            $('#assessment_tdno').val(response.tdno)
            $('#assessment_lotno').val(response.lotno)
            $('#assessment_ownername').val(response.property_owner)
            $('#assessment_propertylocation').val(response.property_address)
        }
    });

    $.ajax({
        method: "POST",
        url: "view_notice/fetch_data3.php",            
        data:{id:id},
        dataType: "json",
        success: function(response) {  
            var classification = response.classification;
            var classification1 = classification.toString()
            const search = ',';
            const replaceWith = '/';

            const result = classification1.replaceAll(search, replaceWith);
            $('#assessment_classification').val(response.propertykind+'-'+result)
            $('#assessment_marketvalue').val(response.marketvalue)
            $('#assessment_assessedvalue').val(response.assessedvalue)
            var percentage = $('#assessment_percentage').val()
            var percentage_val = parseInt(percentage) / 100
            var basic = parseFloat(response.assessedvalue) * percentage_val;
            var divide = basic / 2;
            $('#assessment_total').val(basic)
            $('#assessment_basic').val(divide)
            $('#assessment_sef').val(divide)

            $('#assessment_percentage').on('change keyup', function(){
                var percentage = $('#assessment_percentage').val()
                var percentage_val = parseInt(percentage) / 100
                var basic = parseFloat(response.assessedvalue) * percentage_val;
                var divide = basic / 2;
                $('#assessment_basic').val(divide)
                $('#assessment_sef').val(divide)
            })
        }
    });

    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';    
    /*
    var table1 = new DataTable('#assessment_table', {                        
        ajax: 'view_notice/server1.php',
        processing: true,
        serverSide: false,         
        order:[1,'asc'],
        columnDefs: [
            
            {
                target: [0],
                visible: false,
                searchable: false
            },   
            /*
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-file"></i></button>',
            },
                    
                                    
        ],
        dom: 'Blfrtip',                
        buttons: [             
            {                           
                text: '<i class="fa fa-plus" aria-hidden="true"></i> ADD ASSESSMENT',                
                className:'btn btn-success btn-sm mb-1 mx-1',
                autoClose: true, 
                action: function ( e, dt, node, config ){

                }                       
            },                                                                                                                             
        ], 
            
    });
    */
    var table1 = new DataTable('#example', { 
        ajax: {
            url:'view_notice/server1.php',
            data: function ( d ) {
                d.extra_search = id
            }
        },                       
        processing: true,
        serverSide: false,         
        order:[1,'asc'],
        columnDefs: [
            {
                target: [0,1,2,3],
                visible: false,
                searchable: false
            },                 
            {            
                target: [7,8,9,11,12],
                render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
            },
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
            },            
        ],
        dom: 'Blfrtip',
        buttons: [             
            {                           
                text: '<i class="fa fa-plus" aria-hidden="true"></i> ADD ASSESSMENT',                
                className:'btn btn-success btn-sm mb-1 mx-1',
                action: function ( e, dt, node, config ){
                    $('#add_assessment').modal('show')
                }                       
            },                                                                                                                             
        ],  
    });
    
    $('#example tbody').on('click', 'button', function () {
        var data = table1.row( $(this).parents('tr') ).data();
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
                    method: "POST",
                    url: "view_notice/delete_notice.php",            
                    data:{
                        id:data[0],
                    },
                    success: function(response) {  
                        Swal.fire({
                            icon: "success",
                            title: "Successfully Deleted!",
                            text: "Please Wait!",
                            timer: 2000,
                        }).then(function(){
                            window.location.reload(true);
                        });
                    }
                });
            }
        });
    })

    $('#notice_form1').on('submit', function(e){
        e.preventDefault()            
        $.ajax({
            method: "POST",
            url: "view_notice/add_notice.php",            
            data:$(this).serialize(),
            success: function(response) {  
                Swal.fire({
                    icon: "success",
                    title: "Successfully Added!",
                    text: "Please Wait!",
                    timer: 2000,
                }).then(function(){
                    window.location.reload(true);
                });
            }
        });
    })

})