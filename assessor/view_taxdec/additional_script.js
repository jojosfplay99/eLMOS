function selection(propertykind){   
    /**********EDIT FORM*********/
    $('#edit_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "view_taxdec/edit_taxdec.php",
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
        
    })
    /**********EDIT FORM*********/

    /**********AREA CHANGE*********/
    $('#area').on('keyup change', function(){
        var area = $('#area').val();
        var mode = $('#area_mode').val();
        var unit_value = $('#unit_value').val();
        var assessed_level = $('#assessment_level').val();
        if(area == ''){
            area = 0;
        }
        if(mode == 'SQM'){
            var total_area = parseFloat(area) * 1;
        }else{
            var total_area = parseFloat(area) * 10000;
        }
        $('#per_sqm').val(total_area);

        if(unit_value != ''){            
            var unit_value = $('#unit_value').val();
            var adjustment_level = $('#adjustment_level').val();
            var total_basic = parseFloat(unit_value) * parseFloat(area);
            var adjustment_percentage = parseFloat(adjustment_level) / 100;
            var total_marketvalue = parseFloat(total_basic) * parseFloat(adjustment_percentage);
            $('#basic_value').val(total_basic)
            $('#marketvalue').val(total_marketvalue)
            if(assessed_level != ''){ 
                var assessment_level_percentage = parseFloat(adjustment_level) / 100;           
                var assessed_value = parseFloat(total_marketvalue) * parseFloat(assessment_level_percentage);
                $('#assessed_value').val(assessed_value);
            }
        }        
    })
    /**********AREA CHANGE*********/

    /**********AREA MODE CHANGE*********/
    $('#area_mode').on('change', function(){
        var area = $('#area').val();
        var mode = $('#area_mode').val();
        var unit_value = $('#unit_value').val();
        var assessed_level = $('#assessment_level').val();
        if(area == ''){
            area = 0;
        }
        if(mode == 'SQM'){
            var total_area = parseFloat(area) * 1;
        }else{
            var total_area = parseFloat(area) * 10000;
        }
        $('#per_sqm').val(total_area);

        if(unit_value != ''){            
            var unit_value = $('#unit_value').val();
            var adjustment_level = $('#adjustment_level').val();
            var total_basic = parseFloat(unit_value) * parseFloat(area);
            var adjustment_percentage = parseFloat(adjustment_level) / 100;
            var total_marketvalue = parseFloat(total_basic) * parseFloat(adjustment_percentage);
            $('#basic_value').val(total_basic)
            $('#marketvalue').val(total_marketvalue)
            if(assessed_level != ''){ 
                var assessment_level_percentage = parseFloat(adjustment_level) / 100;           
                var assessed_value = parseFloat(total_marketvalue) * parseFloat(assessment_level_percentage);
                $('#assessed_value').val(assessed_value);
            }
        } 
    })
    /**********AREA MODE CHANGE*********/

    /**********SELECTION CLASSIFICATION**********/
    $('#select_classification').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        dropdownParent: $('#add_classification_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "view_taxdec/classification_select.php",
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
        $('#classification_name').val(additional.text)
        $('#select_sub_classification').prop('disabled', false)        
    }).on('select2:clear', function(event) {
        $('#select_sub_classification').prop('true', true)
    });
    /**********SELECTION CLASSIFICATION**********/

    /**********SELECTION SUBCLASSIFICATION**********/
    $( '#select_sub_classification' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        dropdownParent: $('#add_classification_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "view_taxdec/subclassification_land.php",
            type: "post",
            dataType: 'json',
            delay: 250,
                data: function (params) {
                return {
                        searchTerm: params.term,
                        searchTerm2: $('#select_classification').val(), // search term                     
                        searchTerm3: propertykind,                     
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
        var area = $('#area').val();      
        var total_area = $('#per_sqm').val();
        var unit_value = $('#unit_value').val();
        var base_market = parseFloat(area) * parseFloat(additional.value);
        var depreciated_level = $('#depreciated_level').val()
        var depreciated_percentage = parseFloat(depreciated_level) / 100
        var depreciated_value = parseFloat(base_market) * parseFloat(depreciated_percentage)
        var total_depreciated_value = parseFloat(base_market) - parseFloat(depreciated_value)
        $('#depreciated_value').val(depreciated_value)
        $('#unit_value').val(additional.value)
        $('#basic_value').val(base_market)
        var adjustment_level = $('#adjustment_level').val()
        var adjustment_percentage = parseFloat(adjustment_level) / 100;        
        var marketvalue = parseFloat(total_depreciated_value) * parseFloat(adjustment_percentage)
        $('#marketvalue').val(marketvalue)
        $('#select_actualuse').prop('disabled', false)                
    }).on('select2:clear', function(event) {
        $('#select_actualuse').prop('disabled', true)
    })
    /**********SELECTION SUBCLASSIFICATION**********/
    $('#depreciated_level, #basic_value, #depreciated_level, #adjustment_level, #assessement_level').on('change keyup', function(){
        var base_market = $('#basic_value').val()
        var depreciated_level = $('#depreciated_level').val()
        var assessed_level = $('#assessment_level').val()
        var depreciated_percentage = parseFloat(depreciated_level) / 100
        var depreciated_value = parseFloat(base_market) * parseFloat(depreciated_percentage)
        var total_depreciated_value = parseFloat(base_market) - parseFloat(depreciated_value)
        $('#depreciated_value').val(depreciated_value)        
        var adjustment_level = $('#adjustment_level').val()
        var adjustment_percentage = parseFloat(adjustment_level) / 100;        
        var marketvalue = parseFloat(total_depreciated_value) * parseFloat(adjustment_percentage)
        $('#marketvalue').val(marketvalue)
        var assessed_percentage = parseFloat(assessed_level) / 100; 
        var total_assval = parseFloat(marketvalue) * parseFloat(assessed_percentage);              
        $('#assessed_value').val(total_assval)
        console.log(marketvalue)
    })



    $( '#select_actualuse' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        dropdownParent: $('#add_classification_modal'),
        allowClear: true,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        ajax: {
            url: "view_taxdec/actualuse_land.php",
            type: "post",
            dataType: 'json',
            delay: 250,
                data: function (params) {
                return {
                        searchTerm: params.term,
                        searchTerm2: $('#select_classification').val(), // search term                                
                        
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
        var assessed_level = additional.value;
        var marketvalue = $('#marketvalue').val();
        var assessed_percentage = parseFloat(assessed_level) / 100;
        var total_assval = parseFloat(marketvalue) * parseFloat(assessed_percentage);              
        $('#assessment_level').val(additional.value)                        
        $('#assessed_value').val(total_assval)  
        $('#select_actualuse').prop('disabled', false)
    }).on('select2:clear', function(event) {
        $('#select_actualuse').prop('disabled', true)
    })
    
    $('#assessment_level,#assessment_level').on('keyup', function(){
        var assessment_level = $('#assessment_level').val();
        var marketvalue = $('#marketvalue').val();
        var assessed_percentage = parseFloat(assessment_level) / 100;
        var total_assval = parseFloat(marketvalue) * parseFloat(assessed_percentage);     
        $('#assessed_value').val(total_assval)
    })
    

    $('#add_classification_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'view_taxdec/add_classifications.php',
            data: $(this).serialize(),        
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text:'Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location.reload(true);
                })               
            }        
        })
    })

    $('#edit_classification_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'view_taxdec/edit_classifications.php',
            data: $(this).serialize(),        
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text:'Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){
                    window.location.reload(true);
                })               
            }        
        })
    })
    

    $('#taxable').on('change', function(){
        var taxable = $('#taxable').val()
        if(taxable == 'YES'){
            $('#exempt').val('NO').trigger('change')
        }
        else if(taxable == 'NO'){
            $('#exempt').val('YES').trigger('change')
        }
        else{
            $('#exempt').val('YES').trigger('change')
        }
    })

    $('#exempt').on('change', function(){
        var exempt = $('#exempt').val()
        if(exempt == 'YES'){
            $('#taxable').val('NO').trigger('change')
        }
        else if(exempt == 'NO'){
            $('#taxable').val('YES').trigger('change')
        }
        else{
            $('#taxable').val('YES').trigger('change')
        }
    })

    $('#form_general_description').on('submit', function(e){
        e.preventDefault();
        var status = $('#status_gen_add').val()
        if(status == 'NONE'){
            var reply = "Add";
        }else{
            var reply = "Edit"
        }
        Swal.fire({
            title: 'Do you want to '+reply+' General Description?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, '+reply+' it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "view_taxdec/general_description.php",
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
    })
    
}