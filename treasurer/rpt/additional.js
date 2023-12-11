$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var transaction_code = $('#transaction_code').val();
    var or_id = $('#or_id').val();
    $('#clerkid').val(cookie_id)
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    const myTimeout = setTimeout(myGreeting, 1000);

    function myGreeting() {
        table1.draw()
    }
    $.ajax({
        type: "POST",
        url: "rpt/check_or.php",
        data:{or_id:or_id},
        dataType: "json",
        success: function (response) { 
            $('#ornumber').val(response.ornumber)
            $('#ornumber1').val(response.ornumber)
        }
    })

    // Formatting function for row details - modify as you need
    function format(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" style="border:solid 1px;padding-left:50px;width:100%;">'+
        '<tr>'+
            '<td style="text-align:start;border:solid 1px;font-size:20px;font-family:Times New Roman, Times, serif">TAXDUE: ₱<span style="font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">'+$.number(d[6],2)+'</span></td>'+
            '<td style="text-align:start;border:solid 1px;font-size:20px;font-family:Times New Roman, Times, serif">PENALTIES: ₱<span style="font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">'+$.number(d[9],2)+'</span></td>'+
            '<td style="text-align:start;border:solid 1px;font-size:20px;font-family:Times New Roman, Times, serif">DISCOUNT: ₱<span style="font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">'+$.number(d[10],2)+'</span></td>'+
        '</tr>'+
        '<tr style="border:solid 1px;">'+
            '<td style="text-align:start;border:solid 1px;font-size:20px;font-family:Times New Roman, Times, serif">TOTAL TAXDUE: ₱<span style="font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">'+$.number(d[11],2)+'</span></td>'+
            '<td style="text-align:start;border:solid 1px;font-size:20px;font-family:Times New Roman, Times, serif">BASIC: ₱<span style="font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">'+$.number(d[7],2)+'</span></td>'+
            '<td style="text-align:start;border:solid 1px;font-size:20px;font-family:Times New Roman, Times, serif">SEF: ₱<span style="font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif;">'+$.number(d[8],2)+'</span></td>'+            
        '</tr>'+
        
    '</table>'
    }

    function addCell(tr, content, colSpan = 1) {
        let td = document.createElement('th');
    
        td.colSpan = colSpan;
        td.textContent = content;
    
        tr.appendChild(td);
    }

    $('#rpt_table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#rpt_table thead');

    var table1 = new DataTable('#rpt_table', {                        
        ajax: {
            url:'rpt/server1.php',
            data: function ( d ) {
                d.clerkid = cookie_id
                d.transaction_code = transaction_code
            }
        },
        processing: true,
        serverSide: false,
        info:     false,  
        pageLength: 50,                   
        order:[0,'asc'],
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
        columnDefs: [
            /*
            {
                target: [0,2,6,7,8,9,10,11,13],
                visible: false,
                searchable: false
            },
            */
            {
                target: [0,2,3,4,5,6,7,8,9,10,11,13,17],
                visible: false,
                searchable: false
            },  
            {
                targets: 1,
                data: null,
                defaultContent: '<i class="fa-solid fa-circle-play dt-control" style="transform: scale(1.6);"></i>',
            },   
            {
                targets: [5,6,7,8,9,10,11],
                render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
            },
            {
                targets: 15,
                render: function ( data, type, row, meta ) {                    
                    if(data == 'PENDING'){
                        return '<button class="btn btn-danger btn-sm btn-squared">PENDING</button>';
                    }else if(data == 'PAID'){
                        return '<button class="btn btn-primary btn-sm btn-squared">PAID</button>';
                    }else if(data == 'IN TRANSACTION'){
                        return '<button class="btn btn-warning btn-sm btn-squared">IN TRANSACTION</button>';
                    }
                }
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
                text: '<i class="fa fa-plus" aria-hidden="true"></i> Add Computation',
                className: 'btn btn-primary btn-squared btn-sm',
                action: function ( e, dt, node, config ){
                    $('#rpt_modal').modal('show');
                    $('#transaction_code1').val($('#transaction_code').val())
                    $('#ornum1').val($('#ornumber').val())
                }
            },                                                                                                                               
        ],  
        rowGroup: {
            startRender: function (rows, group) {
                let final = table1.rows( ).data(0);
                let tr = document.createElement('tr');    
                addCell(tr,'',16);                   
                return tr;
            },
            dataSrc: 17
        }  
            
    });

    // Add event listener for opening and closing details
    table1.on('click', '.dt-control', function (e) {
        let tr = e.target.closest('tr');
        let row = table1.row(tr);
    
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
        }
        else {
            // Open this row
            row.child(format(row.data())).show();
        }
    });

   

    $('#rpt_table tbody').on('click', '.btn-success', function(){
        var data = table1.row( $(this).parents('tr') ).data();
        if(data[15] == 'PAID'){
            Swal.fire({
                icon: "error",
                title: "Oops!",
                text: "Already Paid!",
                timer: 3000,
            }).then(function(){
                window.location.reload(true)
            })
        }else{
            $('#rpt_payment_modal').modal('show')            
            $('#transaction_code1').val(transaction_code)
            $('#clerkid1').val(cookie_id)
            $('#id1').val(data[0])
            $('#propertyid1').val(data[2])
            $('#tdno1').val(data[3])
            $('#assessedvalue1').val(data[5])
            $('#taxyear1').val(data[4])
            $('#due_date').val(data[12])
            $('#taxdue1').val(data[6])
            $('#discount1').val(data[10])
            $('#penalty1').val(data[9])
            $('#total_taxdue1').val(data[11])
            $('#basic1').val(data[7])
            $('#sef1').val(data[8])
            $('#compute_code1').val(data[17])            
            $('#payment_mode1').val(data[16])
            $('#tags').val(data[18])


            var date_create=new Date(data[14]);
            var dated_today=new Date();
            //var date_create= dated.getFullYear()+"-"+(dated.getMonth()+1)+"-"+dated.getDate();

            var due_dated=new Date(data[12]);
            //var due_dated= dated2.getFullYear()+"-"+(dated2.getMonth()+1)+"-"+dated2.getDate();

            if(date_create < due_dated){
                if(due_dated < dated_today){
                    // Calculate the difference in months
                    var months = (due_dated.getFullYear() - dated_today.getFullYear()) * 12 + (due_dated.getMonth() - dated_today.getMonth());
                    var final_month = Math.abs(months)
                    var penalty_month_per = final_month * .02;
                    var penalty_additional = parseFloat(data[11]) * parseFloat(penalty_month_per)
                    var total_add = parseFloat(penalty_additional) + parseFloat(data[11])
                    $('#additional_penalties').val(penalty_additional.toFixed(2))
                }else{
                    var penalty_additional = 0;
                    $('#additional_penalties').val(penalty_additional.toFixed(2))
                }
            }else{
                var penalty_additional = 0;
                $('#additional_penalties').val(penalty_additional.toFixed(2))
            }
            
            var grandtotal1 = parseFloat(data[11]) + parseFloat(penalty_additional)
            $('#grand_total_taxdue1').val(grandtotal1.toFixed(2))                    

           
            
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
                $.ajax({
                    type: "POST",
                    url: "rpt/add_payment.php",
                    data:$(this).serialize(),
                    success: function (data) {                                              
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Successfully Deleted!",
                            timer: 3000,
                        }).then(function(){
                            //window.location.reload(true)
                            $('#rpt_payment_modal').modal('hide')
                        });
                
                    },                                        
                });
            }
        }); 
    })

    $('#rpt_table tbody').on('click', '.btn-delete', function(){
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
                    url: "rpt/delete_computation.php",
                    data:{id:data[0]},
                    success: function (data) {                        
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Successfully Deleted!",
                            timer: 3000,
                        }).then(function(){
                            window.location.reload(true)
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
        dropdownParent: $('#rpt_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "rpt/property_selection.php",
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
        var additional = event.params.data;
        $('#tdno').val(additional.tdno)
        $('#assessedvalue').val(additional.assessedvalue)
        var assessedvalue = $('#assessedvalue').val();
        //DISCOUNT PENALTY
        var date_start = $('#date_start').val();
        var taxyear = $('#taxyear').val();
        var date_start2 = date_start.split("-")
        var taxyear2 = taxyear.split("-")
        var tax_per = $('#tax_per').val();
        var tax_per_value = parseFloat(tax_per) / 100;
        var taxdue = tax_per_value * assessedvalue;

        if(taxyear2[0] == date_start2[0]){
            if(taxyear2[1] == '01' || taxyear2[1] == '02' || taxyear2[1] == '03'){
                var discount = parseFloat(taxdue) * .10;
                var penalty = 0;
            }else{
                var penalty_count = parseFloat(taxyear2[1]) * .02;                
                var penalty= parseFloat(taxdue) * parseFloat(penalty_count);
                
                var discount = 0;
            }
            $('#discount').val(discount.toFixed(2))
            $('#penalty').val(penalty.toFixed(2))
        }
        var total_taxdue = parseFloat(taxdue) - parseFloat(discount);
        var total_taxdue = parseFloat(total_taxdue) + parseFloat(penalty);
    
        var payment_mode = $('#payment_mode').val();

        if(payment_mode == 'ANNUAL'){
            var total_taxdue2 = total_taxdue;            
        }else if(payment_mode == 'SEMI ANNUAL'){
            var total_taxdue2 = parseFloat(total_taxdue) / 2;
        }else if(payment_mode == 'QUARTERLY'){
            var total_taxdue2 = parseFloat(total_taxdue) / 4;
        }         
        
        //TAX DUE
       
        
        var basic_sef = parseInt(total_taxdue2) / 2;
        $('#taxdue').val(taxdue.toFixed(2))
        $('#total_taxdue').val(total_taxdue.toFixed(2))
        $('#grand_total_taxdue').val(total_taxdue2.toFixed(2))
        $('#basic').val(basic_sef.toFixed(2))
        $('#sef').val(basic_sef.toFixed(2))

        
    }).on('select2:clear', function(event) {
        
    });

    $('#date_start, #taxyear, #tax_per , #payment_mode').on('change keyup', function(){
        var assessedvalue = $('#assessedvalue').val();
        //DISCOUNT PENALTY
        var date_start = $('#date_start').val();
        var taxyear = $('#taxyear').val();
        var date_start2 = date_start.split("-")
        var taxyear2 = taxyear.split("-")
        var tax_per = $('#tax_per').val();
        var tax_per_value = parseFloat(tax_per) / 100;
        var taxdue = tax_per_value * assessedvalue;
        var year_count = parseInt(taxyear2[0]) - parseInt(date_start2[0]);
        var year_count = Math.abs(year_count)
        var year_count2 = parseInt(year_count) * 12; 
        var total_month = parseInt(year_count2) + parseInt(taxyear2[1])
        var penalty_per = parseInt(total_month) * .02;       
        if(year_count == 0){
            if(taxyear2[1] == '01' || taxyear2[1] == '02' || taxyear2[1] == '03'){
                var discount = parseFloat(taxdue) * .10;
                var penalty = 0;
            }else{                
                var penalty= parseFloat(taxdue) * parseFloat(penalty_per);                
                var discount = 0;
            }            
        }else if(year_count == 1){            
            var penalty= parseFloat(taxdue) * parseFloat(penalty_per);                
            var discount = 0;
        }
        else if(year_count == 2){                        
            var penalty= parseFloat(taxdue) * parseFloat(penalty_per);                
            var discount = 0;
        }else if(year_count > 2){            
            var penalty_per = .72
            var penalty= parseFloat(taxdue) * parseFloat(penalty_per);                
            var discount = 0;
        }     

        $('#discount').val(discount.toFixed(2))
        $('#penalty').val(penalty.toFixed(2))
        var total_taxdue = parseFloat(taxdue) - parseFloat(discount);
        var total_taxdue = parseFloat(total_taxdue) + parseFloat(penalty);
    
        var payment_mode = $('#payment_mode').val();

        if(payment_mode == 'ANNUAL'){
            var total_taxdue2 = total_taxdue;            
        }else if(payment_mode == 'SEMI ANNUAL'){
            var total_taxdue2 = parseFloat(total_taxdue) / 2;
        }else if(payment_mode == 'QUARTERLY'){
            var total_taxdue2 = parseFloat(total_taxdue) / 4;
        }         
        
        //TAX DUE        
        var basic_sef = parseInt(total_taxdue2) / 2;
        $('#taxdue').val(taxdue.toFixed(2))
        $('#total_taxdue').val(total_taxdue.toFixed(2))
        $('#grand_total_taxdue').val(total_taxdue2.toFixed(2))
        $('#basic').val(basic_sef.toFixed(2))
        $('#sef').val(basic_sef.toFixed(2))
    })


    $('#rpt_submit_form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "rpt/check_rptcomputation.php",
            data:$(this).serialize(),
            success: function (data) {                        
                if(data == 0){
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to add this computation?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Add It!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "rpt/add_rptcomputation.php",
                                data:$('#rpt_submit_form').serialize(),
                                success: function (data) {                        
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success!",
                                        text: "Successfully Added!",
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
                        icon: "error",
                        title: "Error!",
                        text: "Computation Exist! Please use / delete existing computation!",
                        timer: 4000,
                    }).then(function(){
                        window.location.reload(true)
                    });
                }
            },                                        
        });        
    })

    var table2 = new DataTable('#rpt_table2', {   
        ajax: {
            url:'rpt/server2.php',
            data: function ( d ) {
                d.transaction_code = transaction_code
            }
        },                     
        processing: true,
        serverSide: false,
        info:     false,  
        searching:     false,  
        paging:     false,  
        pageLength: 50,                   
        order:[0,'asc'],        
        columnDefs: [                        
            {
                target: [0,1,2,3,14,15,16,17,19],
                visible: false,
                searchable: false
            },            
            {
                targets: [6,7,8,9,10,11,12,13],
                render: $.fn.dataTable.render.number( ',', '.', 2, '₱ ' )
            },              
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-check"></i></button><button class="btn btn-danger btn-delete btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
            },                                            
        ],                                    
    });


    $('#payment_btn').on('click', function(e){
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to Finalize this payment?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Pay It!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "rpt/payment.php",
                    data:{transaction_code:transaction_code,clerkid:cookie_id},
                    success: function (data) {                                                
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Successfully Deleted!",
                            timer: 3000,
                        }).then(function(){
                           window.location.href="rcd_rpt.php" 
                        });                        
                    },                                        
                });
            }
        }); 
    })

    ///

    $( '#payor_listing_modal' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        //dropdownParent: $('#rpt_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "rpt/payor_listing.php",
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
        var additional = event.params.data;
       
    }).on('select2:clear', function(event) {
        
    });


})

