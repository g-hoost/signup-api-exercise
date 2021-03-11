<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$username = '';
$email = '';
$password = '';
$checkbox = '';

// check data
if(!empty($data->username)) {
	$username = $data->username;
}

if(!empty($data->username)) {
	$username = $data->username;
}

if (!$username || $username === '') {
	echo json_encode([
		'success' => false, 
		'message' => "missing parameters",
	]);
	exit;
}
if(!empty($data->email)) {
	$email = $data->email;
}

if (!$email || $email === '') {
	echo json_encode([
		'success' => false, 
		'message' => "missing parameters",
	]);
	exit;
}
if(!empty($data->password)) {
	$password = $data->password;
}

if (!$password || $password === '') {
	echo json_encode([
		'success' => false, 
		'message' => "missing parameters",
	]);
	exit;
}
if(!empty($data->confirmPassword)) {
	$confirmPassword = $data->confirmPassword;
}

if (!$confirmPassword || $confirmPassword === '') {
	echo json_encode([
		'success' => false, 
		'message' => "missing parameters",
	]);
	exit;
	} 
	if ($password !== $confirmPassword) {
		echo json_encode([
		'success' => false, 
		'message' => "password is wrong",
		]);
	exit;
}
if(!empty($data->checkbox)) {
	$checkbox = $data->checkbox;
}
if(!isset($_POST['checkbox'])) {
	echo json_encode([
		'success' => false, 
		'message' => "password is wrong",
	]);
	exit;
	}

$response = json_encode([
    'success' => true, 
    'user' => [
		'username' => $username,
		'email' => $email,
		'password' => $password,
		'confirmPassword' => $confirmPassword,
		'checkbox' => $checkbox,
	],
]);

echo $response;


//http://localhost:3000/api/post.php