<?php
  require_once 'Team.php';

  class Player {
    private $id;
    private $name;
    private $position;
    private $team;
    private $pdo;

    function __construct($name, $position,Team $team = null) {
      $this->name = $name;
      $this->position = $position;

      if($team !== null)
        $this->team = $team;

      try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=team_poo', 'root', '');
      } catch (PDOException $e) {
        var_dump($e);
      }
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPosition() { return $this->position; }
    public function getTeam() { return $this->team; }


    public function setId($id) {
      $this->id = $id;
      return $this->id;
    }

    public function setName($name) {
      $this->name = $name;
      return $this->name;
    }

    public function setPosition($position) {
      $this->position = $position;
      return $this->position;
    }

    public function setTeam(Team $team) {
      $this->team = $team;
      return $this->team;
    }

    public function save(){
      $insert = 'INSERT INTO player(
                                    name,
                                    position,
                                    team_id
                                  )
                                  VALUES(
                                    :name,
                                    :position,
                                    :team_id
                                  )';
      $query = $this->pdo->prepare($insert);
      $query->execute(
        array(
          ":name" => $this->name,
          ":position" => $this->position,
          ":team_id" => $this->team->getId()
        )
      );
      return $this->pdo->lastInsertId();
    }

    public function update(){
      $update = ' UPDATE  player
                  SET     name = :name,
                          position = :position
                  WHERE   id = :id';

      $query = $this->pdo->prepare($update);
      return $query->execute(
        array(
          ":name" => $this->name,
          ":position" => $this->position,
          ":id" => $this->id
        )
      );
    }

  }
