<?php
require_once __DIR__ . "/../Database.php";
require_once __DIR__ . "/../models/UserModel.php";

class AuthController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new User();
  }

  // Self-instantiating method
  public static function handler()
  {
    $controller = new self();

    switch ($_GET["method"]) {
      case "CREATE":
        $controller->signIn($_POST);
        break;
      case "DELETE":
        $controller->signOut();
        break;
    }
  }

  public function signIn($data)
  {
    try {
      $this->userModel->sanitize($data);
      $user = $this->userModel->findOneByEmail($data["email"]);


      if (!$user)
        throw new Error();

      if (password_verify($data["password"], $user["password_hash"])) {
        $this->createSession([
          "user_id" => $user["user_id"],
          "email" => $user["email"],
          "role" => $user["role"],
        ]);

        echo json_encode(["status" => true]);
        return;
      }

      throw new Error();
    } catch (\Throwable $error) {
      echo json_encode(["status" => false]);
    }
  }

  public function signOut()
  {
    session_start();
    session_destroy();
    echo json_encode(["status" => true]);
  }

  public function createSession($data)
  {
    session_start();
    $_SESSION = $data;
  }

}

AuthController::handler();

?>