<?php

$Google_data = file_get_contents('php://input');
$decoded_data= json_decode($Google_data, true);
$pass= '3$Ke6v7M8h7eHkjp';

if ($pass == $decoded_data['google_key']) {
    foreach ($decoded_data['user_column_data'] as $key => $user_column_data) {
        $user_data->{$user_column_data['column_id']} = $user_column_data['string_value'];
    }

    if($user_data->FULL_NAME && $user_data->EMAIL) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://webforms.topbuildersolutions.net/api/CreateLead.aspx',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'BuilderAccountId' => '32',
                'AuthenticationId' => '86eb9035-83da-4741-ac07-ed85b8ed52f2',
                'RuleId' => '3229',
                'FullName' => $user_data->FULL_NAME,
                'Email' => $user_data->EMAIL,
                'MobilePhone' => $user_data->PHONE_NUMBER,
                'Comments' => ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    } else {
        echo "Something went wrong!!!";
    }

}

?>