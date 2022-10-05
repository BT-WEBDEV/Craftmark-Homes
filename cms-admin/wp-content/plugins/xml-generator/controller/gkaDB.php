<?php
/** no direct access **/
// defined('_WPLEXEC') or die('Restricted access');

class gkaDB {

    /**
	 * Using this method select gka_settings table row to column
	 * @author Amra
	 * @return array
     */
    function getSettings() {
        global $wpdb;

        $query =   "SELECT  MAX(CASE WHEN setting_name = 'CorporateBuilderNumber' then setting_value ELSE NULL END) AS CorporateBuilderNumber,
                        MAX(CASE WHEN setting_name = 'CorporateState' then setting_value ELSE NULL END) AS CorporateState,
                        MAX(CASE WHEN setting_name = 'CorporateName' then setting_value ELSE NULL END) AS CorporateName,
                        MAX(CASE WHEN setting_name = 'CorporateReportingEmail' then setting_value ELSE NULL END) AS CorporateReportingEmail,
                        MAX(CASE WHEN setting_name = 'communityJson' then setting_value ELSE NULL END) AS communityJson,
                        MAX(CASE WHEN setting_name = 'BuilderNumber' then setting_value ELSE NULL END) AS BuilderNumber,
                        MAX(CASE WHEN setting_name = 'BrandName' then setting_value ELSE NULL END) AS BrandName,
                        MAX(CASE WHEN setting_name = 'BrandLogo_Med' then setting_value ELSE NULL END) AS BrandLogo_Med,
                        MAX(CASE WHEN setting_name = 'ReportingName' then setting_value ELSE NULL END) AS ReportingName,
                        MAX(CASE WHEN setting_name = 'DefaultLeadsEmail' then setting_value ELSE NULL END) AS DefaultLeadsEmail,
                        MAX(CASE WHEN setting_name = 'BuilderWebsite' then setting_value ELSE NULL END) AS BuilderWebsite,
                        MAX(CASE WHEN setting_name = 'floorplanJson' then setting_value ELSE NULL END) AS floorplanJson
                FROM {$wpdb->prefix}gka_settings";

        $wpdb->show_errors( true );
        $wpdb->prepare($query);
        $settings = $wpdb->get_row($query);

        return $settings;
    }

    /**
	 * Using this method insert values to gka_settings table
	 * @author Amra
	 * @return null
     */
    function insertSettings($values) {
        global $wpdb;
        $settings = array();

        foreach ($values as $key => $value) {
            if($value) {
                $settings[] = "('{$key}', '{$value}')";
            }
        }
        $queryString = implode( ', ', $settings );

        $query =   "INSERT INTO {$wpdb->prefix}gka_settings (setting_name, setting_value) 
                    VALUES $queryString
                    ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)";
        $wpdb->query($query);

        ?>
        <div id="setting-error-settings_updated" class="updated setting-error notice is-dismissible">
			<strong>Settings have been saved.</strong>
		</div>
        <?php
    }

    /**
	 * Using this method select WPL(quickDelivieries)
	 * @author Amra
	 * @return array
     */
    function getWPLProperties() {
        global $wpdb;

        $query =   "SELECT *
                    FROM {$wpdb->prefix}wpl_properties 
                    WHERE finalized = 1 AND confirmed = 1";

        $wpdb->show_errors( true );
        $wpdb->prepare($query);

        $properties = $wpdb->get_results($query);

        return $properties;
    }

    /**
	 * Using this method select WPL(quickDelivieries) select options
	 * @author Amra
	 * @return array
     */
    function getWPLOptions($id) {
        global $wpdb;

        $query =   "SELECT options
                    FROM {$wpdb->prefix}wpl_dbst
                    WHERE id = $id";

        $wpdb->show_errors( true );
        $wpdb->prepare($query);

        $options = $wpdb->get_row($query);

        return $options;        
    }

    /**
	 * Using this method select WPL(quickDelivieries) gallery
	 * @author Amra
	 * @return array
     */
    function getWPLGallery($parent_id, $item_type, $item_cat) {
        global $wpdb;

        if($item_cat == "image") {
            $query_add = "AND (item_cat = 'image' OR item_cat = 'interior')";
        } else {
            $query_add = "AND item_cat = '$item_cat'";
        }

        $query =   "SELECT *
                    FROM {$wpdb->prefix}wpl_items
    WHERE parent_id = $parent_id AND item_type = '$item_type' {$query_add}";

        $wpdb->show_errors( true );
        $wpdb->prepare($query);

        $items = $wpdb->get_results($query);

        return $items;
    }
}

?>