<?php
$videoFolder = 'videos/';

// Get all files with a .mp4 extension in the specified folder
$videoFiles = glob($videoFolder . '*.mp4');
$videoFiles = str_replace($videoFolder, '', $videoFiles);

// Output the list of video files as a JSON array
echo json_encode($videoFiles);
?>