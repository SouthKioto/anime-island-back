<?php

namespace App\Database;

use mysqli;

class Database
{
  static public function createConnect($host, $username, $password, $dbname)
  {
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }

  public function closeConnect(mysqli $conn): void
  {
    $conn->close();
  }
}
