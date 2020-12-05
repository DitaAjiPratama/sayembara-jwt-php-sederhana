<?php
include_once '../config/database.php';
include_once '../config/config.php';
require "../vendor/autoload.php";

//use \Firebase\JWT\JWT;

use \Jose\Easy\Build;

// Set header requirements for each request
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$email = '';
$password = '';

//database object and get connection to database
$databaseService = new DatabaseService();
$connection = $databaseService->getConnection();

//get body request
$data = json_decode(file_get_contents("php://input"));

$email = $data->email;
$password = $data->password;

//select query to get user data
$query = 'SELECT id, fullname, password, email, phone FROM Users WHERE email = ? LIMIT 0,1';

$statement = $connection->prepare($query);
$statement->bindParam(1, $email);
$statement->execute();
$result = $statement->rowCount();

if ($result > 0) {
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $phone = $row['phone'];
    $fullname = $row['fullname'];
    $email = $row['email'];
    $saved_password = $row['password'];

    //verify the password
    if (password_verify($password, $saved_password)) {
        //put user detail and config to jwt array
        $token = array(
            "iss" => $issuer,
            "aud" => $fullname,
            "iat" => $time,
            "exp" => $expiration_time,
            "data" => array(
                "fullname" => $fullname,
                "phone" => $phone,
                "email" => $email
            ));



        $jws = Build::jws() // Build a JWS
        ->exp($expiration_time) // The "exp" claim
        ->iat($time) // The "iat" claim
        ->alg('RS512') // The signature algorithm. A string or an algorithm class.
        ->iss($issuer) // The "iss" claim
        ->aud($fullname) // Add an audience ("aud" claim)
        ->payload($token)
            ->sign($jwk); // Compute the token with the given JWK



        //if success, put token to response api
        http_response_code(200);
        echo json_encode(
            array(
                "message" => "Login successfully",
                "token" => $jws,
                "email" => $email,
                "expireAt" => $expiration_time
            ));
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Authentication failure, please check you email / password!"));
    }
}
