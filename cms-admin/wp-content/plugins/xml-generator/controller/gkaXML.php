<?php

class gkaXML {

    public $_settings;
    public $_communities;
    public $_floorplans;
    public $_properties;

    public $_wpl_com_options;
    public $_wpl_fp_co_options;
    public $_wpl_fp_sf_options;
    public $_wpl_fp_th_options;
    public $_wpl_sales_status_options;
    public $_wpl_appliance_options;
    public $_wpl_cooling_system_options;

    public $_state_abbr;

    /**
	 * Using this method initialize json, sql datas
	 * @author Amra
     */
    function __construct() {
        $this->_settings = gkaDB::getSettings();
        $this->_communities = gkaJSON::getJsonData($this->_settings->communityJson);
        $this->_floorplans = gkaJSON::getJsonData($this->_settings->floorplanJson);
        $this->_properties = gkaDB::getWPLProperties();

        $this->_wpl_com_options = json_decode(gkaDB::getWPLOptions(3011)->options, true);
        $this->_wpl_fp_th_options = json_decode(gkaDB::getWPLOptions(3150)->options, true);
        $this->_wpl_fp_co_options = json_decode(gkaDB::getWPLOptions(3151)->options, true);
        $this->_wpl_fp_sf_options = json_decode(gkaDB::getWPLOptions(3152)->options, true);
        $this->_wpl_sales_status_options = json_decode(gkaDB::getWPLOptions(3168)->options, true);
        $this->_wpl_appliance_options = json_decode(gkaDB::getWPLOptions(3171)->options, true);
        $this->_wpl_cooling_system_options = json_decode(gkaDB::getWPLOptions(3172)->options, true);

        $this->_state_abbr = array(
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
            'Wyoming'=>'WY',
            'District Of Columbia'=>'DC'
        );
    }

