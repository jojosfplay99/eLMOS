<?php



$query = mysqli_query($con,"SELECT * FROM propertydb_rpt WHERE id ='$taxdec_view'");
	while ($row = mysqli_fetch_array($query)) {
		$id = $row['id'];
		$propertyid = $row['id'];
		$tdno = $row['tdno'];
		$pin = $row['pin'];
		$arp = $row['arp'];
		$ownername = $row['ownername'];
		$address = $row['address'];
		$ownertin = $row['ownertin'];
		$ownertel = $row['ownertel'];
		$admin = $row['admin'];
		$adminaddress = $row['adminaddress'];
		$admintin = $row['admintin'];
		$admintel = $row['admintel'];
		$propertylocation = $row['propertylocation'];
		$oct = $row['oct'];
		$surveyno = $row['surveyno'];
		$cct = $row['cct'];
		$lotno = $row['lotno'];
		$dated = $row['dated'];
		$blkno = $row['blkno'];
		$north = $row['north'];
		$south = $row['south'];
		$east = $row['east'];
		$west = $row['west'];
		$propertykind = $row['propertykind'];
		$storey = $row['storey'];
		$description = $row['description'];
		$taxable = $row['taxable'];
		$exempt = $row['exempt'];
		$effectivity = $row['effectivity'];
		$dateapproved = $row['dateapproved'];
		$prevtd = $row['prevtd'];
		$prevassval = $row['prevassval'];
		$prevowner = $row['prevowner'];
		$memoranda = $row['memoranda'];
		$annotation = $row['annotation'];
		$status = $row['status'];
		$idle = $row['idle'];
		$transaction_code = $row['transaction_code'];

		$replacement = ['2.)','3.)','4.)','5.)','6.)','7.)','8.)','9.)','10.)','11.)','12.)','13.)','14.)','15.)','16.)','17.)','18.)','19.)','20.)'];

		$annotation = str_replace($replacement, "<br>", $annotation);
		$address = strtolower($address);
		$adminaddress = strtolower($adminaddress);

		$dateapproved1 = explode("-",$dateapproved);
		$dateapproved1 = $dateapproved1[1]."/".$dateapproved1[2]."/".$dateapproved1[0];	
	}

	$count_pin = strlen($pin);

	$municipality = "BOLJOON";
	$province = "CEBU";

	if($count_pin > 20){
		$pin = wordwrap($pin,20,"<br>");
	}
	else{
		$pin = $pin;
	}


$month_effect = explode("-", $effectivity);
$yearly = $month_effect[0];
$quart = round($month_effect[1] / 4);
$quart = $quart + 1;

//$quarterly = ($month_effect[1] + 3)/3;
$quarterly = round($quart);
if($quarterly == 1){
	$quarterly = $quarterly."<sup>st</sup>";
}
else if($quarterly == 2){
	$quarterly = $quarterly."<sup>st</sup>";	
}
else if($quarterly == 3){
	$quarterly = $quarterly."<sup>rd</sup>";	
}
else if($quarterly == 4){
	$quarterly = $quarterly."<sup>th</sup>";	
}

$count_name = strlen($ownername);

if($count_name > 200){
	$ownername1 = substr_replace($ownername, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 150);
}
else{
	$ownername1 = $ownername;
}

/*------------------------------------------------------------*/
$count_admin = strlen($admin);
if($count_admin > 200){
	$admin1 = substr_replace($admin, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 150);
}
else{
	$admin1 = $admin;
}

/*------------------------------------------------------------*/
$count_north = strlen($north);
if($count_north > 100){
	$north1 = substr_replace($north, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 100);
}
else{
	$north1 = $north;
}

/*------------------------------------------------------------*/

/*------------------------------------------------------------*/
$count_south = strlen($south);
if($count_south > 100){
	$south1 = substr_replace($south, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 100);
}
else{
	$south1 = $south;
}

/*------------------------------------------------------------*/

$count_east = strlen($east);
if($count_east > 100){
	$east1 = substr_replace($east, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 100);
}
else{
	$east1 = $east;
}

/*------------------------------------------------------------*/

$count_west = strlen($west);
if($count_west > 100){
	$west1 = substr_replace($west, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 100);
}
else{
	$west1 = $west;
}

/*------------------------------------------------------------*/

$count_annotation = strlen($annotation);



if($count_annotation > 600){
	$annotation1 = substr_replace($annotation, "...(<i>SEE AT THE BACK FOR FULL DETAILS</i>)", 300);
}
else{
	$annotation1 = $annotation;
}



$location = explode(",", $propertylocation);
$data_trim = array_map('trim', $location);
$search = array_search($municipality, $data_trim);


