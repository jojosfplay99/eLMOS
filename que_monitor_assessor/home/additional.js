$(document).ready(function(){
    var cookie_id = Cookies.get("id")

    function callerFunction() {
        $.ajax({
            type: "POST",
            url: "home/que_list.php",
            data:{clerkid:cookie_id},
            dataType: "json",
            success: function (data) {             
                var que_id = data.que_id;
                $('#que_data1').html(data.que_number1)                
                $('#que_data2').html(data.que_number2)                
                $('#que_data3').html(data.que_number3)                                                        
                //setInterval(callerFunction(), 5000);   
            },
            
        }); 
    }

    // Call the function initially
    callerFunction();

    // Refresh every second
    setInterval(callerFunction, 1000);

    $.ajax({
        type: "POST",
        url: "video_dir.php",
        success: function (data) {        
            var videoFiles = JSON.parse(data)                            
        

            // Loop through the video sources and append them to the video carousel
            $.each(videoFiles, function(index, source) {
                $('#carousel1').append(
                    '<div class="carousel-item ' + (index === 0 ? 'active' : '') + '">' +
                    '<video id="video' + (index + 1) + '" autoplay muted style="width:100%;height:590px;">' +
                    '<source src="videos/' + source + '" type="video/mp4">' +
                    '</video>' +
                    '</div>'
                );

                // Attach an 'ended' event listener to each video
                $('#video' + (index + 1)).on("ended", function() {
                    $('#carousel1').carousel('next'); // Trigger the next slide in the carousel
                    $('#video' + (index + 1)).play(); // Play
                });
            });

            $('#carousel1').on('slid.bs.carousel', function (e) {
                var currentVideo = $('#carousel1 .carousel-item.active video')[0];
                currentVideo.currentTime = 0; // Reset video to the beginning
                currentVideo.play(); // Play the video again
            });

            // Initialize the carousel
            $('#carousel1').carousel();
            
        },            
    });     
})
