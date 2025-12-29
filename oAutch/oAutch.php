<?php

class oAuth_token
{
  protected int $token_length;

  function __construct($token_length)
  {
    $this->token_length = $token_length;
  }

  public function generateTocken(): string
  {
    $token = '';
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    for ($i = 0; $i < $this->token_length; $i++) {
      $random = random_int(0, strlen($characters) - 1);

      $token .= $characters[$random];
    }

    return $token;
  }
}
