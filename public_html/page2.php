<?php
	$author_name = "Markus Kiil";
	//var_dump($_POST);
	$todays_adjective_html = null;
	$todays_adjective_error = null;
	$todays_adjective = null;
	if(isset($_POST["adjective_submit"])){
		//echo "Klikiti!";
		if(!empty($_POST["todays_adjective_input"])){
		$todays_adjective_html = "<p>Tanane paev on " . $_POST["todays_adjective_input"] .".</p>";
		}
	} else {
		$todays_adjective_error="Palun sisesta tanase kohta sobiv omadussona!";
	}
	
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
	
	$photo_list_html = "\n <ul> \n";
	for($i = 0;$i < $file_count;$i ++){
		$photo_list_html .= "<li>" .$photo_files[$i] ."</li>"
	}	
	$photo_list_html .= "</ul> \n";
	
	
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
	<p>                                                                      </p>
	<p>Õppetöö toimub <a href="https://www.tlu.ee/dt">Tallinna Ülikooli Digitehnoloogiate Instituudis.</a>
	<hr>
	<form method="POST">
		<input type="text" placeholder="Minecraft" name="todays_adjectives_input" value="<?php echo $todays_adjective; ?>">
		<input type="submit" name="adjective_submit" value="Saada">
		<span><?php echo $todays_adjective_error; ?></span>
	</form>
	<?php echo $todays_adjective_html; ?>
	<hr>
	<?php
		echo $photo_html;
		echo $photo_list_html;
	?>
</body>
</html>