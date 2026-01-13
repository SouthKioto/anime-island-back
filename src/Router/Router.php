<?php

namespace App\Router;

use Closure;


class Router
{
  protected array $routes = [];

  public function add(string $path, Closure $handler): void
  {
    $this->routes["/anime-island-back" . $path] = $handler;
  }

  public function dispatch(string $path): void
  {
    foreach ($this->routes as $route => $handler) {
      $pattern = preg_replace('/\{[a-zA-Z_][a-zA-Z0-9_]*\}/', '([a-zA-Z0-9_-]+)', $route);
      $pattern = '#^' . $pattern . '$#';

      if (preg_match($pattern, $path, $matches)) {
        array_shift($matches);
        call_user_func_array($handler, $matches);
        return;
      }
    }
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }
}
