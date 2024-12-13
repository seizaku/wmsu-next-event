<?php
require_once __DIR__ . "/../models/EventAttendeeModel.php";

class EventController
{
  private $eventModel;

  public function __construct()
  {
    $this->eventModel = new EventAttendee();
  }

  public static function handler()
  {
    $controller = new self();

    switch ($_GET["method"]) {
      case "SELECT":
        $controller->selectEvent($_POST);
        break;
      case "CREATE":
        $controller->joinEvent($_POST);
        break;
      case "UPDATE":
        $controller->deleteEvent($_POST); // Assuming you have a delete method in your EventModel
        break;
      // You can add more cases for PUT, GET, etc.
    }
  }

  public function joinEvent($data)
  {
    $this->eventModel->sanitize($data);

    if ($this->eventModel->create($data)) {
      echo json_encode(["status" => true]);
    } else {
      echo json_encode(["status" => false]);
    }
  }

  public function attendanceEvent($data)
  {
    $this->eventModel->sanitize($data);

    if ($this->eventModel->create($data)) {
      echo json_encode(["status" => true]);
    } else {
      echo json_encode(["status" => false]);
    }
  }


  public function selectAttendance($data)
  {
    if (isset($data["event_id"])) {
      echo json_encode($this->eventModel->findOneById($data["event_id"]));
      return;
    }

    echo json_encode($this->eventModel->select());
  }

}

EventController::handler();


?>