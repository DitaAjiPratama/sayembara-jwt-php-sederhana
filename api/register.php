<?php
include_once '../config/database.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$fullname = '';
$username = '';
$phone = '';
$email = '';
$password = '';

$databaseConnection = null;

$databaseService = new DatabaseService();
$databaseConnection = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));

$fullname = $data->fullname;
$username = $data->username;
$phone = $data->phone;
$email = $data->email;
$password = $data->password;


$statement = $databaseConnection->prepare('INSERT INTO Users (fullname, username, phone, email, password) VALUES (:fullname, :username, :phone, :email, :password)');

$statement->bindParam(':fullname', $fullname);
$statement->bindParam(':username', $username);
$statement->bindParam(':phone', $phone);
$statement->bindParam(':email', $email);

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$statement->bindParam(':password', $password_hash);


if($statement->execute()){
    http_response_code(200);
    echo json_encode(array("message" => "User was successfully registered."));
}
else{
    http_response_code(400);
    echo json_encode(array("message" => "Oops..Unable to register user, Something went wrong!"));
}
