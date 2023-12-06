$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var faasid = $('#faasid').val() 
    
    var text_val = tinymce.init({
        selector: '#annotation, #memoranda',
        plugins: 'lists',
        toolbar: 'numlist bullist',
    });

    $.ajax({
        type: "POST",
        url: "view_faas/fetch_data.php",
        data:{id:faasid},
        success: function (response) {
            var response = JSON.parse(response)
            var date_created = response.date_created;
            var municipality = response.prefix_municipality;
            var image_municipality = '../dist/images/'+(response.prefix_municipality).toLowerCase()+'.png';
            var image_province = '../dist/images/'+(response.prefix_province).toLowerCase()+'.png';   
            $('#faasid_classification').val(faasid)
            $('#propertyid_classification').val(response.propertyid)
            $('#clerkid').val(response.clerkid)
            $('#tdno_classification').val(response.tdno)
            $('#municipality_title').html(municipality)
            $('#municipality_logo').attr('src', image_municipality)
            $('#province_logo').attr('src', image_province)            
            $('#clerkid').val(cookie_id)
            $('#propertyid').val(response.propertyid)
            $('#status').val(response.status)
            $('#date_created').val(response.date_generated)
            $('#pin').val(response.pin)
            $('#tdno').val(response.tdno)
            $('#arp').val(response.arp)
            $('#oct').val(response.oct)
            $('#surveyno').val(response.survey_no)
            $('#dated').val(response.dated)
            $('#lotno').val(response.lotno)
            $('#blkno').val(response.blk)
            $('#cad_lotno').val(response.cad_lotno)
            $('#ownername').val(response.ownername)
            $('#owneraddress').val(response.owneraddress)
            $('#ownertel').val(response.tel)
            $('#ownertin').val(response.tin)
            $('#admin').val(response.admin)
            $('#adminaddress').val(response.adminaddress)
            $('#admintel').val(response.admintel)
            $('#admintin').val(response.admintin)
            var propertylocation = response.propertylocation;            
            var splitted = propertylocation.split(","); 
            const results = splitted.map(element => {
                return element.trim();
              });             
            var pos = $.inArray(response.prefix_municipality, results)
            $('#barangay').val(splitted[pos - 1])
            if(splitted[pos-2] != ''){
                $('#sitio').val(splitted[pos - 2])            
            }
            else{
                $('#sitio').val(' ')            
            }            
            $('#municipality').val(response.prefix_municipality)
            $('#province').val(response.prefix_province)
            $('#north').val(response.north)
            $('#south').val(response.south)
            $('#east').val(response.east)
            $('#west').val(response.west)
            $('#propertykind').val(response.propertykind)
            $('#effectivity').val(response.effectivity)
            $('#taxable').val(response.taxable)
            $('#exempt').val(response.exempt)
            $('#memoranda').html(response.memoranda)
            $('#annotation').html(response.annotation)

            $('#preveffectivity').val(response.preveffectivity)
            $('#prevtd').val(response.prevtd)
            $('#prevarp').val(response.prevarp)
            $('#prevpin').val(response.prevpin)
            $('#prevasval').val(response.prevasval)
            $('#prevownername').val(response.previousowner)
            $('#prevassval').val(response.prevasval)

            $('#land_ownername').val(response.land_owner)
            $('#land_tdno').val(response.land_tdnum)
            $('#land_per_sqm').val(response.land_area)
            $('#land_oct').val(response.land_oct)
            $('#land_surveyno').val(response.land_surveyno)
            $('#land_blkno').val(response.land_blkno)
            $('#land_lotno').val(response.land_lotno)
        
            $('#status_classification').val(response.status)
            var text_val = tinymce.init({
                selector: '#annotation, #memoranda',
                plugins: 'lists',
                toolbar: 'numlist bullist',
            });

            $('#faasid_classification2').val(faasid)
            $('#propertyid_classification2').val(response.propertyid)
            $('#status2').val(response.status)
            $('#clerkid2').val(cookie_id)
            $('#tdno_classification2').val(response.tdno)            
            
        }
    });   
})