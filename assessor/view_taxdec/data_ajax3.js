$(document).ready(function(){
    var cookie_id = Cookies.get("id");
    var taxdec_id = $('#next_id').val();

    $.ajax({
        type: "POST",
        url: "faas_preview_machine.php",
        data: { id: taxdec_id },
        success: function (response) {
            var data = JSON.parse(response);
            renderData(data);
        }
    });
});

function renderData(data) {
    var date_created = data.date_created;
    var municipality = data.prefix_municipality.toUpperCase();
    var municipality_title = data.prefix_municipality.toUpperCase();
    var province = data.prefix_province.toLowerCase();
    var image_municipality = '../../dist/images/' + municipality + '.png';
    var image_province = '../../dist/images/' + province + '.png';
    
    var owneraddress = data.address
    var admin = data.admin
    var adminaddress = data.adminaddress
    var admintel = data.admintel
    var admintin = data.admintin
    var annotation = data.annotation
    var arp = data.arp
    var blkno = data.blkno
    var cct = data.cct
    var clerkid = data.clerkid
    var date_created = data.date_created
    var dateapproved = data.dateapproved
    var dated = data.dated
    var east = data.east
    var effectivity = data.effectivity
    var exempt = data.exempt
    var head_name = data.head_name
    var id = data.id
    var idle = data.idle
    var land_area = data.land_area
    var land_blkno = data.land_blkno
    var land_lotno = data.land_lotno
    var land_oct = data.land_oct
    var land_owner = data.land_owner
    var land_surveyno = data.land_surveyno
    var land_tdno = data.land_tdno
    var lotno = data.lotno
    var memoranda = data.memoranda
    var north = data.north
    var oct = data.oct
    var ownername = data.ownername
    var ownertel = data.ownertel
    var ownertin = data.ownertin
    var pin = data.pin
    var prefix_municipality = data.prefix_municipality
    var prefix_province = data.prefix_province
    var prev_date_created = data.prev_date_created
    var prevarp = data.prevarp
    var prevassval = data.prevassval
    var preveffectivity = data.preveffectivity
    var prevowner = data.prevowner
    var prevpin = data.prevpin
    var prevtd = data.prevtd
    var propertykind = data.propertykind
    var propertylocation = data.propertylocation
    var south = data.south
    var status = data.status
    var storey = data.storey
    var surveyno = data.surveyno
    var taxable = data.taxable
    var tdno = data.tdno
    var transaction_code = data.transaction_code
    var west = data.west
    
    $('#address').html(owneraddress)
    $('#admin').html(admin)
    $('#adminaddress').html(adminaddress)
    $('#admintel').html(admintel)
    $('#admintin').html(admintin)
    $('#annotation').html(annotation)
    $('#arp').html(arp)
    $('#blkno').html(blkno)
    $('#cct').html(cct)
    $('#clerkid').html(clerkid)
    $('#date_created').html(date_created)
    $('#dateapproved').html(dateapproved)
    $('#dated').html(dated)
    $('#east').html(east)
    $('#effectivity').html(effectivity)
    $('#exempt').html(exempt)
    $('#head_name').html(head_name)
    $('#id').html(id)
    $('#idle').html(idle)
    $('#land_area').html(land_area)
    $('#land_blkno').html(land_blkno)
    $('#land_lotno').html(land_lotno)
    $('#land_oct').html(land_oct)
    $('#land_owner').html(land_owner)
    $('#land_surveyno').html(land_surveyno)
    $('#land_tdno').html(land_tdno)
    $('#lotno').html(lotno)
    $('#memoranda').html(memoranda)
    $('#north').html(north)
    $('#oct').html(oct)
    $('#ownername').html(ownername)
    $('#ownertel').html(ownertel)
    $('#ownertin').html(ownertin)
    $('#pin').html(pin)
    $('#municipality_faas').html(prefix_municipality)
    $('#province_faas').html(prefix_province)
    $('#supercede_date_created').html(prev_date_created)
    $('#supercede_arp').html(prevarp)
    $('#supercede_assval').html($.number(prevassval,2))
    $('#prevassval2').html($.number(prevassval,2))
    $('#supercede_effectivity').html(preveffectivity)
    $('#supercede_ownername').html(prevowner)
    $('#supercede_pin').html(prevpin)
    $('#supercede_tdno').html(prevtd)
    $('#propertykind').html(propertykind)
    $('#propertylocation').html(propertylocation)
    $('#supercede_clerkid').html('')
    $('#south').html(south)
    $('#status').html(status)
    $('#storey').html(storey)
    $('#surveyno').html(surveyno)
    $('#taxable').html(taxable)
    $('#tdno').html(tdno)
    $('#transaction_code').html(transaction_code)
    $('#west').html(west)

    // Handle owner name font size and line break
    var ownernameElement = $('#ownername');
    ownernameElement.css('font-size', ownername.length <= 50 ? '25px' : ownername.length <= 100 ? '20px' : '16px');
    ownernameElement.css('line-height', ownername.length <= 100 ? '20px' : '16px');
    ownernameElement.css('word-break', 'break-all');

    // Handle owner address font size and line break
    var owneraddressElement = $('#owneraddress');
    owneraddressElement.css('font-size', owneraddress.length <= 50 ? '16px' : '16px');
    owneraddressElement.css('line-height', '20px');
    owneraddressElement.css('word-break', 'break-all');

    // Handle admin name font size and line break
    var adminElement = $('#admin');
    adminElement.css('font-size', admin.length <= 50 ? '16px' : admin.length <= 100 ? '20px' : '16px');
    adminElement.css('line-height', admin.length <= 100 ? '20px' : '16px');
    adminElement.css('word-break', 'break-all');

    // Handle admin address font size and line break
    var adminaddressElement = $('#adminaddress');
    adminaddressElement.css('font-size', adminaddress.length <= 50 ? '16px' : '16px');
    adminaddressElement.css('line-height', '20px');
    adminaddressElement.css('word-break', 'break-all');

    var splitted = propertylocation.split(",");
    const results = splitted.map(element => {
        return element.trim();
        });             
    var pos = $.inArray(prefix_municipality, results)
    $('#barangay_faas').text(splitted[pos - 1])
    if(splitted[pos-2] != ''){
        $('#sitio_faas').text(splitted[pos - 2])            
    }
    else{
        $('#sitio_faas').text(' ')            
    }  
    $("#municipality_logo").attr("src",image_municipality);
    $("#province_logo").attr("src",image_province);
    $('#municipality_title').text(municipality);

    // Handle property kind checkboxes
    if (data.propertykind === "LAND") {
        $('#land_check').prop('checked', true);
        $('#location_header').text('PROPERTY LOCATION')
        $('#land_reference').css('visibility', 'hidden');
        $('#machine_section').css('display','none');
        $('#building_section').css('display','none');
        $('#land_section').css('display','block');
    } else if (data.propertykind === "BUILDING") {
        $('#building_check').prop('checked', true);
        $('#location_header').text('BUILDING LOCATION')
        $('#land_reference').css('visibility', 'visible');
        $('#machine_section').css('display','none');
        $('#building_section').css('display','block');
        $('#land_section').css('display','none');
    } else if (data.propertykind === "MACHINE") {
        $('#machine_check').prop('checked', true);
        $('#location_header').text('&emsp;')
        $('#land_reference').css('visibility', 'hidden');
        $('#machine_section').css('display','block');
        $('#building_section').css('display','none');
        $('#land_section').css('display','none');
    } else {
        $('#other_check').prop('checked', true);
    }   
    // Handle other data rendering...
    $("#municipality_logo").attr("src",image_municipality);
    $("#province_logo").attr("src",image_province);
    
    

    // Set image sources and text values...

    printData(data.propertykind, data.id);
}

