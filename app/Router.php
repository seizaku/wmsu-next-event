<?php

// router/Router.php
class Router
{
  private $routes = [];

  // Add a route
  public function addRoute($url, $view)
  {
    $this->routes[$url] = $view;
  }

  function normalizePath(&$requestUri)
  {
    // Remove trailing slash if it exists
    $requestUri = rtrim($requestUri, '/');

    // Regex to match any URL starting with /sync-events and modify it
    if (preg_match('#^/sync-events(/.*)?$#', $requestUri)) {
      // Remove /sync-events from the beginning and set the remaining path
      $requestUri = preg_replace('#^/sync-events(/.*)?$#', '$1', $requestUri);
      if ($requestUri === '') {
        $requestUri = '/';  // Treat /sync-events/ as root
      }
    }
  }

  // Dispatch the route based on the requested URL
  public function dispatch($url)
  {
    // If route exists, include the corresponding view
    if (array_key_exists($url, $this->routes)) {
      include __DIR__ . './views/pages/' . $this->routes[$url];
    } else {
      // If route does not exist, show a 404 error
      include __DIR__ . './views/pages/404.php';
    }
  }
}


?>