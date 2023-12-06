$(document).ready(function(){    
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
            var total_basic = parseFloat(unit_value) * parseFloat(total_area);
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
            var total_basic = parseFloat(unit_value) * parseFloat(total_area);
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
        var total_area = $('#per_sqm').val();
        var unit_value = $('#unit_value').val();
        var base_market = parseFloat(total_area) * parseFloat(additional.value);
        $('#unit_value').val(additional.value);
        $('#basic_value').val(base_market)
        var adjustment_level = $('#adjustment_level').val();
        var adjustment_percentage = parseFloat(adjustment_level) / 100;
        var marketvalue = parseFloat(base_market) * parseFloat(adjustment_percentage);
        $('#marketvalue').val(marketvalue);
        $('#select_actualuse').prop('disabled', false)                
    }).on('select2:clear', function(event) {
        $('#select_actualuse').prop('disabled', true)
    })

    $('#adjustment_level').on('keyup',function(){
        var adjustment_level = $('#adjustment_level').val();
        var basic_market = $('#basic_value').val();
        var adjustment_percentage = parseFloat(adjustment_level) / 100;
        var marketvalue = parseFloat(basic_market) * parseFloat(adjustment_percentage);
        var assessed_level = $('#assessed_level').val()
        $('#marketvalue').val(marketvalue);
        if(assessed_level != ''){             
            var assessment_level_percentage = parseFloat(adjustment_level) / 100;           
            var assessed_value = parseFloat(marketvalue) * parseFloat(assessment_level_percentage);
            $('#assessed_value').val(assessed_value);
        }
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


    //-----------------------------------------------------------------------//
   

    $('#area2, #area_mode2').on('keyup change', function(){
        var area = $('#area2').val();
        var mode = $('#area_mode2').val();
        var unit_value = $('#unit_value2').val();
        var assessed_level = $('#assessment_level2').val();
        if(area == ''){
            area = 0;
        }
        if(mode == 'SQM'){
            var total_area = parseFloat(area) * 1;
        }else{
            var total_area = parseFloat(area) * 10000;
        }
        $('#per_sqm2').val(total_area);

        if(unit_value != ''){            
            var unit_value = $('#unit_value2').val();
            var adjustment_level = $('#adjustment_level2').val();
            var depreciation_level = $('#depreciation_level').val();            
            var total_basic = parseFloat(unit_value) * parseFloat(total_area);            
            var depreciation_percentage = parseFloat(depreciation_level) / 100;
            var total_depreciation = parseFloat(total_basic) * parseFloat(depreciation_percentage);            
            $('#depreciation_value').val(total_depreciation);            
            var adjustment_percentage = parseFloat(adjustment_level) / 100;
            var total_marketvalue = parseFloat(total_basic) * parseFloat(adjustment_percentage);
            
            $('#basic_value2').val(total_basic)
            $('#marketvalue2').val(total_marketvalue)
            if(assessed_level != ''){ 
                var assessment_level_percentage = parseFloat(adjustment_level) / 100;           
                var assessed_value = parseFloat(total_marketvalue) * parseFloat(assessment_level_percentage);
                $('#assessed_value2').val(assessed_value);
            }
        }   
    })

    




    $('#select_classification2').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        dropdownParent: $('#add_classification_modal2'),
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
        $('#classification_name2').val(additional.text)
        $('#select_sub_classification2').prop('disabled', false)        
    }).on('select2:clear', function(event) {
        $('#select_sub_classification2').prop('true', true)
    });
    
    $( '#select_sub_classification2' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        dropdownParent: $('#add_classification_modal2'),
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
                        searchTerm2: $('#select_classification2').val(), // search term                                
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
        var total_area = $('#per_sqm2').val();
        var unit_value = $('#unit_value2').val();
        var depreciation_level = $('#depreciation_level').val();     
        var base_market = parseFloat(total_area) * parseFloat(additional.value);
        $('#unit_value2').val(additional.value);
        $('#basic_value2').val(base_market)
        var depreciation_percentage = parseFloat(depreciation_level) / 100;
        var total_depreciation = parseFloat(base_market) * parseFloat(depreciation_percentage);            
        $('#depreciation_value').val(total_depreciation); 
        var adjustment_level = $('#adjustment_level2').val();
        var diff_base = parseFloat(base_market) - parseFloat(total_depreciation);
        $('#final_value').val(diff_base)
        var adjustment_percentage = parseFloat(adjustment_level) / 100;
        var marketvalue = parseFloat(diff_base) * parseFloat(adjustment_percentage);
        $('#marketvalue2').val(marketvalue);
        $('#select_actualuse2').prop('disabled', false)                
    }).on('select2:clear', function(event) {
        $('#select_actualuse2').prop('disabled', true)
    })

    $('#adjustment_level2').on('keyup',function(){
        var adjustment_level = $('#adjustment_level2').val();
        var basic_market = $('#basic_value2').val();
        var depreciation_value = $('#depreciation_value').val();
        var adjustment_percentage = parseFloat(adjustment_level) / 100;
        var marketvalue = parseFloat(basic_market) * parseFloat(adjustment_percentage);
        var assessed_level = $('#assessed_level2').val()
        $('#marketvalue2').val(marketvalue);
        if(assessed_level != ''){             
            var assessment_level_percentage = parseFloat(adjustment_level) / 100;           
            var assessed_value = parseFloat(marketvalue) * parseFloat(assessment_level_percentage);
            $('#assessed_value2').val(assessed_value);
        }
    })


    $( '#select_actualuse2' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),                
        dropdownParent: $('#add_classification_modal2'),
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
                        searchTerm2: $('#select_classification2').val(), // search term                                
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
        var marketvalue = $('#marketvalue2').val();
        var assessed_percentage = parseFloat(assessed_level) / 100;
        var total_assval = parseFloat(marketvalue) * parseFloat(assessed_percentage);              
        $('#assessment_level2').val(additional.value)                        
        $('#assessed_value2').val(total_assval)  
        $('#select_actualuse2').prop('disabled', false)
    }).on('select2:clear', function(event) {
        $('#select_actualuse2').prop('disabled', true)
    })
    
    $('#assessment_level2,#assessment_level2').on('keyup', function(){
        var assessment_level = $('#assessment_level2').val();
        var marketvalue = $('#marketvalue2').val();
        var assessed_percentage = parseFloat(assessment_level) / 100;
        var total_assval = parseFloat(marketvalue) * parseFloat(assessed_percentage);     
        $('#assessed_value2').val(total_assval)
    })

    
    
    
})