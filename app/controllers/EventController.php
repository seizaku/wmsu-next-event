<?php
require_once __DIR__ . "/../models/EventModel.php";

class EventController
{
  private $eventModel;

  public function __construct()
  {
    $this->eventModel = new Event();
  }

  public static function handler()
  {
    $controller = new self();

    switch ($_GET["method"]) {
      case "SELECT":
        $controller->selectEvent($_POST);
        break;
      case "CREATE":
      case "UPDATE":
        $controller->upsertEvent($_POST);
        break;
      case "DELETE":
        $controller->deleteEvent($_POST); // Assuming you have a delete method in your EventModel
        break;
      // You can add more cases for PUT, GET, etc.
    }
  }

  public function upsertEvent($data)
  {
    $this->eventModel->sanitize($data);

    if ($this->eventModel->upsert($data)) {
      echo json_encode(["status" => true]);
    } else {
      echo json_encode(["status" => false]);
    }
  }


  public function selectEvent($data)
  {
    if (isset($data["event_id"])) {
      echo json_encode($this->eventModel->findOneById($data["event_id"]));
      return;
    }

    echo json_encode($this->eventModel->select());
  }

  public function deleteEvent($data)
  {
    $this->eventModel->sanitize($data);

    if ($this->eventModel->delete($data["event_id"])) {
      echo json_encode(["status" => true]);
    } else {
      echo json_encode(["status" => false]);
    }
  }
}

EventController::handler();


?>