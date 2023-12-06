$(document).ready(function(){
    var faasid = $('#faasid').val() 
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    function land(){
        var table_land_class = new DataTable('#land_classifications', {                               
            ajax: {
                url:'view_faas/server_classification.php',
                data: function ( d ) {
                    d.extra_search = faasid
                }
            },
            bFilter:false,
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                 
            order:[0,'asc'],
            columnDefs: [
                {
                    target: [0,1,2,5,6,8,9,10,11,12,17,18,19],
                    visible: false,
                    searchable: false
                },
                /*
                {
                    target: [0,1,2,5,6,9,10,12,13,14,15,16,17,18,19],
                    visible: false,
                    searchable: false
                },
                
            
                {
                    targets: [7,8],
                    render: $.fn.dataTable.render.number( ',', '.', 2, '' )
                },
                
                {
                    targets: [15],
                    render: $.fn.dataTable.render.number( ',', '.', 0, '', ' %' )
                },
                */
                {
                    targets: [13,16],
                    render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
                }, 
                   
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-primary btn-sm mb-1 mx-1"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
                },        
            ], 
            dom: 'Blfrtip',
            buttons:[            
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Property Classifications',
                    className:'btn btn-primary btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#add_classification_modal').modal('show')
                        $('#add_classification_form').on('submit', function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_classification.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    /*
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        //window.location.reload(true)
                                    })
                                    */                                    
                                }
                            })
                        })
                    }
                },
            ]                         
        });
    }

    function building(){
        var table_1 = new DataTable('#roofing', {                               
            ajax: {
                url:'view_faas/roofing_server.php',
                data: function ( d ) {
                    d.extra_search = taxdec_id
                }
            },
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                 
            fixedColumns: {
                left: 1,
                right: 2,
            },
            order:[0,'asc'],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
                },
                
                {
                    target: [0,1],
                    visible: false,
                    searchable: false
                },                 
                    
            ],     
            dom: 'Blfrtip',
            buttons:[
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Roofing',
                    className:'btn btn-success btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#roof_modal').modal('show')
                        $('#select_roof' ).select2( {
                            theme: "bootstrap-5",
                            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                            allowClear: true,
                            dropdownParent:$('#roof_modal'),
                            placeholder:'Select Land Taxdec',
                            selectionCssClass: 'select2--large',
                            dropdownCssClass: 'select2--large',
                            ajax: {
                                url: "view_faas/roof_selection.php",
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
                        } );
                        $('#add_roof').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_roof.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        $.redirect("view_faas.php", {next_id: data}, "POST", "");
                                    })
                                    
                                }
                            })
                        })
                    }
                },
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Roofing Material',
                    className:'btn btn-primary btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#new_roof_modal').modal('show')
                        $('#roof_selection').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_roof_selection.php",
                                data:$(this).serialize(),
                                success: function (data) {
                                
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        $.redirect("view_faas.php", {next_id: data}, "POST", "");
                                    })
                                    
                                }
                            })
                        })
                    }
                },
            ]                    
        });

        $('#roofing tbody').on('click', '.btn-danger', function(e){
            var data = table_1.row($(this).parents('tr')).data();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "view_faas/delete_roof.php",
                data:{id:data[0]},
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Added Successfully!',
                    }).then(function(){
                        window.location.reload(true)                    
                    })                
                }
            })
        })


    
        var table_2 = new DataTable('#floor_finish', {                               
            ajax: {
                url:'view_faas/floor_finish_server.php',
                data: function ( d ) {
                    d.extra_search = taxdec_id
                }
            },
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                         
            order:[0,'asc'],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
                },
                
                {
                    target: [0,1],
                    visible: false,
                    searchable: false
                },                 
                    
            ],      
            dom: 'Blfrtip',
            buttons:[
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Floor Finish',
                    className:'btn btn-success btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){    
                        $('#floor_finish_modal').modal('show')
                        $('#select_floor_finish' ).select2( {
                            theme: "bootstrap-5",
                            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                            allowClear: true,
                            dropdownParent:$('#floor_finish_modal'),
                            placeholder:'Select Land Taxdec',
                            selectionCssClass: 'select2--large',
                            dropdownCssClass: 'select2--large',
                            ajax: {
                                url: "view_faas/floor_selection.php",
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
                        })    
                        $('#floor_selection').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_floor_selection.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })                  
                    }
                },
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Floor Material',
                    className:'btn btn-primary btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#new_floor_modal').modal('show')
                        $('#add_floor').on('submit', function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_floor.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })
                    }
                },
            ]                   
        });

        $('#floor_finish tbody').on('click', '.btn-danger', function(e){
            var data = table_2.row($(this).parents('tr')).data();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "view_faas/delete_floor.php",
                data:{id:data[0]},
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Added Successfully!',
                    }).then(function(){
                        window.location.reload(true)                    
                    })                
                }
            })
        })

        var table_3 = new DataTable('#wallings', {                               
            ajax: {
                url:'view_faas/walling_server.php',
                data: function ( d ) {
                    d.extra_search = taxdec_id
                }
            },
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                         
            order:[0,'asc'],        
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
                },
                
                {
                    target: [0,1],
                    visible: false,
                    searchable: false
                }, 
                            
                    
            ],   
            dom: 'Blfrtip',
            buttons:[
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Floor Finish',
                    className:'btn btn-success btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){    
                        $('#walling_modal').modal('show')
                        $('#select_walling' ).select2( {
                            theme: "bootstrap-5",
                            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                            allowClear: true,
                            dropdownParent:$('#walling_modal'),
                            placeholder:'Select Land Taxdec',
                            selectionCssClass: 'select2--large',
                            dropdownCssClass: 'select2--large',
                            ajax: {
                                url: "view_faas/walling_selection.php",
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
                        })    
                        $('#walling_selection').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_walling_selection.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })                  
                    }
                },
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Floor Material',
                    className:'btn btn-primary btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#new_walling_modal').modal('show')
                        $('#add_walling').on('submit', function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_walls.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })
                    }
                },
            ]                      
        });

        $('#wallings tbody').on('click', '.btn-danger', function(e){
            var data = table_3.row($(this).parents('tr')).data();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "view_faas/delete_walling.php",
                data:{id:data[0]},
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Added Successfully!',
                    }).then(function(){
                        window.location.reload(true)                    
                    })                
                }
            })
        })

        var table_4 = new DataTable('#foundation', {                               
            ajax: {
                url:'view_faas/foundation_server.php',
                data: function ( d ) {
                    d.extra_search = taxdec_id
                }
            },
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                         
            order:[0,'asc'],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
                },
                
                {
                    target: [0,1],
                    visible: false,
                    searchable: false
                },                 
                    
            ],  
            dom: 'Blfrtip',
            buttons:[
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Foundation',
                    className:'btn btn-success btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){    
                        $('#foundation_modal').modal('show')
                        $('#select_foundation' ).select2( {
                            theme: "bootstrap-5",
                            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                            allowClear: true,
                            dropdownParent:$('#foundation_modal'),
                            placeholder:'Select Land Taxdec',
                            selectionCssClass: 'select2--large',
                            dropdownCssClass: 'select2--large',
                            ajax: {
                                url: "view_faas/foundation_selection.php",
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
                        })    
                        $('#foundation_selection').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_foundation_selection.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })                  
                    }
                },
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Floor Material',
                    className:'btn btn-primary btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#new_foundation_modal').modal('show')
                        $('#add_foundation').on('submit', function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_foundations.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })
                    }
                },
            ]                      
        });

        $('#foundation tbody').on('click', '.btn-danger', function(e){
            var data = table_4.row($(this).parents('tr')).data();
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: "view_faas/delete_foundations.php",
                data:{id:data[0]},
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Added Successfully!',
                    }).then(function(){
                        window.location.reload(true)                    
                    })                
                }
            })            
        })

        var table_5 = new DataTable('#additional', {                               
            ajax: {
                url:'view_faas/additional_server.php',
                data: function ( d ) {
                    d.extra_search = taxdec_id
                }
            },
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                         
            order:[0,'asc'],
            columnDefs: [
                {
                    targets: -1,
                    data: null,
                    defaultContent: '<button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
                },
                
                {
                    target: [0,1],
                    visible: false,
                    searchable: false
                },                 
                    
            ],  
            dom: 'Blfrtip',
            buttons:[
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Additional Selection',
                    className:'btn btn-success btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){    
                        $('#additional_modal').modal('show')
                        $('#select_additional' ).select2( {
                            theme: "bootstrap-5",
                            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                            allowClear: true,
                            dropdownParent:$('#additional_modal'),
                            placeholder:'Select Land Taxdec',
                            selectionCssClass: 'select2--large',
                            dropdownCssClass: 'select2--large',
                            ajax: {
                                url: "view_faas/additional_selection.php",
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
                        })    
                        $('#additional_selection').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_additional_selection.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })                  
                    }
                },
                {              
                    text: '<i class="fa-solid fa-plus"></i> Add Additional Material',
                    className:'btn btn-primary btn-sm mb-1 mx-1',
                    action: function ( e, dt, node, config ){   
                        $('#new_additional_modal').modal('show')
                        $('#add_additional').on('submit', function (e) {
                            e.preventDefault();
                            $.ajax({
                                type: "POST",
                                url: "view_faas/add_additional.php",
                                data:$(this).serialize(),
                                success: function (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Added Successfully!',
                                    }).then(function(){
                                        //window.location.reload(true)
                                    })
                                    
                                }
                            })
                        })
                    }
                },
            ]                      
        });

        $('#additional tbody').on('click', '.btn-danger', function(e){
            var data = table_5.row($(this).parents('tr')).data();
            e.preventDefault();        
            $.ajax({
                type: "POST",
                url: "view_faas/delete_add.php",
                data:{id:data[0]},
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Added Successfully!',
                    }).then(function(){
                        window.location.reload(true)                    
                    })                
                }
            })            
        })

        var table4 = new DataTable('#property_classification3', {                               
            ajax: {
                url:'view_faas/server_classification_building.php',
                data: function ( d ) {
                    d.extra_search = taxdec_id
                }
            },
            bFilter:false,
            paging: false,
            ordering: false,
            info: false,
            processing: true,
            serverSide: false,                 
            order:[1,'asc'],
            columnDefs: [
                
                {
                    target: [0,1,2,3,4,5,6,7,8,14,15,18,19],
                    visible: false,
                    searchable: false
                },
                
            
                {
                    targets: [8,9],
                    render: $.fn.dataTable.render.number( ',', '.', 2, '' )
                },
                {
                    targets: [10,13],
                    render: $.fn.dataTable.render.number( ',', '.', 0, '', ' %' )
                },
                {
                    targets: [10,13,15,16],
                    render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
                },            
            ],                                     
        });

        var table5 = new DataTable('#property_classification4', {                               
            ajax: {
                    url:'view_faas/server_classification_building.php',
                    data: function ( d ) {
                        d.extra_search = taxdec_id
                    }
                },
                bFilter:false,
                paging: false,
                ordering: false,
                info: false,
                processing: true,
                serverSide: false,                 
                order:[1,'asc'],
                columnDefs: [
                    
                    {
                        target: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,18,19,20],
                        visible: false,
                        searchable: false
                    },                
                
                    {
                        targets: [8,9],
                        render: $.fn.dataTable.render.number( ',', '.', 2, '' )
                    },
                    {
                        targets: [10,13],
                        render: $.fn.dataTable.render.number( ',', '.', 0, '', ' %' )
                    },
                    {
                        targets: [10,13,15,16],
                        render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
                    },            
                ],                       
        });
    }
})