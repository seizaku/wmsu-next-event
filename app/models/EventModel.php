<?php
require_once __DIR__ . "/../Database.php";

class Event extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  // Create a new user
  public function upsert($data)
  {
    $sql = "INSERT INTO events (event_id, event_name, event_start, event_end, location, latitude, longitude, capacity, description) VALUES (:event_id, :event_name, :event_start, :event_end, :location, :latitude, :longitude, :capacity, :description) ON DUPLICATE KEY UPDATE event_name = :event_name, event_start = :event_start, event_end = :event_end, location = :location, latitude = :latitude, longitude = :longitude, capacity = :capacity, description = :description";
    $query = $this->client->prepare($sql);
    $query->execute(params: $data);

    return $this->client->lastInsertId();
  }

  // Select all users
  public function select()
  {
    $sql = "SELECT * FROM events";
    $query = $this->client->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  // Find a user by ID
  public function findOneById($id)
  {
    $sql = "SELECT * FROM events WHERE event_id = :event_id LIMIT 1";
    $query = $this->client->prepare($sql);
    $query->execute(["event_id" => $id]);

    return $query->fetch();
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