<?php

class gkaJSON {

    /**
	 * Using this method get json data
	 * @author Amra
	 * @return object
     */
    function getJsonData($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
    
        $obj = json_decode($result, true);
    
        return $obj;
    }
}



?>