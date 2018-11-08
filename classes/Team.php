<?php

  class Team {
    private $id;
    private $name;
    private $yearFoundation;
    private $league;
    private $stadium;
    private $coach;
    private $players;

    private $pdo;

    function __construct(
      $name, $yearFoundation, $league, $stadium, $coach) {
        $this->name = $name;
        $this->yearFoundation = $yearFoundation;
        $this->league = $league;
        $this->stadium = $stadium;
        $this->coach = $coach;

        try {
          $this->pdo = new PDO('mysql:host=localhost;dbname=team_poo', 'root', '');
        } catch (PDOException $e) {
          var_dump($e);
        }
      }

    public function getId() { return $this->id; }

    public function getName() {
      return $this->name;
    }

    public function getYearFoundation() {
      return $this->yearFoundation;
    }

    public function getLeague() {
      return $this->league;
    }

    public function getStadium() {
      return $this->stadium;
    }

    public function getCoach() {
      return $this->coach;
    }

    public function getPlayers() {
      return $this->players;
    }

    public function setId($id) {
      $this->id = $id;
      return $this->id;
    }

    public function setName($name) {
      $this->name = $name;
      return $this->name;
    }

    public function setYearFoundation($yearFoundation) {
      $this->yearFoundation = $yearFoundation;
      return $this->yearFoundation;
    }
    public function setLeague($league) {
      $this->league = $league;
      return $this->league;
    }

    public function setStadium($stadium) {
      $this->stadium = $stadium;
      return $this->stadium;
    }

    public function setCoach($coach) {
      $this->coach = $coach;
      return $this->coach;
    }
    
    public function addPlayer(Player $player){
      $this->players[] = $player;
    }

    public function save() {
      // enregistrement en base de données
      $query = $this->pdo->prepare(
        'INSERT INTO team(name, yearFoundation, league, stadium, coach)
        VALUES (:name, :yearFoundation, :league, :stadium, :coach)');

      $query->bindParam(':name', $this->name);
      $query->bindParam(':yearFoundation', $this->yearFoundation);
      $query->bindParam(':league', $this->league);
      $query->bindParam(':stadium', $this->stadium);
      $query->bindParam(':coach', $this->coach);

      return $query->execute();

    }

    public function update() {
      $query = $this->pdo->prepare(
                                    ' UPDATE  team
                                      SET     name = :name,
                                              yearFoundation = :yearFoundation,
                                              league = :league,
                                              stadium = :stadium,
                                              coach = :coach
                                      WHERE   id = :id'
                                  );

      $query->bindParam(':name', $this->name);
      $query->bindParam(':yearFoundation', intval($this->yearFoundation));
      $query->bindParam(':league', $this->league);
      $query->bindParam(':stadium', $this->stadium);
      $query->bindParam(':coach', $this->coach);
        $query->bindParam(':id', $this->id);

      return $query->execute();

    }

    public function delete() {
      $query = $this->pdo->prepare(
                                    ' DELETE FROM  team
                                      WHERE   id = :id'
                                  );
      $query->bindParam(':id', $this->id);

      return $query->execute();

    }

  }
