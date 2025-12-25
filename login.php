<?php

@include 'connect.php';

//login, password 

$login = $_POST['login'];
$password = $_POST['password'];

if (empty($login) || empty($password)) {
  http_response_code(400);
  echo json_encode(array('error' => 'Empty data'));
  return;
}


$get_pass_query = "SELECT * FROM users WHERE nickname = '$login'";

$results = $conn->query($get_pass_query);
$row = $results->fetch_object();

$data_base_pass = $row->password_hash;

if (password_verify($password, $data_base_pass)) {
  echo json_encode(array('success' => "Good password"));
}

$conn->close();
