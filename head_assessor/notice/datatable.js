$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';

    var table1 = new DataTable('#example', {                        
        ajax: 'notice/server1.php',
        processing: true,
        serverSide: false, 
        deferRender: true,  
        fixedColumns: {
            left: 1,
            right: 2,
        },
        scrollCollapse: true,
        scrollX: true,
        scrollY: true,
        order:[1,'asc'],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },   
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-file"></i></button>',
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
                className:'btn btn-success btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-gear"></i> Options',
                autoClose:true,
                buttons: [ 
                    {                                  
                        text: '<i class="fa fa-file" aria-hidden="true"></i> Generate Notice of Assessment',
                        action: function ( e, dt, node, config ){
                            var values = table1.rows( { selected: true } ).data().pluck(0).toArray()  
                            if(values.length == 0){
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Nothing is Selected!",
                                    timer: 3000,
                                }).then(function(){
                                    window.location.reload(true)
                                });
                            }else{                                
                                var values = values.toString()
                                //window.open('view_notice.php?id='+values, '_blank', 'menubar=no' ,width=800, height=600)                                
                            }
                            
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
            
                  //PENDING, ACTIVE, CANCELLED                                     
        ], 
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent;
    
                    // Create input element
                    let input = document.createElement('input');
                    input.id = title+'_search';
                    input.placeholder = title;
                    input.value = "";
                    column.footer().replaceChildren(input);
    
                    // Event listener for user input
                    input.addEventListener('keyup', () => {
                        if (column.search() !== this.value) {
                            column.search(input.value).draw();
                        }
                    });
                });            
        },       
    });

    // ADDITIONAL

    $('#example tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data();
        $.ajax({
            method: "POST",
            url: "notice/check_data.php",            
            data:{id:data[0]},
            dataType: "json",
            success: function(response) {  
                if(response == 0){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...No Data Detected!",
                        text: "Please wait while generating!",
                        showConfirmButton: true,
                        allowOutsideClick:false,
                        allowEscapeKey:false,
                    }).then(function(){
                        $.ajax({
                            method: "POST",
                            url: "notice/generated.php",            
                            data:{id:data[0]},
                            success: function(response) {  
                                $.redirect("view_notice.php", {next_id: data[0]}, "POST", "");                                                                                                
                            }
                        });
                    });
                }else{
                    $.redirect("view_notice.php", {next_id: data[0]}, "POST", "");                                
                }
                
            }
        });          
        
    })

    function setActiveData(total_length,counter,values){        
        if(counter < total_length){
            $('#data_value').html(counter + ' / ' + total_length);
            $.ajax({
                method: "POST",
                url: "taxdec/set_active.php",            
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
                    setActiveData(total_length,counter,values);                                
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


    const myTimeout = setTimeout(myGreeting, 1000);

    function myGreeting() {
        table1.draw()
    }
  
})