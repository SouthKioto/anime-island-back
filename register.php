<?php

@include 'connect.php';

$email = $_POST['email'];
$userName = $_POST['userName'];
$pass = $_POST['password'];
$repPass = $_POST['repPassword'];

if (empty($email) || empty($userName) || empty($pass) || empty($repPass)) {
  http_response_code(400);
  echo json_encode(array('error' => 'Empty data'));
  return;
}

$checkUser = "SELECT * FROM users WHERE email = '$email'";

$result = $conn->query($checkUser);
$row = $result->fetch_object();
$nickname = $row->nickname;
$email_db = $row->email;

if ($nickname == $userName) {
  http_response_code(400);
  echo json_encode(array('error' => 'User with this username already exist'));
  return;
}

if ($result->num_rows >= 1) {
  http_response_code(400);
  echo json_encode(array('error' => "User with this email exist"));
  return;
}

if ($pass != $repPass) {
  http_response_code(400);
  echo json_encode(array('error' => "Password not same"));
  return;
}

$passHash = password_hash($pass, PASSWORD_DEFAULT);

if (empty($email) || empty($userName) || empty($pass) || empty($repPass)) {
  http_response_code(400);
  echo json_encode(array('error' => "Empty data"));
  return;
}

//generowanie tokenu

$expired_token = '';
$long_date_token = '';


$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

for ($i = 0; $i <= 60; $i++) {
  $expired_token .= $characters[rand(0, strlen($characters) - 1)];
  $long_date_token .= $characters[rand(0, strlen($characters) - 1)];
}

//TODO: insert token with user id;
$insertToken = "";

$addUser = "INSERT INTO users (nickname, email, password_hash) VALUES ('$userName', '$email', '$passHash')";

if ($conn->query($addUser)) {
  echo json_encode(array('success' => "User succesfully created"));
  return;
}

$conn->close();
