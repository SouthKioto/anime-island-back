<?php

@include 'connect.php';

$query = "SELECT * FROM users";

$result = $conn->query($query);
$id = 0;

if ($result->num_rows > 0) {
  $data = array();
  while ($row = $result->fetch_object()) {
    $data = array(
      'id' => $row->id,
      'nickname' => $row->nickname,
      'email' =>  $row->email
    );
  }
}

echo "<pre>";

var_dump($data);
echo "</pre>";