if($search == 1){
	$municipality = strtolower($location[$search]);
	$barangay = strtolower($location[$search-1]);
	$sitio = "";
}
else if($search == 2){
	$municipality = strtolower($location[$search]);
	$barangay = strtolower($location[$search-1]);
	$sitio = strtolower($location[$search-2]);
}




  	
                

$query2 = mysqli_query($con,"SELECT name FROM user WHERE designation = '2'");
while($row2 = mysqli_fetch_array($query2)){
	$approvedby = $row2['name'];
}



$sum1 = mysqli_query($con,"SELECT * FROM propertydb2_rpt WHERE propertyid = '$id'");
$counting = mysqli_num_rows($sum1);
if($counting > 0){
	while($sums = mysqli_fetch_array($sum1)){
		$sub_classification = $sums['sub_classification'];
		$classification = $sums['classification'];
		$actualuse = $sums['actualuse'];
		if(str_contains($sub_classification, "Residential") || str_contains($sub_classification, "Res") || str_contains($sub_classification, "res")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($actualuse, "Residential") || str_contains($classification, "Residential")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($sub_classification, "Industrial") || str_contains($sub_classification, "Ind") || str_contains($sub_classification, "ind")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($actualuse, "Industrial") || str_contains($classification, "Industrial")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($sub_classification, "Commercial") || str_contains($sub_classification, "Com") || str_contains($sub_classification, "com")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($actualuse, "Commercial") || str_contains($classification, "Commercial")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($sub_classification, "Special")){
			$area_um[] = $sums['area'];		
		}
		else if(str_contains($actualuse, "Special") || str_contains($classification, "Special")){
			$area_um[] = $sums['area'];		
		}
		else{
			$area_um[] = $sums['area'] * 10000;		
		}

	}
}
else{
	$area_um[] = "0";
}
$areasum = array_sum($area_um);



$sum2 = mysqli_query($con,"SELECT SUM(marketvalue) as marketvalues FROM propertydb2_rpt WHERE propertyid = '$propertyid'");
while ($sums2 = mysqli_fetch_array($sum2)) {
$marketvalues = $sums2['marketvalues'];
}

$sum3 = mysqli_query($con,"SELECT SUM(assessedvalue) as assessedvalues FROM propertydb2_rpt WHERE propertyid = '$propertyid'");
while ($sums3 = mysqli_fetch_array($sum3)) {
$assessedvalues = $sums3['assessedvalues'];
}


$sum4 = mysqli_query($con,"SELECT SUM(assessedlevel) as assessedlevels FROM propertydb2_rpt WHERE propertyid = '$propertyid'");
while ($sums4 = mysqli_fetch_array($sum4)) {
$assessedlevels = $sums4['assessedlevels'];
}

//

$sum1s = mysqli_query($con,"SELECT SUM(nooftrees) as nooftrees FROM propertydb3_rpt WHERE propertyid = '$propertyid'");
while ($sums = mysqli_fetch_array($sum1s)) {
$areasums = $sums['nooftrees'];
}

$sum2s = mysqli_query($con,"SELECT SUM(marketvalue) as marketvalues FROM propertydb3_rpt WHERE propertyid = '$propertyid'");
while ($sums2 = mysqli_fetch_array($sum2s)) {
$marketvaluess = $sums2['marketvalues'];
}

$sum3s = mysqli_query($con,"SELECT SUM(assessedvalue) as assessedvalues FROM propertydb3_rpt WHERE propertyid = '$propertyid'");
while ($sums3 = mysqli_fetch_array($sum3s)) {
$assessedvaluess = $sums3['assessedvalues'];
}

$sum3s = mysqli_query($con,"SELECT SUM(assessedlevel) as assessedlevels FROM propertydb3_rpt WHERE propertyid = '$propertyid'");
while ($sums3 = mysqli_fetch_array($sum3s)) {
$assessedlevelss = $sums3['assessedlevels'];
}


$totalarea = $areasum;
$totalmarketvalue = $marketvalues + $marketvaluess;
$totalmarketvalue = $totalmarketvalue / 10;
$totalmarketvalue = round($totalmarketvalue) * 10;

$totalassessedvalue = $assessedvalues + $assessedvaluess;
$totalassessedvalue = $totalassessedvalue / 10;
$totalassessedvalue = round($totalassessedvalue) * 10;

$query4 = mysqli_query($con,"SELECT * FROM co_owners WHERE id ='$taxdec_view'");
while ($row4 = mysqli_fetch_array($query4)) {
	$id = $row['id'];
	$propertyid = $row['id'];					
}


?>



<input type="hidden" id="taxable" value="<?php echo $taxable?>">
<input type="hidden" id="exempt" value="<?php echo $exempt?>">

