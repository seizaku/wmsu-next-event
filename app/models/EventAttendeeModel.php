<?php
require_once __DIR__ . "/../Database.php";

class EventAttendee extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  // Create a new user
  public function create($data)
  {
    session_start();
    $sql = "INSERT INTO event_attendees (event_id, user_id) VALUES (:event_id, :user_id)";
    $query = $this->client->prepare($sql);
    $query->execute([
      "event_id" => $data["event_id"],
      "user_id" => $_SESSION["user_id"]
    ]);

    return $this->client->lastInsertId();
  }

  // Select all users
  public function select($event_id)
  {
    $sql = "SELECT * FROM event_attendees WHERE event_id = :event_id";
    $query = $this->client->prepare($sql);
    $query->execute($event_id);

    return $query->fetchAll();
  }

  public function selectAttended($data)
  {
    $sql = "SELECT * FROM event_attendees WHERE event_id = :event_id AND user_id = :user_id";
    $query = $this->client->prepare($sql);
    $query->execute($data);

    return $query->fetchAll();
  }

  // Find a user by ID
  public function findOne($data)
  {
    $sql = "SELECT * FROM event_attendees WHERE event_id = :event_id AND user_id = :user_id LIMIT 1";
    $query = $this->client->prepare($sql);
    $query->execute($data);

    return $query->fetch();
  }

  // Update a user's information
  public function update($data)
  {
    $attendance = $this->findOne([
      "event_id" => $data["event_id"],
      "user_id" => $_SESSION["user_id"],
    ]);

    if (!$attendance["time_in"]) {
      $sql = "UPDATE event_attendees SET time_in = NOW() WHERE event_id = :event_id ";
    } else {
      $sql = "UPDATE event_attendees SET time_out = NOW() WHERE event_id = :event_id ";
    }

    $query = $this->client->prepare($sql);

    return $query->rowCount(); // Return number of affected rows
  }

  // Delete a user
  public function delete($id)
  {
    $sql = "DELETE FROM events WHERE event_id = :event_id";
    $query = $this->client->prepare($sql);
    $query->execute(["event_id" => $id]);

    return $query->rowCount(); // Return number of affected rows
  }
}

?>