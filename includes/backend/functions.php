<?php

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$json_db_url = $base_url."/database-json/";

function consoleLog($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function getJsonData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    curl_close($ch);

    $obj = json_decode($result, true);

    return $obj;
}

function charsetEncode() {
	global $connection;

	if (!mysqli_set_charset($connection, "utf8")) {
		mysqli_error($connection);
		exit();
	} else {
		mysqli_character_set_name($connection);
	}
}

// function confirm_query($result_set) {
//     if (!$result_set) {
//         die("Database query failed.");
//     }
// }

function confirm_query($result_set, $message = "Database query failed.") {
    if (!$result_set) {
        die($message);
    }
}


function phoneNumberFormat($number) {
    $number = preg_replace("/[^\d]/","",$number);
    $length = strlen($number);
    if($length == 10) {
            $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1) $2-$3", $number);
    }
    return $number;
}

function clean($string) {
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^a-zA-Z0-9]+/', '', $string); // Removes special chars.
}

function getQuickMoveInsListingType($listing_type) {
    switch ($listing_type) {
        case 13: 
            $prop_type = "townhomes";
            break;
        case 14: $prop_type = "condominiums";
            break;
        case 15: $prop_type = "singleFamily";
            break;
        default:
            break;
    }
    return $prop_type;
}

function getQuickMoveIns($id, $community_name) {
    global $connection;

    $query_wp = "SELECT
                    prop.id AS id,
                    prop.listing AS listing_type,
                    prop.field_313 AS property_name,
                    prop.price AS price,
                    prop.living_area AS sq_feet,
                    prop.bedrooms AS bedrooms,
                    prop.bathrooms AS baths_full,
                    prop.field_3001 AS baths_half,
                    prop.location3_name AS county,
                    prop.field_3002 AS list_status,
                    prop.field_3006 AS c_lat,
                    prop.field_3005 AS c_long,
                    prop.googlemap_lt AS google_lat,
                    prop.googlemap_ln AS google_long,
                    prop.street_no AS street_number,
                    prop.field_42 AS street_name,
                    prop.location4_name AS city,
                    prop.location2_name AS state,
                    prop.zip_name AS zip,
                    prop.location3_name AS county,
                    prop.field_3007 AS agent1_fname,
                    prop.field_3008 AS agent1_lname,
                    prop.field_3009 AS agent1_email,
                    prop.field_3010 AS agent1_phone,
                    prop.field_3175 AS agent2_fname,
                    prop.field_3176 AS agent2_lname,
                    prop.field_3177 AS agent2_email,
                    prop.field_3178 AS agent2_phone,
                    item.item_name AS gallery,
                    item.item_extra1 AS gal_title,
                    item.item_extra2 AS gal_desc,
                    prop.field_3011 AS community_id,
                    dbst.options AS community_options,
                    prop.field_308 AS description,
                    prop.field_3150 AS fp_townhomes,
                    prop.field_3151 AS fp_condominiums,
                    prop.field_3152 AS fp_single_family,
                    prop.field_3167 AS virtual_tour,
                    prop.field_3174 AS video_tour,
                    prop.field_3181 AS image_tour,
                    prop.deleted,
                    prop.f_3153_options,
                    prop.f_3153,
                    prop.f_3154_options,
                    prop.f_3154,
                    prop.f_3155_options,
                    prop.f_3155,
                    prop.f_3156_options,
                    prop.f_3156,
                    prop.f_3157_options,
                    prop.f_3157,
                    prop.f_3158_options,
                    prop.f_3158
                FROM wp_wpl_properties AS prop
                LEFT JOIN (
                    SELECT 
                        parent_id, 
                        item_name,
                        item_extra1, 
                        item_extra2
                    FROM wp_wpl_items 
                    WHERE `index` = 1 
                    GROUP BY parent_id
                ) AS item
                ON prop.id = item.parent_id
                LEFT JOIN wp_wpl_dbst AS dbst
                ON dbst.id = 3011
                WHERE prop.finalized = 1 AND prop.confirmed = 1 AND prop.deleted = 0";
    if($id) {
        $query_wp .= " AND prop.id = {$id}";
    }
    $query_wp .= " ORDER BY CASE WHEN prop.field_3002 = 'SOLD!' THEN 1 ELSE 0 END, prop.add_date DESC";
    // if($community_name) {
    //     $query_wp .= " AND prop.id = {$id}";
    // } 
    $data = mysqli_query($connection, $query_wp);
    confirm_query($data, "Error: Unable to fetch data from database.");
    
    while($data_fetch = mysqli_fetch_assoc($data)) {
        $response[] = $data_fetch;
    }

    return $response;
}

function getDbstParams($id, $type, $cat) {

    global $connection;

    $query_wp = "SELECT 
                        dbst.options,
                        dbst.id,
                        dbst.table_column
                    FROM wp_wpl_dbst as dbst";
    if($type) {
        $query_wp .= " WHERE dbst.type = '$type' AND dbst.category = $cat";
    } if ($id) {
        $query_wp .= " WHERE dbst.id IN ('$id') AND enabled = 1";
    }
    $data = mysqli_query($connection, $query_wp);
    confirm_query($data);
    
    while($data_fetch = mysqli_fetch_assoc($data)) {
        $response[] = $data_fetch;
    }

    return $response;
}

