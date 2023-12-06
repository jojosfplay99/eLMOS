$(document).ready(function(){
    var taxdec = $('#id').val();
    var header = $('#container').html();
    $.ajax({
        type: "POST",
        url: "fetch_data.php",
        data:{id:taxdec},
        success: function (data) {
            var response = JSON.parse(data)
            var municipality = response.prefix_municipality;
            var image_municipality = 'images/' + municipality.toLowerCase() + '.png';
            var image_province = 'images/' + response.prefix_province.toLowerCase() + '.png';

            
            $("#municipality_logo").attr("src",image_municipality);
            $("#province_logo").attr("src",image_province);
            $('#property_owner').html(response.property_owner)
            $('#property_address').html(response.property_address)            
            $('#header_signature').html(response.head_name.toUpperCase())
            data_mun(municipality)            
        }
    });

    function data_mun(municipality){
        $.ajax({
            type: "POST",
            url: "fetch_data2_prev.php",
            data:{id:taxdec},
            dataType: "json",
            success: function (data) {
                var total_sum = 0;                           
                $.each(data, function(index, value){
                    total_sum += parseFloat(data[index].total_data)
                    var propertylocation = data[index].propertylocation;
                    var splitted = propertylocation.split(",");
                    const results = splitted.map(element => {
                        return element.trim();
                    });             
                    var pos = $.inArray(municipality, results)
                    var barangay = splitted[pos - 1]
                   $('#notice_table').append('<tr class="text-center" style="font-size:14px;"><td>'+data[index].tdno+'</td><td>'+data[index].lotno+'</td><td>'+barangay+'</td><td>'+data[index].classification+'</td><td>'+data[index].year+'</td><td>'+$.number(data[index].assessedvalue,2)+'</td><td>'+$.number(data[index].basic_tax,2)+'</td><td>'+$.number(data[index].sef_tax,2)+'</td><td>'+data[index].adjustment_percentage+'</td><td>'+$.number(data[index].total_data,2)+'</td></tr>')            
                }); 
                $('#notice_table').append('<tr class="text-center"><td colspan="9"><b>TOTAL AMOUNT:</b></td><td>'+$.number(total_sum,2)+'</td></tr>')
                
    
            }
        });
    }
    
    
     
})