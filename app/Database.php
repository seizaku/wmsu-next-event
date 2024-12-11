<?php

require_once __DIR__ . "./../config/config.php";

class Database
{

  protected $client;

  public function __construct()
  {
    $this->client = new PDO(DB_ENGINE . ": host=" . DB_HOST . "; dbname=" . DB_NAME . ";", DB_USER, DB_PASS);
  }

  public function sanitize(&$data)
  {
    // Iterate through each key-value pair in the POST data
    foreach ($data as &$value) {
      // Trim whitespace
      $value = trim($value);

      // Remove special characters to prevent XSS attacks (HTML entities)
      $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

      // Sanitize for SQL injection by escaping potentially dangerous characters
      // (use with caution: using prepared statements is generally a better approach)
      $value = addslashes($value);
    }
  }

}

?>