function getQmiGallery($id) {
    global $connection;

    $query_wp = "SELECT 
                item_name AS gallery,
                item_extra1 AS item_title,
                item_extra2 AS item_desc
                FROM wp_wpl_items
                WHERE parent_id = {$id}
                ORDER BY wp_wpl_items.index";

    $data = mysqli_query($connection, $query_wp);
    confirm_query($data);
    
    while($data_fetch = mysqli_fetch_assoc($data)) {
        $response[] = $data_fetch;
    }

    return $response;
}

function getBlog() {
    global $connection;

    $query_wp = "SELECT 
                        post.ID,
                        post.post_title,
                        post.post_type,
                        post.post_date,
                        post.featured_image_blog,
                        meta.meta_value as listing_image,
                        post.post_status,
                        post.post_excerpt,
                        post.post_name
                    FROM (
                        SELECT 
                            p.ID, 
                            p.post_title, 
                            p.post_type,
                            p.post_date,
                            p.post_status,
                            p.post_excerpt,
                            p.post_name,
                            MAX(CASE WHEN pm.meta_key = 'featured_image_blog' then pm.meta_value ELSE NULL END) AS featured_image_blog
                        FROM wp_posts as p
                        LEFT JOIN wp_postmeta as pm
                        ON p.ID = pm.post_id
                        GROUP BY p.ID
                        ORDER BY p.post_date DESC
                    ) AS post
                    LEFT JOIN wp_postmeta AS meta
                    ON meta.meta_key = '_wp_attached_file'
                    AND meta.post_id = post.featured_image_blog
                    WHERE post.post_type = 'blog' AND post.post_status = 'publish'
                    LIMIT 5";
    $data = mysqli_query($connection, $query_wp);
    confirm_query($data);

    while($data_fetch = mysqli_fetch_assoc($data)) {
        $response[] = $data_fetch;
    }

    return $response;
}

function getBlogArchives($start, $limit) {
    global $connection;

    $query_wp = "SELECT 
                    post.ID,
                    post.post_title,
                    post.post_type,
                    post.post_date,
                    post.featured_image_blog,
                    meta.meta_value as listing_image,
                    post.post_status,
                    post.post_excerpt,
                    post.post_name
                FROM (
                    SELECT 
                        p.ID, 
                        p.post_title, 
                        p.post_type,
                        p.post_date,
                        p.post_status,
                        p.post_excerpt,
                        p.post_name,
                        MAX(CASE WHEN pm.meta_key = 'featured_image_blog' then pm.meta_value ELSE NULL END) AS featured_image_blog
                    FROM wp_posts as p
                    LEFT JOIN wp_postmeta as pm
                    ON p.ID = pm.post_id
                    GROUP BY p.ID
                    ORDER BY p.post_date DESC
                ) AS post
                LEFT JOIN wp_postmeta AS meta
                ON meta.meta_key = '_wp_attached_file'
                AND meta.post_id = post.featured_image_blog
                WHERE post.post_type = 'blog' AND post.post_status = 'publish'
                LIMIT $start, $limit";

    $data = mysqli_query($connection, $query_wp);
    confirm_query($data);

    while($data_fetch = mysqli_fetch_assoc($data)) {
        $response[] = $data_fetch;
    }

    return $response;
}


$states = array(
    'Alabama'=>'AL',
    'Alaska'=>'AK',
    'Arizona'=>'AZ',
    'Arkansas'=>'AR',
    'California'=>'CA',
    'Colorado'=>'CO',
    'Connecticut'=>'CT',
    'Delaware'=>'DE',
    'Florida'=>'FL',
    'Georgia'=>'GA',
    'Hawaii'=>'HI',
    'Idaho'=>'ID',
    'Illinois'=>'IL',
    'Indiana'=>'IN',
    'Iowa'=>'IA',
    'Kansas'=>'KS',
    'Kentucky'=>'KY',
    'Louisiana'=>'LA',
    'Maine'=>'ME',
    'Maryland'=>'MD',
    'Massachusetts'=>'MA',
    'Michigan'=>'MI',
    'Minnesota'=>'MN',
    'Mississippi'=>'MS',
    'Missouri'=>'MO',
    'Montana'=>'MT',
    'Nebraska'=>'NE',
    'Nevada'=>'NV',
    'New Hampshire'=>'NH',
    'New Jersey'=>'NJ',
    'New Mexico'=>'NM',
    'New York'=>'NY',
    'North Carolina'=>'NC',
    'North Dakota'=>'ND',
    'Ohio'=>'OH',
    'Oklahoma'=>'OK',
    'Oregon'=>'OR',
    'Pennsylvania'=>'PA',
    'Rhode Island'=>'RI',
    'South Carolina'=>'SC',
    'South Dakota'=>'SD',
    'Tennessee'=>'TN',
    'Texas'=>'TX',
    'Utah'=>'UT',
    'Vermont'=>'VT',
    'Virginia'=>'VA',
    'Washington'=>'WA',
    'West Virginia'=>'WV',
    'Wisconsin'=>'WI',
    'Wyoming'=>'WY'
);