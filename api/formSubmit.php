<?php

////// HANDLES THE FORM SUBMISSION POST TO TOP BUILDER API

// Enable CORS headers
header("Access-Control-Allow-Origin: https://www.craftmarkhomes.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the request
    $builderAccountId = $_POST['BuilderAccountId'];
    $authenticationId = $_POST['AuthenticationId'];
    $ruleId = $_POST['RuleId'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $mobilePhone = $_POST['MobilePhone'];
    $zipCode = $_POST['ZipCode'];
    $comments = $_POST['Comments'];
    $options = $_POST['Options'];

    // Prepare the data for the API request
    $data = [
        'BuilderAccountId' => $builderAccountId,
        'AuthenticationId' => $authenticationId,
        'RuleId' => $ruleId,
        'FirstName' => $firstName,
        'LastName' => $lastName,
        'Email' => $email,
        'MobilePhone' => $mobilePhone,
        'ZipCode' => $zipCode,
        'Comments' => $comments,
        'Options' => $options
    ];

    // Send the API request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://webforms.topbuildersolutions.net/api/CreateLead.aspx');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    // Check the API response and send the appropriate response to the client
    if ($response) {
        // Process the API response if needed
        // ...

        // Send a success response to the client
        echo json_encode(['success' => true]);
    } else {
        // Handle API request failure
        echo json_encode(['error' => 'Failed to send API request']);
    }
} else {
    // Handle other HTTP methods or return an error
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Invalid request method']);
}
?>
