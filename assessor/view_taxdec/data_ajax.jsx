$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var taxdec_id = $('#next_id').val() 

    $.ajax({
        type: "POST",
        url: "edit_taxdec/check_data.php",
        data:{id:taxdec_id},
        success: function (response) {
            var response = JSON.parse(response)
            var date_created = response.date_created;
            var municipality = response.prefix_municipality;
            var image_municipality = '../../dist/images/'+(response.prefix_municipality).toLowerCase()+'.png';
            var image_province = '../../dist/images/'+(response.prefix_province).toLowerCase()+'.png';
            
            var province = response.prefix_province;
            
            var transaction_code = response.transaction_code;
            var tdno = response.tdno;
            var pin = response.pin;            
            var arp = response.arp;
            //var ownername = response.ownername;
            var ownername = response.ownername;                      

            var owneraddress = response.address;
            var ownertin = response.ownertin;
            var ownertel = response.ownertel;
            alert(ownername.length)
            
            if(ownername.length <= 50) {
                $('#ownername').css('font-size','20px');
                $('#ownername').css('word-break','break-all');                
            }
            else if(ownername.length > 50 && ownername.length <= 100) {
                $('#ownername').css('font-size','16px');
                $('#ownername').css('margin-top','-20px');
                $('#ownername').css('word-break','break-all');                
            }
            else{
                $('#ownername').css('font-size','14px');
                $('#ownername').css('margin-top','-30px');
                $('#owner_space').css('margin-top','20px');
                $('#ownername').css('word-break','break-all'); 
            }  
            if(owneraddress.length <= 50) {
                $('#owneraddress').css('font-size','20px');
                $('#owneraddress').css('word-break','break-all');                
            }
            else if(ownername.length > 50 && ownername.length <= 100) {
                $('#owneraddress').css('font-size','16px');
                $('#owneraddress').css('margin-top','-20px');
                $('#owneraddress').css('word-break','break-all');                
            }
            else{
                $('#owneraddress').css('font-size','14px');
                $('#owneraddress').css('margin-top','-30px');
                $('#owner_space2').css('margin-top','20px');
                $('#owneraddress').css('word-break','break-all'); 
            }

            //var admin = response.admin;
            var admin = response.admin
            var adminaddress = "asduasiodugasioduasdaasduasiodugasioduasdaasduasiodugasioduasdaasduasiodugasioduasdaasdua"
            var admintin = response.admintin;
            var admintel = response.admintel;
            if(admin.length <= 50) {
                $('#admin').css('font-size','20px');
                $('#admin').css('word-break','break-all');                
            }
            else if(admin.length > 50 && admin.length <= 60) {
                $('#admin').css('font-size','20px');
                $('#admin').css('word-break','break-all');                
            }
            else if(admin.length > 60 && admin.length <= 75) {
                $('#admin').css('font-size','18px');
                $('#admin').css('word-break','break-all');                
            }
            else if(admin.length > 75 && admin.length <= 85) {
                $('#admin').css('font-size','16px');
                $('#admin_space').css('margin-top','20px');
                $('#admin').css('word-break','break-all');                
            }
            else{
                $('#admin').css('font-size','14px');
                $('#admin').css('margin-top','-20px');
                $('#admin_space').css('margin-top','20px');
                $('#admin').css('word-break','break-all'); 
            }  

            if(adminaddress.length <= 50) {
                $('#adminaddress').css('font-size','20px');
                $('#adminaddress').css('word-break','break-all');                
            }
            else if(adminaddress.length > 50 && adminaddress.length <= 100) {
                $('#adminaddress').css('font-size','16px');
                $('#admin_space2').css('margin-top','10px');
                $('#adminaddress').css('word-break','break-all');                
            }
            else{
                $('#adminaddress').css('font-size','14px');
                $('#adminaddress').css('margin-top','-20px');
                $('#admin_space2').css('margin-top','20px');
                $('#adminaddress').css('word-break','break-all'); 
            }
            var propertylocation = response.propertylocation;
            var split_data = propertylocation.split(",");
            var m_search = $.inArray( municipality, split_data );
            if(split_data.length == 4){
                var b_search = parseInt(m_search - 1)
                var s_search = parseInt(m_search - 2)
                var barangay = split_data[b_search];
                //var sitio = split_data[s_search];
                var sitio = 'GUIWANN';
            }
            else{
                var barangay = "";
                var sitio = "";
            }

            var oct = response.oct;
            var survey_no = response.survey_no;
            var survey_no = response.surveyno;
            var cct = response.cct;
            var lotno = response.lotno;
            var dated = response.dated;
            var blkno = response.blkno;
            var north = response.north;
            var south = response.south;
            var east = response.east;
            var west = response.west;
            var propertykind = response.propertykind;
            var storeys = response.storey;
            var description = response.description;
            var taxable = response.taxable;
            var exempt = response.exempt;
            var date_approved = response.dateapproved;
            var effectivity = response.effectivity;
            var previous_owner = response.prevowner;
            var previous_tdno = response.prevtd;
            var previous_assval = response.prevassval;
            var memoranda = response.memoranda;
            var annotation = response.annotation;
            var status = response.status;
            
            $("#municipality_logo").attr("src",image_municipality);
            $("#province_logo").attr("src",image_province);

            $('#municipality_title').html(municipality);
            $('#province_title').html(province);
            
            $('#date_created').val(date_created);
            $('#transaction_code').val(transaction_code).change();
            $('#tdno').text(tdno);
            $('#pin').text(pin);
            $('#arp').text(arp);
            $('#ownername').text(ownername);
            $('#owneraddress').text(owneraddress);
            $('#ownertin').text(ownertin);
            $('#ownertel').text(ownertel);
            $('#admin').text(admin);
            $('#adminaddress').text(adminaddress);
            $('#admintin').text(admintin);
            $('#admintel').text(admintel);
            $('#sitio').text('sitio');
            $('#barangay').text(barangay);
            $('#municipality').text(municipality);
            $('#province').text(province);
            $('#oct').text(oct);
            $('#surveyno').text(survey_no);
            $('#cct').text(cct);
            $('#lot_no').text(lotno);
            $('#dated').text(dated);
            $('#blk_no').text(blkno);
            $('#north').text(north);
            $('#south').text(south);
            $('#east').text(east);
            $('#west').text(west);
            $('#propertykind').text(propertykind);
            $('#storeys').text(storeys);
            $('#brief_desc').text(description);
            $('#taxable').text(taxable);
            $('#exempt').text(exempt);
            $('#date_approved').text(date_approved);
            $('#effectivity').text(effectivity);
            $('#previous_owner').text(previous_owner);
            $('#previoustd').text(previous_tdno);
            $('#previous_assval').text(previous_assval);
            $('#memoranda').text(memoranda);
            $('#annotation').text(annotation);
            $('#status').text(status);
            

            if(pin.length > '42'){                
                $('#pin').css('font-size','16px');
                $('#pin').css('word-wrap','break-word');
                $('#pin').css('margin-top','-15px');
            }

            if(tdno.length > '42' || arp.length > '42'){                               
                $('#tdno').css('font-size','16px');
                $('#tdno').css('word-wrap','break-word');
                $('#tdno').css('margin-top','-15px');
            }        

        }
    });
})