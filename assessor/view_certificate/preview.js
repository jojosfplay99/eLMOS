$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "fetch_preview.php",
        data: {id:$('#id').val()}
    })
    .done(function(data) {
        var response = JSON.parse(data)
        var date_created = response.date_created;
        var municipality = response.prefix_municipality;
        var image_municipality = '../../dist/images/' + municipality.toLowerCase() + '.png';
        var image_province = '../../dist/images/' + response.prefix_province.toLowerCase() + '.png';

        
        $("#municipality_logo").attr("src",image_municipality);
        $("#province_logo").attr("src",image_province);
        $("#title").html(response.title.toUpperCase());
        $("#html_text").html(response.html_text);
        $('#requested_by').html(response.requested_by)
        $('#head').html(response.head_name)
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        // Handle the AJAX request failure here, e.g., display an error message
        console.error("AJAX request failed:", textStatus, errorThrown);
    });
})