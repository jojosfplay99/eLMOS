$(document).ready(function(){
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';    
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    var table1 = new DataTable('#example', {                        
        ajax: 'certificates/server1.php',
        processing: true,
        serverSide: false,        
        order:[0,'asc'],
        columnDefs: [
            {
                target: [0],
                visible: false,
                searchable: false
            },                 
           
            {
                targets: -1,
                data: null,
                defaultContent: '<button class="btn btn-success btn-sm mb-1 mx-1"><i class="fa-solid fa-eye"></i></button><button class="btn btn-danger btn-sm mb-1 mx-1"><i class="fa-solid fa-trash"></i></button>',
            },            
        ],
        dom: 'Blfrtip',
        buttons: [ 
            {              
                text: 'Add Certifications',
                className:'btn btn-success btn-sm mb-1 mx-1',
                action: function ( e, dt, node, config ){
                    $('#add_cert').modal('show')
                }
            },                                                                                                         
        ],               
    });

    $('#example tbody').on( 'click', '.btn-danger', function (e) {
        var data = table1.row($(this).parents('tr')).data();
        e.preventDefault()
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "certificates/delete_certification.php",
                    data:{id:data[0]},
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Deleted!',
                            text:'Please wait a momement',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function(){
                            window.location.reload(true)
                        })
                        
                    }
                });              
            }
        })        
    })

    $('#example tbody').on( 'click', '.btn-success', function (e) {
        var data = table1.row($(this).parents('tr')).data();  
        $.redirect("view_certificate.php", {next_id: data[0]}, "POST", "");      
    })

    // ADDITIONAL
    $( '#select_propertyid' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: "Select Property From Taxdec",                
        dropdownParent: $('#add_cert'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "certificates/property_selection2.php",
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
    } ).on('select2:select', function(event) {
        var additional = event.params.data; 
        
        tinymce.init({
            selector: 'textarea#body_cert',
            height: 500,
            menubar: false,
            plugins: [
              'advlist autolink lists link image charmap print preview anchor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
        tinymce.activeEditor.insertContent('<table style="width:100%;border:solid 1px"><tr style="border:solid 1px;"><td style="width:20%;border:solid 1px">'+additional.tdno+'</td><td style="width:20%;border:solid 1px">'+additional.ownername+'</td><td style="width:20%;border:solid 1px">'+additional.propertylocation+'</td><td style="width:10%;border:solid 1px">'+additional.prevtd+'</td><td style="width:10%;border:solid 1px">'+$.number(additional.per_sqm,2)+'</td><td style="width:10%;border:solid 1px">₱ '+$.number(additional.marketvalue,2)+'</td><td style="width:10%;border:solid 1px">₱ '+$.number(additional.assessval,2)+'</td></tr></table><br>');
    }).on('select2:clear', function(event) {
        $('#add_table').remove();
        tinymce.init({
            selector: '#body_cert',  // change this value according to your HTML            
            plugins: 'table',
            menubar: 'table',
            toolbar: 'table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol'
        });
    });
    /*
    $('#example tbody').on('click', '.btn-success', function(){
        var data = table1.row($(this).parents('tr')).data();  
        $.redirect("view_taxdec.php", {next_id: data[0]}, "POST", "");
        $('#next_id').val(data[0])
    })
    */

    $('#cert_form').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "certificates/add_certificates.php",
            data:$(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Added!',
                    text:'Please wait a momement',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function(){
                    $.redirect("view_certificate.php", {next_id: data}, "POST", "");
                })
                
            }
        });   
    })

    const myTimeout = setTimeout(myGreeting, 1000);

    function myGreeting() {
        table1.draw()
    }

    var text_val = tinymce.init({
        selector: '#body_cert',
        plugins: 'lists',
        toolbar: 'numlist bullist',
    }); 


})