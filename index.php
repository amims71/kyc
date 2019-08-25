<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://kyc24nme.azure-api.net/testkyc/check-person');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => '{Ocp-Apim-Subscription-Key}',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'national_id' => '{nid}',
    'person_dob' => '{dob}',
    'person_fullname' => '{full name}',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>