function printData(propertykind, taxdec_id) {
    // Add your code to print data based on propertykind...
    if(propertykind == 'LAND'){
        $('#land_reference').css('visibility', 'hidden');
        $('#machine_section').css('display','none');
        $('#building_section').css('display','none');
        $('#land_section').css('display','block');
        $.ajax({
            type: "POST",
            url: "land_structure_data1.php",
            data:{id:taxdec_id},
            success: function (response) {
                var response = JSON.parse(response) 
                if(response.length == 0){
                    var append_table = "<tr style='border:solid 1px;'>"+"<td colspan='5'>&nbsp;</td></tr>"
                    $("#add_table1 tbody").append(append_table)	
                }else{
                    $.each(response, function(index) {  
                        var percentage_con = response[index].adjustment_level / 100
                        var adjustment_value = response[index].basic_value * percentage_con
                        var append_table = "<tr style='border:solid 1px;'>"+"<td>"+response[index].classification+"</td><td>"+response[index].sub_classification+"</td><td>"+$.number(response[index].per_sqm)+" SQM</td><td>"+$.number(response[index].basic_value,2)+"</td></tr>"
                        $("#property_appraisal_land tbody").append(append_table)						
                        var append_table2 = "<tr style='border:solid 1px;'>"+"<td>"+$.number(response[index].basic_value,2)+"</td><td>"+response[index].adjustment_factor+"</td><td>"+response[index].adjustment_level+"</td><td>"+$.number(adjustment_value,2)+"</td><td>"+$.number(response[index].marketvalue,2)+"</td></tr>"
                        $("#property_appraisal_land2 tbody").append(append_table2)						
                        var append_table3 = "<tr style='border:solid 1px;'><td>"+$.number(response[index].marketvalue,2)+"</td><td>"+response[index].actualuse+"</td><td>"+$.number(response[index].assessedlevel)+"%</td><td>"+$.number(response[index].assessedvalue,2)+"</td></tr>"
                        $("#property_appraisal_land3 tbody").append(append_table3)						
                    });
                }
                
            }
        });            
    }
    else if(propertykind == 'BUILDING'){
        $('#land_reference').css('visibility', 'visible');
        $.ajax({
            type: "POST",
            url: "additional_desc.php",
            data:{id:taxdec_id},
            success: function (response) {
                var response = JSON.parse(response) 
                if(response.date_issued == 0){
                    var issue = " "
                }else{
                    var issue = new Date(response.date_issued)

                }
                if(response.date_constructed == 0){
                    var date_constructed = " "
                }else{
                    var date_constructed = new Date(response.date_constructed)
                }
                if(response.coc_date == 0){
                    var coc_date = " "
                }else{                    
                    var coc_date = new Date(response.coc_date)
                }
                if(response.date_completed == 0){
                    var date_completed = " "
                }else{
                    var date_completed = new Date(response.date_completed)
                }
                if(response.coo_date == 0){
                    var coo_date = " "
                }else{
                    var coo_date = new Date(response.coo_date)
                }
                if(response.date_occupied == 0){
                    var date_occupied = " "
                }else{
                    var date_occupied = new Date(response.date_occupied)
                }
                if(response.date_renovated == 0){
                    var date_renovated = " "
                }else{
                    var date_renovated = new Date(response.date_renovated)
                }

                $('#structural_type').html(response.structure_type)
                $('#building_permit').html(response.building_permit)
                $('#issued_on').html(issue.toLocaleDateString('en-US'))
                $('#cct_add').html(response.cct)
                $('#date_constructed').html(date_constructed.toLocaleDateString('en-US'))
                $('#coc_add').html(coc_date.toLocaleDateString('en-US'))
                $('#date_completed').html(date_completed.toLocaleDateString('en-US'))
                $('#coo_add').html(coo_date.toLocaleDateString('en-US'))
                $('#date_occupied').html(date_occupied.toLocaleDateString('en-US'))
                $('#no_of_storeys').html(response.no_of_storeys)
                $('#date_renovated').html(date_renovated.toLocaleDateString('en-US'))
            }
        });
        $('#machine_section').css('display','none');
        $('#building_section').css('display','block');
        $('#land_section').css('display','none');
        $.ajax({
            type: "POST",
            url: "building_structure_data1.php",
            data: { id: taxdec_id },
            dataType: 'json', // Specify the expected data type
            success: function (response) {
                // Check if response is empty
                if (response.count == 0) {
                    var append_table = "<tr class='text-center' style='border:solid 1px;'><td colspan='2'>&nbsp;</td></tr>";
                    $("#roofing_table1 tbody").append(append_table);
                } else {
                    $.each(response, function (index, item) {
                        var roofing_data = item.roof_material;
                        var append_table = "<tr style='border:solid 1px;'><td>" + roofing_data + "</td><td><i class='fa fa-check' aria-hidden='true'></i></td></tr>";
                        $("#roofing_table1 tbody").append(append_table);
                    });
                }
            }
        });        
    
        $.ajax({
            type: "POST",
            url: "building_structure_data2.php",
            data: { id: taxdec_id },
            dataType: 'json', // Specify the expected data type
            success: function (response) {
                if (response.count == 0) {
                    $("#floor_table1 tbody").append("<tr style='border:solid 1px;text-align:center;'>&nbsp;<td colspan='5'>&nbsp;</td></tr>");
                } else {
                    $.each(response, function (index, item) {
                        var floor_data = item.floor_material;
                        var first_floor = item.f1;
                        var second_floor = item.f2;
                        var third_floor = item.f3;
                        var fourth_floor = item.f4;
                        var append_table = "<tr style='border:solid 1px;text-align:center;'><td>" + floor_data + "</td><td>" + first_floor + "</td><td>" + second_floor + "</td><td>" + third_floor + "</td><td>" + fourth_floor + "</td></tr>";
                        $("#floor_table1 tbody").append(append_table);
                    });
                }
            }
        });

        $.ajax({
            type: "POST",
            url: "building_structure_data3.php",
            data: { id: taxdec_id },
            dataType: 'json', // Specify the expected data type
            success: function (response) {
                if (response.count == 0) {
                    $("#wall_table1 tbody").append("<tr style='text-align:center;'><td colspan='5'>&nbsp;</td></tr>");
                } else {
                    $.each(response, function (index, item) {
                        var wall_data = item.wall_material;
                        var first_floor = item.f1;
                        var second_floor = item.f2;
                        var third_floor = item.f3;
                        var fourth_floor = item.f4;
                        var append_table = `<tr style='border:solid 1px;text-align:center;'><td>${wall_data}</td><td>${first_floor}</td><td>${second_floor}</td><td>${third_floor}</td><td>${fourth_floor}</td></tr>`;
                        $("#wall_table1 tbody").append(append_table);
                    });
                }
            }
        });
        
        
    
        $.ajax({
            type: "POST",
            url: "building_structure_data4.php",
            data:{id:taxdec_id},
            success: function (response) {
                var response = JSON.parse(response) 
                if(response.count == 0){
                    $("#foundation_table1 tbody").append("<tr style='border:solid 1px;text-align:center;'><td colspan='2'>&nbsp;</td></tr>")	
                }else{
                    $.each(response, function(index) {                
                        var roofing_data = response[index].foundation_material	                                
                        var append_table = "<tr style='border:solid 1px;text-align:center;'>"+"<td>"+roofing_data+"</td><td><i class='fa fa-check' aria-hidden='true'></i></td></tr>"
                        $("#foundation_table1 tbody").append(append_table)						
                    });
                }           
                
            }
        });
    
        $.ajax({
            type: "POST",
            url: "building_structure_data5.php",
            data: { id: taxdec_id },
            dataType: 'json', // Specify the expected data type
            success: function (response) {
                if (response.count === 0) {
                    $("#add_table1 tbody").append("<tr style='border:solid 1px;text-align:center;'><td colspan='5'>&nbsp;</td></tr>");
                } else {
                    $.each(response, function (index, item) {
                        var add_data = item.add_material;
                        var first_floor = item.f1;
                        var second_floor = item.f2;
                        var third_floor = item.f3;
                        var fourth_floor = item.f4;
                        var append_table = `
                            <tr style='border:solid 1px;text-align:center;'>
                                <td>${add_data}</td>
                                <td>${first_floor}</td>
                                <td>${second_floor}</td>
                                <td>${third_floor}</td>
                                <td>${fourth_floor}</td>
                            </tr>`;
                        $("#add_table1 tbody").append(append_table);
                    });
                }
            }
        });
        
        
    
        $.ajax({
            type: "POST",
            url: "building_structure_data6.php",
            data: { id: taxdec_id },
            dataType: 'json', // Specify the expected data type
            success: function (response) {
                if (response.length === 0) {
                    $("#property_appraisal_building tbody, #property_appraisal_building2 tbody").append(
                        "<tr style='border:solid 1px;'><td colspan='5'>&nbsp;</td></tr>"
                    );
                } else {
                    $.each(response, function (index, item) {
                        var percentage_con = item.adjustment_level / 100;
                        var adjustment_value = item.basic_value * percentage_con;
                        var append_table = `
                            <tr style='border:solid 1px;'>
                                <td>${item.floor_item}</td>
                                <td>${$.number(item.basic_value, 2)}</td>
                                <td>${$.number(item.depreciated_value, 2)}</td>
                                <td>${$.number(adjustment_value, 2)}</td>
                                <td>${$.number(item.adjustment_level)}%</td>
                                <td>${$.number(item.marketvalue, 2)}</td>
                            </tr>`;
                        $("#property_appraisal_building tbody").append(append_table);
        
                        var append_table2 = `
                            <tr style='border:solid 1px;'>
                                <td>${$.number(item.marketvalue, 2)}</td>
                                <td>${item.actualuse}</td>
                                <td>${$.number(item.assessedlevel)}%</td>
                                <td>${$.number(item.assessedvalue, 2)}</td>
                            </tr>`;
                        $("#property_appraisal_building2 tbody").append(append_table2);
                    });
                }
            }
        });
        
    }
}
