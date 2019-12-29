<?php 

	$data = file_get_contents("https://wrapapi.com/use/mbriney/tripadvisor/mount_vernon/0.0.1?wrapAPIKey=IdZO1FslpuHYnbzGjGl6xpFXsyhO2aBA");
	$json = json_decode($data, true);
	
	$rating = $json["data"]["rating"];
	$reviews = str_replace(",","",str_replace(" reviews","",$json["data"]["reviews"]));

?>

{
	"frames": [
		{
			"text": "<?php echo $rating; ?>",
			"icon": "i275"
		},
		{
			"text": "<?php echo $reviews; ?>",
			"icon": "i23776"
		}	
	]
}