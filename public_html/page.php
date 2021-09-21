<?php
	$author_name = "Markus Kiil";
	$full_time_now = date("d.m.Y H:i:s");
	$weekday_now = date("N");
	$day_category = "lihtsalt päev";
	//echo $day_category;
	// võrdub ==
	if ($weekday_now <= 5) {
		$day_category = "koolipäev";
	} else {
		$day_category = "puhkepäev";
	}
	$weekday_names_et = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapev", "Reede", "Laupäev", "Pühapäev"];
	//echo $weekday_names_et [2];
	// juhuslikud fotod
	$photo_dir = "Photos catalog/";
	//loeng kataloogi sisu
	$all_files = scandir($photo_dir);
	$all_real_files = array_slice($all_files, 2);
	
	//sõelume välja päris pildid
	$photo_files = [];
	$allowed_photo_types = ["image/jpeg", "image/jpg", "image/png"];
	foreach($all_real_files as $file_name){
		$file_info = getimagesize($photo_dir .$file_name);
		if(isset($file_info["mime"])){
			if(in_array($file_info["mime"], $allowed_photo_types)){
			array_push($photo_files, $file_name);
			}
		}
	}
	//var_dump($all_real_files);
	//loen elemendid kokku
	$file_count = count($photo_files);
	//randomizer (nt 0-3)
	$photo_num = mt_rand(0, $file_count - 1);
	//<img src="kataloog/fail" alt="Tallinna Ülikool">
	$photo_html = '<img src="' .$photo_dir .$photo_files[$photo_num] . '" alt=Tallinna Ülikool">';
?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?>, Veebiprogrammeerimine</title>
</head>
<body>
	<h1><?php echo $author_name; ?>, Veebiprogrammeerimine</h1>
	<p>See leht on loodud õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</p>
	<p>Õppetöö toimub <a href="https://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate Instituudis.</a></p>
	<img src="tlu.jpg" alt="Tallinna Ülikooli Terra hoone" width="600">
	<p>Lehe avamise hetk: <?php echo $weekday_names_et [$weekday_now - 1] .", " .$full_time_now .", " . $day_category; ?>.<p>
	<?php echo $photo_html; ?>
</body>
</html>