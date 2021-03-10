<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$firstname = '';

// check data
if(!empty($data->firstname)) {
	$firstname = $data->firstname;
}

if (!$firstname || $firstname === '') {
	echo json_encode([
		'success' => false, 
		'message' => "missing parameters",
	]);
	echo $response;
	exit;
}

// database connection credentials
$user = 'root';
$password = 'root';
$dbname = 'supercode';
$host = '127.0.0.1';
$port = 3306;

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname, $port);

// Check connection
if (!$conn) {
	echo json_encode([
		'success' => false, 
		'message' => mysqli_connect_error(),
	]);
	echo $response;
	exit;
}

// MySQL INSERT Statement -> https://www.w3schools.com/sql/sql_insert.asp
$sql = "INSERT INTO users (firstname, lastname, email, password)
VALUES ( '$firstname', 'Doe', 'john@example.com', '123')";

if (mysqli_query($conn, $sql)) {
	$response = json_encode([
		'success' => true, 
	]);
} else {
  	$response = json_encode([
		'success' => false, 
		'message' => "Error: " . $sql . "<br>" . mysqli_error($conn),
	]);
}
mysqli_close($conn);

echo $response;