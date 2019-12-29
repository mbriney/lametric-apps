<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if (isset($_GET["location"])){
		$location = $_GET["location"];
	} else {
		$location = "America/New_York";
	}
	date_default_timezone_set($location);
	
	$current_year = date("Y");
	$next_year = $current_year+1;
	
	$now = new DateTime();
	$nye = new DateTime($next_year.'-01-01 00:00:00');
	$interval = $nye->diff($now);
	//echo $interval->format("%a days, %h hours, %i minutes, %s seconds");
	if (date("m-d") != "12-31" && date("m-d") != "01-01"){ ?>
		<?php if (date("m-d") == "12-30"){ ?>
			{
				"frames": [
					{
						"text": "<?php echo $interval->format("%a day")?>",
						"icon": null
					}								
				]
			}	
		<?php } else { ?>	
			{
				"frames": [
					{
						"text": "<?php echo $interval->format("%a days")?>",
						"icon": null
					}								
				]
			}	
		<?php } ?>	
	<?php } ?>	
	<?php if (date("m-d") == "01-01"){ ?>
		{
			"frames": [
				{
					"text": "Happy New Year!",
					"icon": "a7559",
					"duration" : 10000				
				}								
			]
		}
	<?php } ?>
	<?php if (date("m-d") == "12-31"){ ?>
		<?php if ($interval->format("%h") > 0){ // Hours left to go ?>
			{
				"frames": [
					{
						"text": "<?php echo $interval->format("%h hours")?>",
						"icon": null
					}								
				]
			}		
		<?php } ?>
		<?php if ($interval->format("%h") == 0 && $interval->format("%i") > 0){ // Minutes left to go ?>
			{
				"frames": [
					{
						"text": "<?php echo $interval->format("%i min")?>",
						"icon": null
					}								
				]
			}		
		<?php } ?>
		<?php if ($interval->format("%h") == 0 && $interval->format("%i") == 0 && $interval->format("%s") > 10 ){ // Seconds to go ?>
			{
				"frames": [
					{
						"text": "<?php echo $interval->format("%s sec")?>",
						"icon": null
					}								
				]
			}			
		<?php } ?>
		<?php if ($interval->format("%h") == 0 && $interval->format("%i") == 0 && $interval->format("%s") < 11 ){ // Countdown (probably need to generate this countdown instead of manually specifying it) ?>
			{
				"frames": [
					{
						"text": "Ten",
						"icon": null,
						"duration" : 1
					},	
					{
						"text": "Nine",
						"icon": null,
						"duration" : 1
					},	
					{
						"text": "Eight",
						"icon": null,
						"duration" : 1
					},	
					{
						"text": "Seven",
						"icon": null,
						"duration" : 1
					},	
					{
						"text": "Six",
						"icon": null,
						"duration" : 1
					},
					{
						"text": "Five",
						"icon": null,
						"duration" : 1
					},	
					{
						"text": "Four",
						"icon": null,
						"duration" : 1
					},
					{
						"text": "Three",
						"icon": null,
						"duration" : 1
					},
					{
						"text": "Two",
						"icon": null,
						"duration" : 1
					},
					{
						"text": "One",
						"icon": null,
						"duration" : 1
					},
					{
						"text": "Happy New Year!",
						"icon": "a7559",
						"duration" : 10000
					}								
				]
			}
		<?php } ?>
	<?php } ?>
