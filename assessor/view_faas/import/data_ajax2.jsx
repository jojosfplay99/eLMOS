$(document).ready(function(){
    var cookie_id = Cookies.get("id")
    var taxdec_id = $('#next_id').val() 

    $.ajax({
        type: "POST",
        url: "view_taxdec/check_data.php",
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
            var ownername = response.ownername;

            //var owneraddress = response.address;
            var owneraddress = response.address;
            var ownertin = response.ownertin;
            var ownertel = response.ownertel;
            if(ownername.length <= 50) {
                $('#ownername').css('font-size','25px');
                $('#ownername').css('word-break','break-all');                
            }
            else if(ownername.length > 50 && ownername.length <= 100) {
                $('#ownername').css('font-size','20px');
                $('#ownername').css('line-height','20px');
                //$('#ownername').css('margin-top','-20px');
                $('#ownername').css('word-break','break-all');                
            }
            else{
                $('#ownername').css('font-size','16px');
                $('#ownername').css('line-height','20px');  
                $('#ownername').css('word-break','break-all'); 
            }  
            

            if(owneraddress.length <= 50) {
                $('#owneraddress').css('font-size','16px');
                $('#owneraddress').css('word-break','break-all');                
            }
            else{
                $('#owneraddress').css('font-size','16px');
                $('#owneraddress').css('line-height','20px');
                //$('#ownername').css('margin-top','-20px');
                $('#ownername').css('word-break','break-all');                
            }            

            //var admin = response.admin;
            var admin = response.admin
            var adminaddress = response.adminaddress
            var admintin = response.admintin;
            var admintel = response.admintel;
            //alert(adminaddress.length)
            if(admin.length <= 50) {
                $('#admin').css('font-size','16px');
                $('#admin').css('word-break','break-all');                
            }
            else if(admin.length > 50 && admin.length <= 100) {
                $('#admin').css('font-size','20px');
                $('#admin').css('line-height','20px');
                //$('#ownername').css('margin-top','-20px');
                $('#admin').css('word-break','break-all');                
            }
            else{
                $('#admin').css('font-size','16px');
                $('#admin').css('line-height','20px');  
                $('#admin').css('word-break','break-all'); 
            }   

            if(adminaddress.length <= 50) {
                $('#adminaddress').css('font-size','16px');
                $('#adminaddress').css('word-break','break-all');                
            }
            else{
                $('#adminaddress').css('font-size','16px');
                $('#adminaddress').css('line-height','20px');
                //$('#ownername').css('margin-top','-20px');
                $('#adminaddress').css('word-break','break-all');               
            } 
            var propertylocation = response.propertylocation;
            const split_data = propertylocation.split(",");
            var m_search = split_data.indexOf(municipality);
            //var m_search = $.inArray( municipality, split_data );            
            var m_search = Math.abs(m_search)
            if(split_data.length > "2"){
                var b_search = parseInt(m_search) - 1;
                var s_search = parseInt(m_search - 2)
                var barangay = split_data[b_search];            
                var sitio = split_data[s_search];
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

            if(propertykind == "LAND"){
                $('#land_check').attr('checked', true)                
            }
            else if(propertykind == "BUILDING"){
                $('#building_check').attr('checked', true)
            }
            else if(propertykind == "MACHINE"){
                $('#machine_check').attr('checked', true)
            }
            else{
                $('#other_check').attr('checked', true)
            }
            
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

            var split_effectivity = response.effectivity.split("-");
            var year = split_effectivity[0];
            var quarter = split_effectivity[1];            
            var quarter = (parseInt(quarter) / 4) + 1;
            var quarter = parseInt(quarter);
            if(quarter == '1'){
                var quarter = quarter+"ST";
            }
            else if(quarter == '2'){
                var quarter = quarter+"ND";
            }
            else if(quarter == '3'){
                var quarter = quarter+"RD";
            }
            else if(quarter == '4'){
                var quarter = quarter+"TH";
            }

            var head_name = response.head_name

            var date_approved = date_approved.split("-");
            var date_approved = date_approved[1]+"/"+date_approved[2]+"/"+date_approved[0]
            $('#approved_by').text(head_name)
            

            $('#year_effectivity').text(year);
            $('#quarter_effectivity').text(quarter);

            $("#municipality_logo").attr("src",image_municipality);
            $("#province_logo").attr("src",image_province);

            $('#municipality_title').text(municipality);
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
            $('#sitio1').text(sitio);
            $('#barangay1').text(barangay);
            $('#municipality123').text(response.prefix_municipality);            
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

            if(taxable == "YES"){
                $('#taxable_check').attr('checked', true);
            }
            else{
                $('#exempt_check').attr('checked', true);
            }
            $('#taxable').text(taxable);
            $('#exempt').text(exempt);
            $('#date_approved').text(date_approved);
            $('#effectivity').text(effectivity);
            $('#previous_owner').text(previous_owner);
            $('#previoustd').text(previous_tdno);
            $('#previous_assval').text(previous_assval);

        
            $('#memoranda').html(memoranda);
            $('#annotation').html(annotation);
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

    $.ajax({
        type: "POST",
        url: "view_taxdec/check_data2.php",
        data:{id:taxdec_id},
        success: function (response) {
            var response = JSON.parse(response)
            if(response.length == 0) {
                $('#classvalue').append('<td class="text-center" colspan="5">NO DATA</td>');    
            }
            else{
                var total_assval = 0;
                $.each(response, function(index, value){
                    var classification = response[index].classification;
                    var sub_classification = response[index].sub_classification;
                    var per_sqm1 = response[index].per_sqm;
                    var per_sqm1 = parseFloat(per_sqm1).toFixed(2);                                        
                    var per_sqm = $.number( per_sqm1, 2 );
                    var marketvalue1 = response[index].marketvalue;
                    var marketvalue1 = parseFloat(marketvalue1).toFixed(2);                                        
                    var marketvalue = $.number( marketvalue1, 2 );
                    var assessedvalue1 = response[index].assessedvalue;
                    var assessedvalue1 = parseFloat(assessedvalue1).toFixed(2);                                        
                    var assessedvalue = $.number( assessedvalue1, 2 );
                    total_assval += parseFloat(assessedvalue1);
                    $('#classvalue').append('<tr><td class="classifications">'+classification+'</td><td class="classifications">'+per_sqm+' SQM</td><td class="classifications">'+sub_classification+'</td><td class="classifications">₱ '+marketvalue+'</td><td class="classifications">₱ '+assessedvalue+'</td></tr>');                                            
                }); 
                
                $('#classvalue').append('<tr><td colspan="4" class="classifications">TOTAL</td><td class="classifications">₱ '+$.number( total_assval, 2 )+'</td></tr>');                        
                console.log(total_assval)

            }
            
        }
    });

    $.ajax({
        type: "POST",
        url: "view_taxdec/check_data3.php",
        data:{id:taxdec_id},
        success: function (response) {
            var response = JSON.parse(response)
            var Inwords = response.words;
            $('#inwords').text(Inwords.toUpperCase());
            
        }
    });
})

