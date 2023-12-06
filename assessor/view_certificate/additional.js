$(document).ready(function(){
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });

    $.ajax({
        type: "POST",
        url: "view_certificate/fetch_data.php",
        data:{id:$('#id').val()},
        
        success: function (response) {
            var response = JSON.parse(response)
            $('#tracer_id').val(response.tracer_id)
            $('#date_created').val(response.date_created)
            $('#title').val(response.title)
            $('#requested_by').val(response.requested_by)
            $('#html_taxdec').html(response.html_taxdec)
        }
    }); 

    $( '#select_propertyid' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: "Select Property From Taxdec",                        
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
        tinymce.activeEditor.insertContent('<table style="width:100%;border:solid 1px"><tr style="border:solid 1px;"><td style="width:20%;border:solid 1px">'+additional.tdno+'</td><td style="width:20%;border:solid 1px">'+additional.ownername+'</td><td style="width:20%;border:solid 1px">'+additional.propertylocation+'</td><td style="width:10%;border:solid 1px">'+additional.prevtd+'</td><td style="width:10%;border:solid 1px">'+$.number(additional.per_sqm,2)+'</td><td style="width:10%;border:solid 1px">₱ '+$.number(additional.marketvalue,2)+'</td><td style="width:10%;border:solid 1px">₱ '+$.number(additional.assessval,2)+'</td></tr></table><br>');
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    })

    $('#edit_cert').submit(function(e){
        e.preventDefault()
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "view_certificate/edit_cert.php",
                    data:$(this).serialize(),            
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Updated!',
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
        
    });
})