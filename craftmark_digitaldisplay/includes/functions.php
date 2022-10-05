<?php

function charset_encode() {
	global $connection;

	if (!mysqli_set_charset($connection, "utf8")) {
		mysqli_error($connection);
		exit();
	} else {
		mysqli_character_set_name($connection);
	}
}

function confirm_query($result_set) {
	if (!$result_set) {
		die("Database query failed.");
	}
}

function get_data($com_id) {
	global $connection;

	$query  = "SELECT * ";
	$query .= "FROM wp_postmeta ";
	$query .= "WHERE post_id = $com_id";
	
	$data = mysqli_query($connection, $query);
	confirm_query($data);

	while ($data_fetch = mysqli_fetch_assoc($data)) {
        $return[] = $data_fetch;
    }

	return $return;
}

function get_image($photo_id) {

	global $connection;

	$query  = "SELECT * ";
	$query .= "FROM wp_postmeta ";
	$query .= "WHERE post_id = $photo_id AND meta_key = '_wp_attached_file'";
	
	$data = mysqli_query($connection, $query);
	confirm_query($data);

	while ($data_fetch = mysqli_fetch_assoc($data)) {
        $return[] = $data_fetch;
    }

	return $return[0]['meta_value'];
}

function array_filtered($features) {
	foreach ($features as $feature) {
		switch ($feature['meta_key']) {
		 	case '1st_column_luxury':
		 		$f_list['luxury_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_luxury':
		 		$f_list['luxury_2']  = $feature['meta_value'];
		 		break;
		 	case '1st_column_kitchen':
		 		$f_list['kitchen_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_kitchen':
		 		$f_list['kitchen_2'] = $feature['meta_value'];
		 		break;
		 	case '1st_column_bathroom':
		 		$f_list['bathroom_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_bathroom':
		 		$f_list['bathroom_2'] = $feature['meta_value'];
		 		break;
		 	case '1st_column_energy':
		 		$f_list['energy_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_energy':
		 		$f_list['energy_2'] = $feature['meta_value'];
		 		break;
		 	case '1st_column_community':
		 		$f_list['community_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_community':
		 		$f_list['community_2'] = $feature['meta_value'];
		 		break;
		 	case '1st_column_quality':
		 		$f_list['quality_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_quality':
		 		$f_list['quality_2'] = $feature['meta_value'];
		 		break;
		 	case '1st_column_safety':
		 		$f_list['safety_1'] = $feature['meta_value'];
		 		break;
		 	case '2nd_column_safety':
		 		$f_list['safety_2'] = $feature['meta_value'];
		 		break;
		 	case 'slider_id':
		 		$f_list['slider_id'] = $feature['meta_value'];
		 		break;
		 	default:
		 		$default = "Please insert the Standard Features!";
		 		break;
		 } 
	}
	return $f_list;
}

function about_filtered($about) {
	foreach ($about as $val) {
		switch ($val['meta_key']) {
			case 'header_brand':
				$about_info['header_brand'] = $val['meta_value'];
				break;
			case 'body_brand':
				$about_info['body_brand'] = $val['meta_value'];
				break;
			case 'image_1_brand':
				$about_info['image_1_brand'] = $val['meta_value'];
				break;
			case 'image_2_brand':
				$about_info['image_2_brand'] = $val['meta_value'];
				break;
			case 'image_3_brand':
				$about_info['image_3_brand'] = $val['meta_value'];
				break;
			case 'header_award':
				$about_info['header_award'] = $val['meta_value'];
				break;
			case 'body_award':
				$about_info['body_award'] = $val['meta_value'];
				break;
			case 'image_1_award':
				$about_info['image_1_award'] = $val['meta_value'];
				break;
			case 'image_2_award':
				$about_info['image_2_award'] = $val['meta_value'];
				break;
			case 'image_3_award':
				$about_info['image_3_award'] = $val['meta_value'];
				break;
			case 'header_green':
				$about_info['header_green'] = $val['meta_value'];
				break;
			case 'body_green':
				$about_info['body_green'] = $val['meta_value'];
				break;
			case 'image_1_green':
				$about_info['image_1_green'] = $val['meta_value'];
				break;
			case 'image_2_green':
				$about_info['image_2_green'] = $val['meta_value'];
				break;
			case 'image_3_green':
				$about_info['image_3_green'] = $val['meta_value'];
				break;
			case 'header_quality':
				$about_info['header_quality'] = $val['meta_value'];
				break;
			case 'body_quality':
				$about_info['body_quality'] = $val['meta_value'];
				break;
			case 'image_1_quality':
				$about_info['image_1_quality'] = $val['meta_value'];
				break;
			case 'image_2_quality':
				$about_info['image_2_quality'] = $val['meta_value'];
				break;
			default:
				$about_info['default'] = "Please insert the information!";
				break;
		}
	}
	return $about_info;
}

function get_screen_saver($gal_id) {
	global $connection;

	$query = "SELECT gal.path, img.filename FROM wp_ngg_pictures AS img ";
	$query .= "JOIN wp_ngg_gallery AS gal ";
	$query .= "ON img.galleryid = gal.gid ";
	$query .= "WHERE img.galleryid = '$gal_id' ";
	$query .= "ORDER BY img.sortorder";
	
	$data = mysqli_query($connection, $query);
	confirm_query($data);

	while ($data_fetch = mysqli_fetch_assoc($data)) {
        $return[] = $data_fetch;
    }

	return $return;
}







