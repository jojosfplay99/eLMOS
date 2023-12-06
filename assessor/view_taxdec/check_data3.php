<?php

include '../db.php';

$id = $_POST['id'];

$query = mysqli_query($con,"SELECT SUM(assessedvalue) as assessedvalue FROM propertydb2_rpt WHERE propertyid = '$id'");

while($row = mysqli_fetch_array($query)){
    $total_assval = $row['assessedvalue'];
}



if($total_assval == null || $total_assval == 0){
   $total_assval = 0;
    $array = array(
        "words" => "ZERO",
        "number" => $total_assval,
    );
}
else{
    while($row = mysqli_fetch_array($query)){
        $total_assval = $row['assessedvalue'];
    }
    function numberToWords($number) {
        $words = ["", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
        $tens = ["", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];
        $suffix = ["", "thousand", "million", "billion", "trillion"]; // You can extend this array for larger numbers
    
        if ($number == 0) {
            return "ZERO";
        }
        
    
        $wordsArray = [];
        $i = 0;
    
        while ($number > 0) {
            $chunk = $number % 1000;
    
            if ($chunk != 0) {
                $chunkWords = [];
    
                if ($chunk >= 100) {
                    $chunkWords[] = $words[floor($chunk / 100)] . " hundred";
                    $chunk %= 100;
                }
    
                if ($chunk >= 20) {
                    $chunkWords[] = $tens[floor($chunk / 10)];
                    $chunk %= 10;
                }
    
                if ($chunk > 0) {
                    $chunkWords[] = $words[$chunk];
                }
    
                $wordsArray[] = implode(" ", $chunkWords) . " " . $suffix[$i];
            }
    
            $number = floor($number / 1000);
            $i++;
        }
    
        return implode(", ", array_reverse($wordsArray));
    }
    
    // Example usage:
    
    //$total_assval = number_format('123456.50', 2, '.', '');
    
    $splitted = explode(".", $total_assval);
    $splitted1 = floatval($splitted[0]);
    $splitted2 = floatval($splitted[1]);
    
    
    if($splitted[1] == "00"){
        $words = numberToWords($splitted1);
        $array = array(
            "words" => $words." PESOS",
            "number" => $total_assval,
        );
    }
    else{
        $words = numberToWords($splitted1);
        $words2 = numberToWords($splitted2);
    
        $array = array(
            "words" => $words."pesos and ". $words2." centavos",
            "number" => $total_assval,
        );
    }
}





echo json_encode($array);


?>