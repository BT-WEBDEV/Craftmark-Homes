<?php

$cur_url = explode('/', $_SERVER['REQUEST_URI']);
$currentURI = $cur_url[1];

if($currentURI == "") {
	$currentURI = "home";
}
if($currentURI == "communities") {
	$currentURI = $cur_url[2];
}

// Read JSON file
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/database-json/seo_data.json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);

$seo_data = json_decode($result, true);

$title = $seo_data['seo_contents'][0]['titleTag'];
$metaDesc = $seo_data['seo_contents'][0]['MetaDescription'];
$keywords = $seo_data['seo_contents'][0]['keywords'];


foreach ($seo_data['seo_contents'] as $key => $value) {
	if($currentURI == $value['url']) {
		$title = $value['titleTag'];
		$metaDesc = $value['MetaDescription'];
		$keywords = $value['keywords'];
	} 
}

?>