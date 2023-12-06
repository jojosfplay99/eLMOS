$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    $('#clerkid').val(cookie_id)
    var text_val = tinymce.init({
        selector: '#annotation, #memoranda',
        plugins: 'lists',
        toolbar: 'numlist bullist',
    });

    $('#add_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Add it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "add_taxdec/add_taxdec.php",
                    data:$(this).serialize(),
                    success: function (data) {                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Tax Declaration Added',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function(){
                            $.redirect("view_taxdec.php", {next_id: data}, "POST", "");
                        })                                   
                    }
                });
            }
        })            
    })

    $( '#select_land_reference' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: "Select Property From Taxdec",                
        //dropdownParent: $('#faas_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "add_faas/land_reference.php",
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
        $('#land_owner').val(additional.land_owner)
        $('#land_oct').val(additional.land_oct)
        $('#land_surveyno').val(additional.land_surveyno)
        $('#land_lotno').val(additional.land_lotno)
        $('#land_blkno').val(additional.land_blkno)
        $('#land_tdno').val(additional.land_tdno)
        $('#land_area').val(additional.land_area)
        
    }).on('select2:clear', function(event) {
        $('#land_owner').text('')
        $('#land_oct').val('')
        $('#land_surveyno').val('')
        $('#land_lotno').val('')
        $('#land_blkno').val('')
        $('#land_tdno').val('')
        $('#land_area').val('')
    });

    $( '#select_superceded' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: "Select Property From Taxdec",                
        //dropdownParent: $('#faas_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "add_faas/supercede.php",
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
        $('#supercede_td').val(additional.supercede_td)
        $('#supercede_arp').val(additional.supercede_arp)
        $('#supercede_pin').val(additional.supercede_pin)
        $('#supercede_effectivity').val(additional.supercede_effectivity).trigger('change')
        $('#supercede_date_created').val(additional.supercede_date_created).trigger('change')
        
        
    }).on('select2:clear', function(event) {
        $('#supercede_td').text('')
        $('#supercede_arp').val('')
        $('#supercede_pin').val('')
        $('#supercede_effectivity').val('')
        $('#supercede_date_created').val('')
    });
})