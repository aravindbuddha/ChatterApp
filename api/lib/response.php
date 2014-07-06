<?php
/**
* Response Class
*/
class Response {
    // Define whether an HTTPS connection is required
    $HTTPS_required = FALSE;
    // Define whether user authentication is required
    $authentication_required = FALSE;
//Types of errors with error code
    $api_response_code = array(
        0 => array('HTTP Response' => 400, 'Message' => 'Unknown Error'),
        1 => array('HTTP Response' => 200, 'Message' => 'Success'),
        2 => array('HTTP Response' => 403, 'Message' => 'HTTPS Required'),
        3 => array('HTTP Response' => 401, 'Message' => 'Authentication Required'),
        4 => array('HTTP Response' => 401, 'Message' => 'Authentication Failed'),
        5 => array('HTTP Response' => 404, 'Message' => 'Invalid Request'),
        6 => array('HTTP Response' => 400, 'Message' => 'Invalid Response Format')
    );
    function __construct( $HTTPS_required = FALSE, $authentication_required = FALSE){
        $this->HTTPS_required=$HTTPS_required;
        $this->authentication_required=$authentication_required;
    }
    function deliver_response($format, $api_response){
        // Define HTTP responses
        $http_response_code = array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found'
        );
        // Set HTTP Response
        header('HTTP/1.1 '.$this->api_response['status'].' '.$this->http_response_code[ $this->api_response['status'] ]);
        // Process different content types
        if( strcasecmp($format,'json') == 0 ){
     
            // Set HTTP Response Content Type
            header('Content-Type: application/json; charset=utf-8');
     
            // Format data into a JSON response
            $json_response = json_encode($api_response);
     
            // Deliver formatted data
            echo $json_response;
     
        }elseif( strcasecmp($format,'xml') == 0 ){
     
            // Set HTTP Response Content Type
            header('Content-Type: application/xml; charset=utf-8');
     
            // Format data into an XML response (This is only good at handling string data, not arrays)
            $xml_response = '<?xml version="1.0" encoding="UTF-8"?>'."\n".
                '<response>'."\n".
                "\t".'<code>'.$api_response['code'].'</code>'."\n".
                "\t".'<data>'.$api_response['data'].'</data>'."\n".
                '</response>';
     
            // Deliver formatted data
            echo $xml_response;
     
        }else{
     
            // Set HTTP Response Content Type (This is only good at handling string data, not arrays)
            header('Content-Type: text/html; charset=utf-8');
     
            // Deliver formatted data
            echo $api_response['data'];
     
        }
     
        // End script process
        exit;
     
    }
}

 

 
// Method A: Say Hello to the API
if( strcasecmp($_GET['method'],'hello') == 0){
    $response['code'] = 1;
    $response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
    $response['data'] = 'Hello World';
}
 
// --- Step 4: Deliver Response
 
// Return Response to browser
//deliver_response($_GET['format'], $response);
 
?>
       