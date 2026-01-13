<?php

namespace App\Controllers;

use App\Models\User;
use App\Database\Database;
use mysqli;

class UserController
{
  protected User $user;
  protected \mysqli $conn;

  public function __construct(User $user)
  {
    $this->user = $user;
    $this->conn = Database::createConnect('localhost', 'root', '', 'anime-island');
  }

  public function createUser()
  {
    echo "Create user";
  }

  public function getUser(User $user) {}
}
