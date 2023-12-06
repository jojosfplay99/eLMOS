
$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    var action_status;

    var table1 = new DataTable('#example', {
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;
    
                    // Create input element
                    let input = document.createElement('input');
                    input.placeholder = title;
                    column.footer().replaceChildren(input);
    
                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                }); 
                
            
        },        
        ajax: 'revision/server1.php',
        processing: true,
        serverSide: false, 
        deferRender: true,  
        fixedColumns: {
            left: 1,
            right: 1
        },
        scrollCollapse: true,
        scrollX: true,
        scrollY: true,
        order:[[3,'asc'],[6,'asc']],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },                 
           
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1 "><i class="fa-solid fa-eye"></i></button>',
            },            
        ],
        dom: 'Blfrtip',
        rowId: 'id',
        select: {                
            style:    'multi',
            selector: 'td:first-child'
        },
        buttons: [ 
            {
                extend: 'collection',                
                className:'btn btn-primary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-file-export"></i> Revised Option',
                buttons: [ 
                    {                
                        text: '<i class="fa-solid fa-file-export"></i> Apply New Computation',
                        action: function ( e, dt, node, config ){
                            var values = table1.rows( { selected: true } ).data().pluck(0).toArray()
                            var total_length = values.length
                            if(values.length == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Nothing is Selected!',                          
                                })
                            }else{
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, Apply it!"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var counter = 0;
                                        setNewComputation(total_length,counter,values) 
                                        Swal.fire({
                                            title: 'Please Wait!',
                                            html: '<div id="progressbar"></div>',                                                     
                                            icon:'warning',
                                            allowOutsideClick: false,   
                                            showConfirmButton:false,                                                                                                                                                         
                                        }); 
                                    }
                                });
                            }
                        }
                    },
                    {               
                        text: '<i class="fa-solid fa-file-export"></i> Assign Taxdec Number',
                        action: function ( e, dt, node, config ){
                            var revise_barangays = $('#revise_barangay').val();
                            if(revise_barangays == ''){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No Barangay Selected!',
                                })
                            }else{
                                table1.column( 6 ).search(revise_barangays).draw(); 
                                table1.rows( { search: 'applied' } ).select()                    
                                $('#filter_barangay').modal('show') 
                                var revise_prefix = $('#prefix').val();
                                $('#barangay_name').val(revise_barangays)                        
                                $.ajax({
                                    method: "POST",
                                    url: "revision/tdno_prefix.php",            
                                    data:{prefix:revise_prefix,barangay:revise_barangays},                                                                                                                                                                    
                                    success: function(data) {  
                                        var result = JSON.parse(data);
                                        $('#prefix').val(result.prefix_tdno)     
                                        $('#latest_tdno').val(result.tdno) 
                                        $('#barangay_code').val(result.code) 
                                        $('#no_taxdec').val(result.count)                            
                                    }
                                });  
                            }
                                              
                        }
                    }, 
                ]
            },                       
            {
                extend: 'collection',                
                className:'btn btn-success btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-file-export"></i> Export Option',
                buttons: [ 
                    'print','excel','pdf'
                ]
            },

        ],       
    });

    $('#example tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data();  
        $.redirect("view_taxdec.php", {next_id: data[0]}, "POST", "");
        $('#next_id').val(data[0])
    })


    const myTimeout = setTimeout(reDrawData, 300);

    function reDrawData() {
        table1.draw()
    } 
    
    $('#revise_submit').on('submit', function(){
        event.preventDefault();
        var values = table1.rows( { selected: true } ).data().pluck(0).toArray()
        var total_length = values.length        
        if(values.length == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nothing is Selected!',                          
            })
        }
        else{
            Swal.fire({
                title: 'Assign TDNO to selected data?',
                text: "Are you sure?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#24a0ed',
                cancelButtonColor: '#808080',
                confirmButtonText: 'Confirm!'
            }).then((result) => {
                if(result.isConfirmed){ 
                    var counter = 0;
                    var clerkid = cookie_id;   
                    var starting_taxdec = $('#start_taxdec').val();  
                    var barangay_code = $('#barangay_code').val();    
                    setAssignData(total_length,counter,values,starting_taxdec,barangay_code) 
                    Swal.fire({
                        title: 'Please Wait!',
                        text: 'Do Not Refresh the Page!',
                        html: '<div class="text-center" id="data_value"></div><br><div id="progressbar"></div>',                                                     
                        icon:'warning',
                        allowOutsideClick: false,   
                        showConfirmButton:false,                                                                                                                                                         
                    }); 
                }
            })                                                                                             
        }                
    });
    
    //START SET ASSIGN RECURSIVE DATA
    function setAssignData(total_length,counter,values,starting_taxdec,barangay_code){ 
        console.log(starting_taxdec)       
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "revision/set_assign.php",            
                data:{id:values[counter],counter:counter,total_length:total_length,starting:starting_taxdec,barangay_code:barangay_code},                                                                                                                                                                    
                success: function(data) {  
                    var results = JSON.parse(data);
                    var final_length = total_length - 1
                    var current_percentage = results.counter / final_length; 
                    var percentage = current_percentage * 100;
                    var percentage = Math.floor(percentage);                                                                
                    $( "#progressbar" ).progressbar({
                        value: percentage,                                                                      
                        create: function(event, ui) {
                            $(this).find('.ui-widget-header').css({'background-color':'#1E90FF'})
                        }
                    });                                                             
                    var counter = results.next_counter
                    var starting_taxdec = results.next_tdno
                    var barangay_code = results.barangay_code
                    setAssignData(total_length,counter,values,starting_taxdec,barangay_code);                                
                }
            });                                                  
        }
        else{
            swal.close();
            Swal.fire({                                             
                title: 'Successfully Finalized!',
                icon: 'success',
                showConfirmButton: false,   
                timer: 2000                         
            }).then(function(){
                window.location.reload(true);
            });
        }        
    } 

    $('#unlock').on('click', function(){
        $('#update_change').prop('disabled', false);
        $('#unlock').prop('disabled', true);
        $('#prefix').prop('readonly', false);
    });   

    $('#update_change').on('click', function(){
        $('#unlock').prop('disabled', false);
        $('#update_change').prop('disabled', true);
        $('#prefix').prop('readonly', true);
        var prefix_value = $('#prefix').val();
        $.ajax({
            method: "POST",
            url: "revision/update_prefix.php",            
            data:{prefix:prefix_value},                                                                                                                                                                    
            success: function(data) { 
                var result = JSON.parse(data) 
                $('#prefix').val(result.prefix)  
                alert(result.tdno)
                $('#update_tdno').toast('show')
            }
        });
    });

    $('#revise_barangay').on('keyup', function(){
        var revise_barangays = $('#revise_barangay').val();
        table1.column( 6 ).search(revise_barangays).draw();                                                        
        /*
        table1.rows().deselect();
        table1.buttons( '.revise' ).disable();
        extra_button1() 
        */
    });

    function setNewComputation(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "revision/set_new_computation.php",            
                data:{id:values[counter],counter:counter,total_length:total_length},                                                                                                                                                                    
                success: function(data) {  
                    var results = JSON.parse(data);
                    var final_length = total_length - 1
                    var current_percentage = results.counter / final_length; 
                    var percentage = current_percentage * 100;
                    var percentage = Math.floor(percentage);                                                                
                    $( "#progressbar" ).progressbar({
                        value: percentage,                                                                      
                        create: function(event, ui) {
                            $(this).find('.ui-widget-header').css({'background-color':'#1E90FF'})
                        }
                    });                                                             
                    var counter = results.next_counter
                    setNewComputation(total_length,counter,values);                                
                }
            });                                                  
        }
        else{
            swal.close();
            Swal.fire({                                             
                title: 'Successfully Revised!',
                icon: 'success',
                showConfirmButton: false,   
                timer: 2000                         
            }).then(function(){
                window.location.reload(true);
            });
        }        
    }
    
});    
