<?php
include_once __DIR__ . "/Router.php";

class App extends Router
{
  public $url = "http://localhost/sync-events";

  public function __construct()
  {
    $this->initRoutes();
    $page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $this->normalizePath($page);
    $this->dispatch($page);
  }

  function initRoutes()
  {
    // Define your routes
    $this->addRoute("/", "/user/home/view.php");
    $this->addRoute("/admin/sign-in", "/admin/sign-in/view.php");

    // Admin
    $this->addRoute("/admin/dashboard", "/admin/dashboard/view.php");
    $this->addRoute("/admin/events", "/admin/events/view.php");
    $this->addRoute("/admin/attendance-logs", "/admin/attendance-logs/view.php");

    // User
    $this->addRoute("/home", "/user/home/view.php");
    $this->addRoute("/events", "/user/events/view.php");
    $this->addRoute("/sign-in", "/user/sign-in/view.php");
    $this->addRoute("/sign-up", "/user/sign-up/view.php");

  }
}

?>