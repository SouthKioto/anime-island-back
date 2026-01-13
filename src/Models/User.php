<?php

namespace App\Models;

use App\Database\Database;

class User
{
  protected string $name;
  protected string $email;
  protected string $password;
  protected string $nickname;
  protected string $create_date;

  protected Database $db;

  public function __construct(string $name, string $email, string $password, string $nickname, $create_date)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->nickname = $nickname;
    $this->create_date = date("YYYY-m-d H:i:s");
  }

  public function getUserData()
  {
    $user = array(
      "name" => $this->name,
      "email" => $this->email,
      "password" => $this->password,
      "nickname" => $this->nickname,
      "create_date" => $this->create_date
    );

    return $user;
  }
}
