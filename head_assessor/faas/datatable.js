$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
    var table1 = new DataTable('#example', {                        
        ajax: 'faas/server1.php',
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
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-eye"></i></button>',
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
                text: '<i class="fa-solid fa-plus"></i> Add New',
                autoClose:true,
                buttons: [ 
                    {              
                        text: 'Add Manually',
                        action: function ( e, dt, node, config ){
                            
                        }
                    },
                    {              
                        text: 'Add from Taxdec',
                        action: function ( e, dt, node, config ){
                            window.location.href='add_faas.php'
                        }
                    },
                ]
            },                                                                      
            {
                extend: 'collection',                
                className:'btn btn-primayr btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-filter"></i> Filter by Property Kind',
                autoClose:true,
                buttons: [                    
                    {              
                        text: 'Land',
                        action: function ( e, dt, node, config ){
                            table1.column( 7 ).search( 'LAND' ).draw();                                                        
                            table1.rows().deselect();
                            table1.buttons( '.revise' ).disable();
                            extra_button1()                          
                        }
                    },
                    {              
                        text: 'Building',
                        action: function ( e, dt, node, config ){                            
                            table1.column( 7 ).search( 'BUILDING' ).draw(); 
                            table1.rows().deselect();
                            table1.buttons( '.revise' ).enable();
                            extra_button2()    
                        }
                    },
                    {              
                        text: 'Machinery',
                        action: function ( e, dt, node, config ){
                            table1.column( 7 ).search( 'MACHINERY' ).draw(); 
                            table1.buttons( '.revise' ).disable();
                            table1.rows().deselect();
                            extra_button3()                            
                            
                        }
                    },
                    
                    {              
                        text: '-Reset-',
                        action: function ( e, dt, node, config ){
                            window.location.reload(true);                            
                        }
                    },
                ]
            },           
          

            
            {
                extend: 'collection',                
                className:'btn btn-secondary btn-sm mb-1 mx-1',
                text: '<i class="fa-solid fa-file-export"></i> Export Option',
                buttons: [ 'csv', 'excel', 'pdf', 'print' ]
            },                                         
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

    const myTimeout = setTimeout(reDrawData, 300);

    function reDrawData() {
        table1.draw()
    } 


    $('#example tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data();  
        $.redirect("view_faas.php", {next_id: data[0]}, "POST", "");
    })

})