<?php
require_once __DIR__ . "/../Database.php";
class User extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  // Create a new user
  public function create($data)
  {
    $sql = "INSERT INTO users (email, password) VALUES (:name, :email, :password)";
    $query = $this->client->prepare($sql);
    $query->execute([
      "email" => $data['email'],
      "password" => password_hash($data['password'], PASSWORD_DEFAULT),
    ]);

    return $this->client->lastInsertId(); // Return the last inserted ID
  }

  // Select all users
  public function select($limit = 10, $offset = 0)
  {
    $sql = "SELECT * FROM users LIMIT :limit OFFSET :offset";
    $query = $this->client->prepare($sql);
    $query->execute([
      "limit" => $limit,
      "offset" => $offset
    ]);

    return $query->fetchAll();
  }

  // Find a user by ID
  public function findOneById($id)
  {
    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
    $query = $this->client->prepare($sql);
    $query->execute(["id" => $id]);

    return $query->fetch();
  }

  public function findOneByEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $query = $this->client->prepare($sql);
    $query->execute(["email" => $email]);

    return $query->fetch();
  }

  // Update a user's information
  public function update($id, $data)
  {
    $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
    $query = $this->client->prepare($sql);
    $query->execute([
      "id" => $id,
      "name" => $data['name'],
      "email" => $data['email'],
      "password" => password_hash($data['password'], PASSWORD_DEFAULT),
    ]);

    return $query->rowCount(); // Return number of affected rows
  }

  // Delete a user
  public function delete($id)
  {
    $sql = "DELETE FROM users WHERE id = :id";
    $query = $this->client->prepare($sql);
    $query->execute(["id" => $id]);

    return $query->rowCount(); // Return number of affected rows
  }
}

?>