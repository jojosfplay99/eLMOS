$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $('#clerkid').val(cookie_id)
    var text_val = tinymce.init({
        selector: '#annotation, #memoranda',
        plugins: 'lists',
        toolbar: 'numlist bullist',
    });
alert(cookie_id)

    $( '#select_propertyid' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: "Select Property From Taxdec",                
        //dropdownParent: $('#faas_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "add_faas/property_selection.php",
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
        $('#arp').val(additional.arp)
        $('#pin').val(additional.pin)
        $('#tdno').val(additional.tdno)
        $('#status').val(additional.status)

        $('#oct').val(additional.oct)
        $('#surveyno').val(additional.surveyno)
        $('#dated').val(additional.dated)
        $('#lotno').val(additional.lotno)        
        $('#blkno').val(additional.blkno)
        $('#cad_lotno').val(additional.lotno)

        $('#ownername').val(additional.ownername)
        $('#owneraddress').val(additional.owneraddress)
        $('#ownertin').val(additional.ownertin)
        $('#ownertel').val(additional.ownertel)

        $('#admin').val(additional.admin)
        $('#adminaddress').val(additional.adminaddress)
        $('#admintin').val(additional.admintin)
        $('#admintel').val(additional.admintel)

        $('#province').val(additional.province)
        $('#municipality').val(additional.municipality)
        $('#barangay').val(additional.barangay)
        $('#sitio').val(additional.sitio)

        $('#north').val(additional.north)
        $('#south').val(additional.south)
        $('#east').val(additional.east)
        $('#west').val(additional.west)
    
        $('#propertykind').val(additional.propertykind).trigger('change')
        $('#effectivity').val(additional.effectivity)
        $('#taxable').val(additional.taxable).trigger('change')
        $('#exempt').val(additional.exempt).trigger('change')

        $('#prevtd').val(additional.prevtd)
        $('#prevarp').val(additional.prev_arp)
        $('#prevpin').val(additional.prev_pin)
        $('#prevownername').val(additional.prev_ownername)
        $('#preveffectivity').val(additional.prev_effectivity)
        $('#prevassval').val(additional.prev_assval)
        $('#date_generated').val(additional.date_generated)
        $('#transaction_code').val(additional.transaction_code)
        
        var memoranda = additional.memoranda
        var annotation = additional.annotation
        
        tinymce.activeEditor.remove("#memoranda"); 
        tinymce.activeEditor.remove("#annotation"); 

        $('#memoranda').val(memoranda)        
        $('#annotation').val(annotation)        
        
        var text_val = tinymce.init({
            selector: '#annotation, #memoranda',
            plugins: 'lists',
            toolbar: 'numlist bullist',
        });    
        
        if(additional.propertykind == "BUILDING"){
            $('#land_reference_div').attr('style','display:block')            
        }
        else{
            $('#land_reference_div').attr('style','display:none')            
        }
        
        
    }).on('select2:clear', function(event) {
        $('#add_new_faas :input').val('')
        tinymce.activeEditor.remove("#memoranda"); 
        tinymce.activeEditor.remove("#annotation"); 

        $('#memoranda').val('')        
        $('#annotation').val('')        
        
        var text_val = tinymce.init({
            selector: '#annotation, #memoranda',
            plugins: 'lists',
            toolbar: 'numlist bullist',
        });
        $('#building_add').show()
        $('#machinery_add').show()
    });
    


    $('#add_new_faas').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "add_faas/add_certificates.php",
                    data:$(this).serialize(),
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Updated!',
                            text:'Please wait a momement',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function(){
                            $.redirect("view_faas.php", {next_id: data}, "POST", "");
                        })
                        
                    }
                });             
            }
        })
    })
})