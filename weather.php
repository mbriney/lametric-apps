<?php 
if ($_GET["location"] != ""){

	$rain = array("t", "hr", "lr", "s");
	$snow = array("sn", "sl");

	$data = file_get_contents("https://www.metaweather.com/api/location/".$_GET["location"]."/");
	$json = json_decode($data, true);
	
	$tomorrow =  $json["consolidated_weather"][0]["weather_state_abbr"];

	// Default weather if not blank
	$response = "No";
	$icon = "i1681";	

	if (in_array($tomorrow, $rain)) {
		$response = "Yes";
		$icon = "i1681";	
	}	
	if (in_array($tomorrow, $snow)) {
		$response = "Snow!";
		$icon = "i2151";	
	}	
	
	if ($tomorrow == ""){
		$response = "config";
		$icon = "i21003";
	}
	
	
} else {
	$response = "config";
	$icon = "i21003";
}

?>

{
	"frames": [
		{
			"text": "<?php echo $response; ?>",
			"icon": "<?php echo $icon; ?>"
		}
	]
}