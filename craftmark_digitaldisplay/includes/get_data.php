<?php
	$com_url = explode("/", $_SERVER['REQUEST_URI']);

	switch ($com_url[3]) {
		case 'crest-of-alexandria':
			$com_post_id = 17;
			break;
		case 'preserve-at-westfields':
			$com_post_id = 24;
			break;
		case 'clarksburg-town-center':
			$com_post_id = 126;
			break;
		case 'primrose-hill':
			$com_post_id = 169;
			break;
		case 'mateny-hill':
			$com_post_id = 171;
			break;
		case 'towns-at-south-alex':
			$com_post_id = 278;
			break;
		default:
			$com_post_id = 0;
			break;
	}
	charset_encode();
	
    $standard_features = get_data($com_post_id); 
    $f_list[] = array_filtered($standard_features);
?>