    /**
	 * Using this method phonenumber to area code, prefix, suffix
	 * @author Amra
	 * @return int
     */
    function phoneNumberFormat($number) {
        $number = str_replace(' ', '', $number);
        $number = preg_replace('/[^a-zA-Z0-9]+/', '', $number);

        if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $number,  $matches ) ) {
            return $matches;
        }
        if(  preg_match( '/^\d(\d{3})(\d{3})(\d{4})$/', $number,  $matches ) ) {
            return $matches;
        }
    }
    
    /**
	 * Using this method remove all spaces and special chars
	 * @author Amra
	 * @return int
     */
    function clean($string) {
        $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^a-zA-Z0-9]+/', '', $string); // Removes special chars.
    }

    /**
	 * Using this method find correct floorplan version
	 * @author Amra
	 * @return array
     */
    function getFPVersion($versions, $communityUrl) {
        foreach ($versions as $key => $version) {
            if($version['galUrl'] == $communityUrl) {
                return $version;
                break;
            }
        }
    }

    /**
	 * Using this method create Zillow XML file
	 * @author Amra
	 * @return xml
     */
    function create_zillow_xml() {
        $dom = new DOMDocument('1.0','UTF-8');
        $dom->formatOutput = true;

        // Builders
        $Builders = $dom->createElement('Builders');
        $dom->appendChild($Builders);

            // Corporation
            $Corporation = $dom->createElement('Corporation');
            $Builders->appendChild($Corporation);
            $Corporation->appendChild( $dom->createElement('CorporateBuilderNumber', $this->_settings->CorporateBuilderNumber) );
            $Corporation->appendChild( $dom->createElement('CorporateState', $this->_settings->CorporateState) );
            $Corporation->appendChild( $dom->createElement('CorporateName', $this->_settings->CorporateName) );
            $Corporation->appendChild( $dom->createElement('CorporateReportingEmail', $this->_settings->CorporateReportingEmail) );

                // Builder
                $Builder = $dom->createElement('Builder');
                $Corporation->appendChild($Builder);
                $Builder->appendChild( $dom->createElement('BuilderNumber', $this->_settings->BuilderNumber) );
                $Builder->appendChild( $dom->createElement('BrandName', $this->_settings->BrandName) );
                $Builder->appendChild( $dom->createElement('BrandLogo_Med', $this->_settings->BrandLogo_Med) );
                $Builder->appendChild( $dom->createElement('ReportingName', $this->_settings->ReportingName) );
                $Builder->appendChild( $dom->createElement('DefaultLeadsEmail', $this->_settings->DefaultLeadsEmail) );
                $Builder->appendChild( $dom->createElement('BuilderWebsite', $this->_settings->BuilderWebsite) );
    
                    // Communities as Subdivisions
                    foreach ($this->_communities['communities'] as $key => $community) {
                        if($community['zillow']['Status']) {
                            $Subdivision = $this->SubdivisionXml($dom, $key, $community);
                            $Builder->appendChild($Subdivision);
                        }
                    // break;
                    }

        // echo '<xmp>'. $dom->saveXML() .'</xmp>';
    
        $file_dir = GKA__UPLOAD_DIR . "/xml/";
        $file_name = "zillow.xml";
        $file_url = GKA__UPLOAD_URL . "/xml/zillow.xml";
    
        $dom->save($file_dir.$file_name) or die('XML Create Error');

        ?>
<div id="setting-error-settings_updated" class="updated setting-error notice is-dismissible">
    <strong>File successfully generated. File name: <?php echo $file_url; ?> </strong><br>
    <a target="_blank" href="<?php echo $file_url; ?>" download> Click to Download XML File</a>
</div>
<?php
    }

    /**
	 * Using this method create Subdivision(Community) of Zillow XML
	 * @author Amra
	 * @return object
     */
    function SubdivisionXml($dom, $key, $community) {
        // Subdivision
        $Subdivision = $dom->createElement('Subdivision');
        $Subdivision->setAttribute("Status", $community['zillow']['Status']);
            $Subdivision->appendChild( $dom->createElement('SubdivisionNumber', $this->_settings->BuilderNumber."Sub".$key) );
            $Subdivision->appendChild( $dom->createElement('SubdivisionName', $community['name']) );
            $Subdivision->appendChild( $dom->createElement('UseDefaultLeadsEmail', ($community['salesAgent']['agents'][0]['email']) ? 0 : 1) );
            $Subdivision->appendChild( $dom->createElement('SubLeadsEmail', $community['salesAgent']['agents'][0]['email']) );
            $Subdivision->appendChild( $dom->createElement('CommunityStyle', $community['zillow']['CommunityStyle']) );
            $Subdivision->appendChild( $dom->createElement('CommunityVideo', $community['zillow']['CommunityVideo']) );

            // SalesOffice
            $SalesOffice = $dom->createElement('SalesOffice');
            $Subdivision->appendChild($SalesOffice);
                $SalesOffice->appendChild( $dom->createElement('Agent', $community['salesAgent']['agents'][0]['agentName']) );

                // Address
                $Address = $dom->createElement('Address');
                $Address->setAttribute("OutOfCommunity", ($community['address']['addresses'][0]['outOfCommunity']) ? 1 : 0);
                $SalesOffice->appendChild($Address);
                    $Address->appendChild( $dom->createElement('Street1', $community['address']['addresses'][0]['address']['street1']) );
                    $Address->appendChild( $dom->createElement('City', $community['address']['addresses'][0]['address']['city']) );
                    $Address->appendChild( $dom->createElement('State', $community['address']['addresses'][0]['address']['state']) );
                    $Address->appendChild( $dom->createElement('ZIP', $community['address']['addresses'][0]['address']['zip']) );
                    // Geocode
                    $Geocode = $dom->createElement('Geocode');
                    $Address->appendChild($Geocode);
                        $Geocode->appendChild( $dom->createElement('Latitude', $community['address']['coords'][0]) );
                        $Geocode->appendChild( $dom->createElement('Longitude', $community['address']['coords'][1]) );

                // Phone
                $Phone = $dom->createElement('Phone');
                $SalesOffice->appendChild($Phone);
                    $phoneNumber = $this->phoneNumberFormat($community['salesAgent']['agents'][0]['phone']);
                    $Phone->appendChild( $dom->createElement('AreaCode',  $phoneNumber[1]) );
                    $Phone->appendChild( $dom->createElement('Prefix',  $phoneNumber[2]) );
                    $Phone->appendChild( $dom->createElement('Suffix',  $phoneNumber[3]) );
                    if($phoneNumber[4]) {
                        $Phone->appendChild( $dom->createElement('Extension',  $phoneNumber[4]) );
                    }

                // Hours
                $SalesOffice->appendChild($dom->createElement('Hours', $community['openHours']['hours']));

                // HoursDetail
                $HoursDetail = $dom->createElement('HoursDetail');
                $SalesOffice->appendChild($HoursDetail);
                    if(sizeof($community['zillow']['HoursDetail']) > 0) {
                        foreach ($community['zillow']['HoursDetail'] as $key => $hours) {
                            $Day = $dom->createElement('Day');
                            $HoursDetail->appendChild($Day);
                                $Day->appendChild( $dom->createElement('DayOfWeek',  $hours[0]) );
                                $Day->appendChild( $dom->createElement('StartTime',  $hours[1]) );
                                $Day->appendChild( $dom->createElement('EndTime',  $hours[2]) );
                        }
                    }
                    $HoursDetail->appendChild( $dom->createElement('ByAppointment',  $community['zillow']['ByAppointment']) );
            
            // SubAddress
            $SubAddress = $dom->createElement('SubAddress');
            $Subdivision->appendChild($SubAddress);
                $SubAddress->appendChild( $dom->createElement('SubStreet1',  $community['address']['addresses'][0]['address']['street1']) );
                $SubAddress->appendChild( $dom->createElement('SubCity',  $community['address']['addresses'][0]['address']['city']) );
                $SubAddress->appendChild( $dom->createElement('SubState',  $community['address']['addresses'][0]['address']['state']) );
                $SubAddress->appendChild( $dom->createElement('SubZIP',  $community['address']['addresses'][0]['address']['zip']) );

                // SubGeocode
                $SubGeocode = $dom->createElement('SubGeocode');
                $SubAddress->appendChild($SubGeocode);
                    $SubGeocode->appendChild( $dom->createElement('SubLatitude',  $community['address']['coords'][0]) );
                    $SubGeocode->appendChild( $dom->createElement('SubLongitude',  $community['address']['coords'][1]) );
            
            // DrivingDirections
            $DrivingDirections = $dom->createElement('DrivingDirections');
            $DrivingDirections->appendChild($dom->createTextNode($community['zillow']['DrivingDirections']));
            $Subdivision->appendChild($DrivingDirections);

            // Schools
            $Schools = $dom->createElement('Schools');
            $Subdivision->appendChild($Schools);
                $Schools->appendChild( $dom->createElement('DistrictName',  $community['zillow']['Schools']['DistrictName']) );
                $Schools->appendChild( $dom->createElement('Elementary',  $community['zillow']['Schools']['Elementary']) );
                $Schools->appendChild( $dom->createElement('Middle',  $community['zillow']['Schools']['Middle']) );
                $Schools->appendChild( $dom->createElement('High',  $community['zillow']['Schools']['High']) );
            
            // SubAmenity
            foreach ($community['zillow']['SubAmenity'] as $key => $amenity) {
                $SubAmenity = $dom->createElement('SubAmenity', 1);
                $SubAmenity->setAttribute("Type", $amenity);
                $Subdivision->appendChild($SubAmenity);
            }

            // Service
            foreach ($community['zillow']['Service'] as $key => $service) {
                $Service = $dom->createElement('Service');
                $Service->setAttribute("Type", $service[0]);
                $Subdivision->appendChild($Service);
                    $Service->appendChild( $dom->createElement('ServiceName',  $service[1]) );
                    $Service->appendChild( $dom->createElement('MonthlyFee',  $service[2]) );
            }

            // SubDescription
            $SubDescription = $dom->createElement('SubDescription');
            $SubDescription->appendChild($dom->createTextNode($community['zillow']['SubDescription']));
            $Subdivision->appendChild($SubDescription);

            // SubImage - Standard
            foreach ($community['gallery'] as $key => $SubGal) {
                $SubImage = $dom->createElement('SubImage', GKA__BASE_URL.'/communities/'.$community['url'].'/images/slider/slide'.$SubGal[0].'.jpg');
                $SubImage->setAttribute('Type', 'Standard');
                $SubImage->setAttribute('SequencePosition', $SubGal[0]);
                $SubImage->setAttribute('Caption', $SubGal[1]);
                $Subdivision->appendChild($SubImage);
            }
            // SubImage - LotMap
            foreach ($community['sitePlans'] as $key => $sitePlan) {
                $SubImage = $dom->createElement('SubImage', GKA__BASE_URL.'/communities/'.$community['url'].'/sp-image/'.$sitePlan['0']);
                $SubImage->setAttribute('Type', 'LotMap');
                $SubImage->setAttribute('SequencePosition', $key);
                $SubImage->setAttribute('Caption', $sitePlan[1]);
                $Subdivision->appendChild($SubImage);
            }

            // SubVideoFile
            $SubVideoFile = $dom->createElement('SubVideoFile', $community['zillow']['SubVideoFile']['URL'] );
            $SubVideoFile->setAttribute("Title", $community['zillow']['SubVideoFile']['Title']);
            $Subdivision->appendChild($SubVideoFile);

            // SubVideoTour
            $SubVideoTour = $dom->createElement('SubVideoTour', $community['zillow']['SubVideoTour']['URL'] );
            $SubVideoTour->setAttribute("Title", $community['zillow']['SubVideoTour']['Title']);
            $Subdivision->appendChild($SubVideoTour);

            // SubWebsite
            $Subdivision->appendChild( $dom->createElement('SubWebsite', GKA__BASE_URL.'/communities/'.$community['url']) );

            // Promotion
            $Promotion = $dom->createElement('Promotion');
            $Subdivision->appendChild($Promotion);
                $PromoDescription = $dom->createElement('PromoDescription');
                $PromoDescription->appendChild($dom->createTextNode($community['zillow']['Promotion']['PromoDescription']));
                $Promotion->appendChild($PromoDescription);
            
            // OpenAmenity
            foreach ($community['zillow']['OpenAmenity'] as $key => $amenity) {
                $OpenAmenity = $dom->createElement('OpenAmenity');
                $OpenAmenity->appendChild($dom->createTextNode($amenity[1]));
                $OpenAmenity->setAttribute("Type", $amenity[0]);
                $Subdivision->appendChild($OpenAmenity);
            }

            // FloorPlans as Plan
            foreach ($community['floorplans'] as $comFP) {
                $Plan = $this->PlanXML($dom, $comFP, $community);
                if($Plan) {
                    $Subdivision->appendChild($Plan);
                }
            }

        return $Subdivision;
    }

    /**
	 * Using this method create Plan(FloorPlan) of Zillow XML
	 * @author Amra
	 * @return object
     */
    function PlanXML($dom, $comFP, $community) {
        $Plan = null;
        foreach ($this->_floorplans['floorplanTypes'] as $fpType) {
            foreach ($fpType['floorplans'] as $key => $fp) {
                if($comFP['fpUrl'] == $fp['url'] && $fp['status'] != 'sold') {
                    $Plan = $dom->createElement('Plan');
                    $Plan->setAttribute("Type", $fp['zillow']['Type']);
                        $Plan->appendChild( $dom->createElement('PlanNumber',  $this->_settings->BuilderNumber.'Plan'.$key) );
                        $Plan->appendChild( $dom->createElement('PlanName',  $fp['name']) );
                        $Plan->appendChild( $dom->createElement('PlanTypeName',  $this->clean($fp['zillow']['PlanTypeName'])) );

                        // BasePrice
                        if($fp['basePrice']) {
                            $Plan->appendChild( $dom->createElement('BasePrice',  $this->clean($fp['basePrice'])) );
                        } else {
                            foreach ($fp['fpVersions'] as $key => $version) {
                                if($version['galUrl'] == $community['url']) {
                                    $Plan->appendChild( $dom->createElement('BasePrice',  $this->clean($version['basePrice'])) );
                                }
                            }
                        }
                        
                        $Plan->appendChild( $dom->createElement('BaseSqft',  $this->clean($fp['specs']['sqFeet'])) );
                        $Plan->appendChild( $dom->createElement('Stories',  $fp['specs']['stories']) );
                        $Plan->appendChild( $dom->createElement('Baths',  $fp['specs']['fullBaths']['min']) );
                        $Plan->appendChild( $dom->createElement('HalfBaths',  $fp['specs']['halfBaths']['min']) );

                        // Bedrooms
                        $Bedrooms = $dom->createElement('Bedrooms',  $fp['specs']['beds']['min']);
                        $Bedrooms->setAttribute("MasterBedLocation", $fp['zillow']['MasterBedLocation']);
                        $Plan->appendChild($Bedrooms);

                        // Garage
                        $Plan->appendChild( $dom->createElement('Garage',  $fp['specs']['garage']['min']) );

                        // LivingArea
                        if(sizeof($fp['zillow']['LivingArea']) > 0) {
                            foreach ($fp['zillow']['LivingArea'] as $key => $type) {
                                $LivingArea = $dom->createElement('LivingArea', 1);
                                $LivingArea->setAttribute("Type", $type);
                                $Plan->appendChild($LivingArea);
                            }
                        }

                        // Basement
                        $Plan->appendChild( $dom->createElement('Basement',  $fp['zillow']['Basement']) );

                        // PlanAmenity
                        if(sizeof($fp['zillow']['PlanAmenity']) > 0) {
                            foreach ($fp['zillow']['PlanAmenity'] as $key => $type) {
                                $PlanAmenity = $dom->createElement('PlanAmenity', 1);
                                $PlanAmenity->setAttribute("Type", $type);
                                $Plan->appendChild($PlanAmenity);
                            }
                        }

                        // PlanOpenAmenity
                        $Plan->appendChild( $dom->createElement('PlanOpenAmenity',  $fp['zillow']['PlanOpenAmenity']) );

                        // Description
                        $Description = $dom->createElement('Description');
                        $Description->appendChild($dom->createTextNode($fp['zillow']['Description']));
                        $Plan->appendChild($Description);

                        // PlanImages
                        $PlanImages = $dom->createElement('PlanImages');
                        $Plan->appendChild($PlanImages);
                            // ElevationImage
                            if($fp['exteriorImage']) {
                                foreach ($fp['exteriorImage'] as $key => $exteriorImage) {
                                    $ElevationImage = $dom->createElement('ElevationImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/main/exterior-images/exterior-'.$exteriorImage[0].'.jpg');
                                    $ElevationImage->setAttribute('SequencePosition', $exteriorImage[0]);
                                    $ElevationImage->setAttribute('Caption', $exteriorImage[1]);
                                    $PlanImages->appendChild($ElevationImage);
                                }
                            } else {
                                $version = $this->getFPVersion($fp['fpVersions'], $community['url']);
                                foreach ($version['exteriorImage'] as $key => $exteriorImage) {
                                    $ElevationImage = $dom->createElement('ElevationImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/'.$version['galUrl'].'/exterior-images/exterior-'.$exteriorImage[0].'.jpg');
                                    $ElevationImage->setAttribute('SequencePosition', $exteriorImage[0]);
                                    $ElevationImage->setAttribute('Caption', $exteriorImage[1]);
                                    $PlanImages->appendChild($ElevationImage);
                                }
                            }
                            // FloorPlanImage
                            if($fp['fpImage']) {
                                foreach ($fp['fpImage'] as $key => $exteriorImage) {
                                    $FloorPlanImage = $dom->createElement('FloorPlanImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/main/fp-images/floorPlans-'.$exteriorImage[0].'.jpg');
                                    $FloorPlanImage->setAttribute('SequencePosition', $exteriorImage[0]);
                                    $FloorPlanImage->setAttribute('Caption', $exteriorImage[1]);
                                    $PlanImages->appendChild($FloorPlanImage);
                                }
                            } else {
                                $version = $this->getFPVersion($fp['fpVersions'], $community['url']);
                                foreach ($version['fpImage'] as $key => $exteriorImage) {
                                    $FloorPlanImage = $dom->createElement('FloorPlanImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/'.$version['galUrl'].'/fp-images/floorPlans-'.$exteriorImage[0].'.jpg');
                                    $FloorPlanImage->setAttribute('SequencePosition', $exteriorImage[0]);
                                    $FloorPlanImage->setAttribute('Caption', $exteriorImage[1]);
                                    $PlanImages->appendChild($FloorPlanImage);
                                }
                            }
                            // InteriorImage
                            if($fp['gallery']) {
                                foreach ($fp['gallery'] as $key => $exteriorImage) {
                                    $InteriorImage = $dom->createElement('InteriorImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/main/slideShow'.$exteriorImage[0].'.jpg');
                                    $InteriorImage->setAttribute('SequencePosition', $exteriorImage[0]);
                                    $InteriorImage->setAttribute('Caption', $exteriorImage[1]);
                                    $PlanImages->appendChild($InteriorImage);
                                }
                            } else {
                                $version = $this->getFPVersion($fp['fpVersions'], $community['url']);
                                foreach ($version['gallery'] as $key => $exteriorImage) {
                                    $InteriorImage = $dom->createElement('InteriorImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/'.$version['galUrl'].'/slideShow'.$exteriorImage[0].'.jpg');
                                    $InteriorImage->setAttribute('SequencePosition', $exteriorImage[0]);
                                    $InteriorImage->setAttribute('Caption', $exteriorImage[1]);
                                    $PlanImages->appendChild($InteriorImage);
                                }
                            }
                            // VirtualTour
                            if($fp['videoTour']) {
                                $PlanImages->appendChild( $dom->createElement('VirtualTour',  $fp['3DTour']) );
                            } else {
                                foreach ($fp['fpVersions'] as $key => $version) {
                                    if($version['galUrl'] == $community['url']) {
                                        $PlanImages->appendChild( $dom->createElement('VirtualTour',  $version['3DTour']) );
                                    }
                                }
                            }
                            // PlanViewer
                            if($fp['pdf']) {
                                $PlanImages->appendChild( $dom->createElement('PlanViewer',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/pdf/'.$fp['pdf']) );
                            } else {
                                foreach ($fp['fpVersions'] as $key => $version) {
                                    if($version['galUrl'] == $community['url']) {
                                        $PlanImages->appendChild( $dom->createElement('PlanViewer',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/pdf/'.$version['pdf']) );
                                    }
                                }
                            }


                        // PlanVideoFile
                        if($fp['videoTour']) {
                            $Plan->appendChild( $dom->createElement('PlanVideoFile',  $fp['videoTour']) );
                        } else {
                            $Plan->appendChild( $dom->createElement('PlanVideoFile',  $this->getFPVersion($fp['fpVersions'], $community['url'])['videoTour']) );
                        }
                        
                        // PlanWebsite
                        $Plan->appendChild( $dom->createElement('PlanWebsite', GKA__BASE_URL.'/floorplans/'.$fp['url']) );

                        // RichDetails
                        $RichDetails = $dom->createElement('RichDetails');
                        $Plan->appendChild($RichDetails);
                            $RichDetails->appendChild( $dom->createElement('ArchitectureStyle', $fp['zillow']['ArchitectureStyle']) );
                            $RichDetails->appendChild( $dom->createElement('Attic', $fp['zillow']['Attic']) );

                            // CoolingSystems
                            $CoolingSystems = $dom->createElement('CoolingSystems');
                            $RichDetails->appendChild($CoolingSystems);
                                foreach ($fp['zillow']['CoolingSystems'] as $key => $CoolingSystem) {
                                    $CoolingSystems->appendChild( $dom->createElement('CoolingSystem', $CoolingSystem) );
                                }
                            
                            // Deck & Dock & DoublePaneWindows
                            $RichDetails->appendChild( $dom->createElement('Deck', $fp['zillow']['Deck']) );
                            $RichDetails->appendChild( $dom->createElement('Dock', $fp['zillow']['Dock']) );
                            $RichDetails->appendChild( $dom->createElement('DoublePaneWindows', $fp['zillow']['DoublePaneWindows']) );

                            // ExteriorTypes
                            $ExteriorTypes = $dom->createElement('ExteriorTypes');
                            $RichDetails->appendChild($ExteriorTypes);
                                foreach ($fp['zillow']['ExteriorTypes'] as $key => $ExteriorType) {
                                    $ExteriorTypes->appendChild( $dom->createElement('ExteriorType', $ExteriorType) );
                                }
                            
                            // HeatingFuels
                            $HeatingFuels = $dom->createElement('HeatingFuels');
                            $RichDetails->appendChild($HeatingFuels);
                                foreach ($fp['zillow']['HeatingFuels'] as $key => $HeatingFuel) {
                                    $HeatingFuels->appendChild( $dom->createElement('HeatingFuel', $HeatingFuel) );
                                }
                            
                            // HeatingSystems
                            $HeatingSystems = $dom->createElement('HeatingSystems');
                            $RichDetails->appendChild($HeatingSystems);
                                foreach ($fp['zillow']['HeatingSystems'] as $key => $HeatingSystem) {
                                    $HeatingSystems->appendChild( $dom->createElement('HeatingSystem', $HeatingSystem) );
                                }

                            // ParkingTypes
                            $ParkingTypes = $dom->createElement('ParkingTypes');
                            $RichDetails->appendChild($ParkingTypes);
                                foreach ($fp['zillow']['ParkingTypes'] as $key => $ParkingType) {
                                    $ParkingTypes->appendChild( $dom->createElement('ParkingType', $ParkingType) );
                                }

                            // Patio & Porch
                            $RichDetails->appendChild( $dom->createElement('Patio', $fp['zillow']['Patio']) );
                            $RichDetails->appendChild( $dom->createElement('Porch', $fp['zillow']['Porch']) );

                            // RoofTypes
                            $RoofTypes = $dom->createElement('RoofTypes');
                            $RichDetails->appendChild($RoofTypes);
                                foreach ($fp['zillow']['RoofTypes'] as $key => $RoofType) {
                                    $RoofTypes->appendChild( $dom->createElement('RoofType', $RoofType) );
                                }

                            // Skylight
                            $RichDetails->appendChild( $dom->createElement('Skylight', $fp['zillow']['Skylight']) );
                            $RichDetails->appendChild( $dom->createElement('SprinklerSystem', $fp['zillow']['SprinklerSystem']) );
                            $RichDetails->appendChild( $dom->createElement('Wetbar', $fp['zillow']['Wetbar']) );
                            $RichDetails->appendChild( $dom->createElement('Wired', $fp['zillow']['Wired']) );

                        // QuickMoveIn(Property) as Spec
                        foreach ($this->_properties as $key => $property) {
                            $propCommunity = $this->_wpl_com_options['params'][$property->field_3011]['value'];
                            $propFPType = $property->listing;
                            switch ($propFPType) {
                                case 13:
                                    $propFPName = $this->_wpl_fp_th_options['params'][$property->field_3150]['value'];
                                    break;
                                case 14:
                                    $propFPName = $this->_wpl_fp_co_options['params'][$property->field_3151]['value'];
                                    break;
                                case 15:
                                    $propFPName = $this->_wpl_fp_sf_options['params'][$property->field_3152]['value'];
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                            if($community['name'] == $propCommunity && $fp['name'] == $propFPName && $property->finalized = 1 && $property->confirmed = 1 && $property->deleted == 0) {
                                $Spec = $this->SpecXML($dom, $community, $property, $fp);
                                $Plan->appendChild($Spec);
                            }
                        }
                }
            }
        }
        return $Plan;
    }

    /**
	 * Using this method create Spec(QuickMoveIn) of Zillow XML
	 * @author Amra
	 * @return object
     */
    function SpecXML($dom, $community, $property, $fp) {
            $Spec = $dom->createElement('Spec');
                $Spec->appendChild( $dom->createElement('SpecNumber',  $this->_settings->BuilderNumber.'Spec'.$property->id) );

                $SpecAddress = $dom->createElement('SpecAddress');
                $Spec->appendChild($SpecAddress);
                    $SpecAddress->appendChild( $dom->createElement('SpecLot', ($dom->field_3173) ? $dom->field_3173 : $property->id) );
                    $SpecAddress->appendChild( $dom->createElement('SpecStreet1',  $property->street_no . " " . $property->field_42) );
                    $SpecAddress->appendChild( $dom->createElement('SpecCity',  $property->location4_name) );
                    $SpecAddress->appendChild( $dom->createElement('SpecState',   $this->_state_abbr[$property->location2_name]) );
                    $SpecAddress->appendChild( $dom->createElement('SpecZIP',  $property->zip_name) );
                    
                    // SpecGeocode
                    $SpecGeocode = $dom->createElement('SpecGeocode');
                    $SpecAddress->appendChild($SpecGeocode);
                        if($property->field_3006 && $property->field_3005) {
                            $SpecGeocode->appendChild( $dom->createElement('SpecLatitude',  $property->field_3006) );
                            $SpecGeocode->appendChild( $dom->createElement('SpecLongitude',  $property->field_3005) );
                        } else {
                            $SpecGeocode->appendChild( $dom->createElement('SpecLatitude',  $property->googlemap_lt) );
                            $SpecGeocode->appendChild( $dom->createElement('SpecLongitude',  $property->googlemap_ln) );
                        }
                    
                $Spec->appendChild( $dom->createElement('SpecStatus',  str_replace(" ", "", $this->_wpl_sales_status_options['params'][$property->field_3168]['value'])) );

                // SpecMoveInDate
                $SpecMoveInDate = $dom->createElement('SpecMoveInDate');
                $Spec->appendChild($SpecMoveInDate);
                    $WPLMoveInDate = date_create($property->add_date);
                    $SpecMoveInDate->appendChild( $dom->createElement('Month',  date_format($WPLMoveInDate, "Y-m")) );
                
                $Spec->appendChild( $dom->createElement('SpecIsModel',  $property->field_3169) );
                $Spec->appendChild( $dom->createElement('SpecPrice',  $property->price) );
                $Spec->appendChild( $dom->createElement('SpecSqft',  $property->living_area) );
                $Spec->appendChild( $dom->createElement('SpecStories',  ($property->field_3166) ? $property->field_3166 : $fp['spec']['stories']) );
                $Spec->appendChild( $dom->createElement('SpecLotSizeSqft',  $property->lot_area) );
                $Spec->appendChild( $dom->createElement('SpecBaths',  $property->bathrooms) );
                $Spec->appendChild( $dom->createElement('SpecHalfBaths',  $property->field_3001) );
                $Spec->appendChild( $dom->createElement('SpecBedrooms',  $property->bedrooms) );
                $Spec->appendChild( $dom->createElement('SpecGarage',  $property->field_3165) );
                $Spec->appendChild( $dom->createElement('SpecBasement',  $property->field_3170) );

                // SpecDescription
                $SpecDescription = $dom->createElement('SpecDescription');
                $SpecDescription->appendChild($dom->createTextNode($property->field_308));
                $Spec->appendChild($SpecDescription);

                $Spec->appendChild( $dom->createElement('SpecYearBuilt',  ($property->build_year) ? $property->build_year : date_format($WPLMoveInDate, "Y")) );

                // SpecImages
                $SpecImages = $dom->createElement('SpecImages');
                $Spec->appendChild($SpecImages);
                    $WPLGalleryInterior = gkaDB::getWPLGallery($property->id, "gallery", "image");
                    $WPLGalleryExterior = gkaDB::getWPLGallery($property->id, "gallery", "exterior");
                    $WPLGalleryFloorplan = gkaDB::getWPLGallery($property->id, "gallery", "floorplan");
                    // var_dump($WPLGalleryInterior);
                    // WPLGalleryExterior
                    if($WPLGalleryExterior) {
                        foreach ($WPLGalleryExterior as $key => $interior) {
                            $SpecImages->appendChild( $dom->createElement('SpecElevationImage',  GKA__UPLOAD_URL."/WPL/".$property->id."/".$interior->item_name) )
                                       ->setAttribute('SequencePosition', $key);
                        }
                    } else {
                        if($fp['exteriorNum']) {
                            for ($i=1; $i <= $fp['exteriorNum']; $i++) { 
                                $SpecImages->appendChild( $dom->createElement('SpecElevationImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/main/exterior-images/exterior-'.$i.'.jpg') )
                                           ->setAttribute('SequencePosition', $i);
                            }
                        } else {
                            foreach ($fp['fpVersions'] as $key => $version) {
                                if($version['galUrl'] == $community['url']) {
                                    for ($i=1; $i <= $version['exteriorNum']; $i++) { 
                                        $SpecImages->appendChild( $dom->createElement('SpecElevationImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/'.$version['galUrl'].'/exterior-images/exterior-'.$i.'.jpg') )
                                                   ->setAttribute('SequencePosition', $i);
                                    }
                                }
                            }
                        }
                    }

                    // SpecFloorPlanImage
                    if($WPLGalleryFloorplan) {
                        foreach ($WPLGalleryFloorplan as $key => $interior) {
                            $SpecImages->appendChild( $dom->createElement('SpecFloorPlanImage',  GKA__UPLOAD_URL."/WPL/".$property->id."/".$interior->item_name) )
                                       ->setAttribute('SequencePosition', $key);
                        }
                    } else {
                        if($fp['fpNum']) {
                            for ($i=1; $i <= $fp['fpNum']; $i++) { 
                                $SpecImages->appendChild( $dom->createElement('SpecFloorPlanImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/main/fp-images/floorPlans-'.$i.'.jpg') )
                                           ->setAttribute('SequencePosition', $i);
                            }
                        } else {
                            foreach ($fp['fpVersions'] as $key => $version) {
                                if($version['galUrl'] == $community['url']) {
                                    for ($i=1; $i <= $version['fpNum']; $i++) { 
                                        $SpecImages->appendChild( $dom->createElement('SpecFloorPlanImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/'.$version['galUrl'].'/fp-images/floorPlans-'.$i.'.jpg') )
                                                   ->setAttribute('SequencePosition', $i);
                                    }
                                }
                            }
                        }
                    }
                    
                    // SpecInteriorImage
                    if($WPLGalleryInterior) {
                        foreach ($WPLGalleryInterior as $key => $interior) {
                            $SpecImages->appendChild( $dom->createElement('SpecInteriorImage',  GKA__UPLOAD_URL."/WPL/".$property->id."/".$interior->item_name) )
                                       ->setAttribute('SequencePosition', $key);
                        }
                    } else {
                        if($fp['galNum']) {
                            for ($i=1; $i <= $fp['galNum']; $i++) { 
                                $SpecImages->appendChild( $dom->createElement('SpecInteriorImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/main/slideShow'.$i.'.jpg') )
                                           ->setAttribute('SequencePosition', $i);
                            }
                        } else {
                            foreach ($fp['fpVersions'] as $key => $version) {
                                if($version['galUrl'] == $community['url']) {
                                    for ($i=1; $i <= $version['galNum']; $i++) { 
                                        $SpecImages->appendChild( $dom->createElement('SpecInteriorImage',  GKA__BASE_URL.'/floorplans/'.$fp['url'].'/images/'.$version['galUrl'].'/slideShow'.$i.'.jpg') )
                                                   ->setAttribute('SequencePosition', $i);
                                    }
                                }
                            }
                        }
                    }
                    
                $Spec->appendChild( $dom->createElement('SpecWebsite',  GKA__BASE_URL."/quick-move-ins/home/?id=".$property->id) );

                // Appliances
                if($property->f_3171) {
                    $Appliances = $dom->createElement('Appliances');
                    $Spec->appendChild($Appliances);
                        $AppliancesOptions = array_filter(explode(',', $property->f_3171_options));
                        foreach ($AppliancesOptions as $key => $option) {
                            $Appliances->appendChild( $dom->createElement('Appliance',  $this->_wpl_appliance_options['values'][$option]['value']) );
                        }
                }

                // CoolingSystems
                if($property->f_3172) {
                    $CoolingSystems = $dom->createElement('CoolingSystems');
                    $Spec->appendChild($CoolingSystems);
                        $CoolingSystemsOptions = array_filter(explode(',', $property->f_3172_options));
                        foreach ($CoolingSystemsOptions as $key => $option) {
                            $CoolingSystems->appendChild( $dom->createElement('CoolingSystem',  $this->_wpl_cooling_system_options['values'][$option]['value']) );
                        }
                }
                    

        return $Spec;
    }
    
}