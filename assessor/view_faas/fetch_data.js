$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var taxdec_id = $('#propertyid').val() 

    var text_val = tinymce.init({
        selector: '#annotation, #memoranda',
        plugins: 'lists',
        toolbar: 'numlist bullist',
    });

    $.ajax({
        type: "POST",
        url: "view_taxdec/fetch_data.php",
        data:{id:taxdec_id},
        success: function (response) {
            var response = JSON.parse(response)
            var date_created = response.date_created;
            var municipality = response.prefix_municipality;
            var image_municipality = '../dist/images/'+(response.prefix_municipality).toLowerCase()+'.png';
            var image_province = '../dist/images/'+(response.prefix_province).toLowerCase()+'.png';                              
            $('#municipality_title').html(municipality)
            $('#municipality_logo').attr('src', image_municipality)
            $('#province_logo').attr('src', image_province)
            $('#propertyid_classification').val(response.id)
            $('#clerkid').val(cookie_id)
            $('#transaction_code').val(response.transaction_code)
            $('#status').val(response.status)
            $('#date_created').val(response.date_created)
            $('#tdno').val(response.tdno)
            $('#view_tdno').html(response.tdno)
            $('#tdno_classification').val(response.tdno)
            $('#pin').val(response.pin)
            $('#view_pin').html(response.pin)
            $('#arp').val(response.arp)
            $('#view_arp').html(response.arp)
            $('#ownername').val(response.ownername)
            $('#ownertel').val(response.ownertel)
            $('#ownertin').val(response.ownertin)
            $('#owneraddress').val(response.address)
            $('#admin').val(response.admin)
            $('#admintel').val(response.admintel)
            $('#admintin').val(response.admintin)
            $('#adminaddress').val(response.adminaddress)
            var propertylocation = response.propertylocation;
            var splitted = propertylocation.split(",");
            var pos = $.inArray(response.prefix_municipality, splitted)
            $('#barangay').val(splitted[pos - 1])
            if(splitted[pos-2] != ''){
                $('#sitio').val(splitted[pos - 2])            
            }
            else{
                $('#sitio').val(' ')            
            }            
            $('#municipality').val(response.prefix_municipality)
            $('#province').val(response.prefix_province)
            $('#oct').val(response.oct)
            $('#surveyno').val(response.surveyno)
            $('#cct').val(response.cct)
            $('#lotno').val(response.lotno)
            $('#dated').val(response.dated)
            $('#blkno').val(response.blkno)
            $('#north').html(response.north)
            $('#south').html(response.south)
            $('#east').html(response.east)
            $('#west').html(response.west)            
            $('#propertykind').val(response.propertykind).trigger('change');            
            $('#storey').val(response.storey)    
            $('#description').val(response.description)    
            $('#taxable').val(response.taxable)       
            $('#dateapproved').val(response.dateapproved)          
            $('#effectivity').val(response.effectivity)
            $('#prevowner').val(response.prevowner)     
            $('#prevtd').val(response.prevtd)
            $('#prevassval').val(response.prevassval)
            $('#memoranda').html(response.memoranda)
            $('#annotation').html(response.annotation)
            $('#prevtd2').html(response.prevtd)
            
            
            
            var text_val = tinymce.init({
                selector: '#annotation, #memoranda',
                plugins: 'lists',
                toolbar: 'numlist bullist',
            });
            var propertykind = response.propertykind
            alert(propertykind)
            datatable_data(propertykind)
                       
        }
    });

    
})