<?php
include_once '../config/config.php';
require "../vendor/autoload.php";

use Jose\Component\Core\JWK;
use Jose\Easy\Load;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

// get token jwt from request
$token = isset($data->token) ? $data->token : "";


// check is token and email empty
if ($token) {

    // decode token and show user details
    try {

        $jwk = new JWK([
            'kty' => 'RSA',
            'use' => 'sig',
            'n' => 'n4EPtAOCc9AlkeQHPzHStgAbgs7bTZLwUBZdR8_KuKPEHLd4rHVTeT-O-XV2jRojdNhxJWTDvNd7nqQ0VEiZQHz_AJmSCpMaJMRBSFKrKb2wqVwGU_NsYOYL-QtiWN2lbzcEe6XC0dApr5ydQLrHqkHHig3RBordaZ6Aj-oBHqFEHYpPe7Tpe-OfVfHd1E6cS6M1FZcD1NNLYD5lFHpPI9bTwJlsde3uhGqC0ZCuEHg8lhzwOHrtIQbS0FVbb9k3-tVTU4fg_3L_vniUFAKwuCLqKnS2BYwdq_mzSnbLY7h_qixoR7jig3__kRhuaxwUkRz5iaiQkqgc5gHdrNP5zw',
            'e' => 'AQAB'
        ]);

        $jwt = Load::jws($token) // load and verify the token in the variable $token
        ->algs(['RS256', 'RS512']) // The algorithms allowed to be used
        ->exp() // check the "exp" claim
        ->iat(1000) // check the "iat" claim. Leeway is 1000ms (1s)
        ->nbf() // check the "nbf" claim
        ->iss($issuer) // Allowed issuer
        ->key($jwk) // Key used to verify the signature
        ->run();

        http_response_code(200);
        echo json_encode(array(
            "message" => "Access granted",
            "data" => $jwt->claims->get("data")
        ));

    } // if token is invalid show error
    catch (Exception $e) {
        // set response status code
        http_response_code(401);

        // response with access denied  & show error message
        echo json_encode(array(
            "message" => "Ooops, Access denied",
            "error" => $e->getMessage()
        ));
    }
} // show error message if token is empty
else {
    // set response status code
    http_response_code(401);

    // show response access denied
    echo json_encode(array("message" => "Ooops, Access denied"));
}