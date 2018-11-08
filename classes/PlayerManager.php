<?php

require_once 'Player.php';
require_once 'TeamManager.php';

class PlayerManager {
  private $pdo = null;

  function __construct() {
    $this->connect();
  }

  private function connect() {
    try {
      $this->pdo = new PDO('mysql:host=localhost;dbname=team_poo', 'root', '');
    } catch(PDOException $e) {
      var_dump($e);
    }
  }

  public function findAll() {
    $query = $this->pdo->prepare('SELECT * FROM player');
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_OBJ);
    $tm = new TeamManager();
    $players = [];
    foreach($rows as $row) {
      $team = $tm->findById($row->team_id);
      $player = new Player($row->name,$row->position,$team);

      $player->setId($row->id);
      array_push($players,$player);
    }

    return $players;
  }

  public function findById($id){
    $query = $this->pdo->prepare('SELECT * FROM player WHERE id = :id');
    $query->bindParam(':id',intval($id));
    $query->execute();
    $row = $query->fetch(PDO::FETCH_OBJ);

    if(!$row) return null;

    $player = new Player($row->name, $row->position);
    $player->setId($row->id);

    return $player;
  }

  public function deleteById($id){
    $query = $this->pdo->prepare('DELETE FROM player WHERE id = :id');
    $query->bindParam(':id',intval($id));
    return $query->execute();
  }
}
