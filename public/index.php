<?php
  require_once '../classes/TeamManager.php';
  $tm = new TeamManager();
  $teams = $tm->findAll();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>POO Projet 1</title>
    <?php include 'css.inc.php' ?>
  </head>
  <body>
    <?php include 'menu.inc.php';?>
    <h1>POO Projet 1</h1>

    <h2>Enregistrement une équipe</h2>
    <form method="post" action="../process_team.php">
      <input type="text" name="name" placeholder="Nom">
      <input type="text" name="yearFoundation" placeholder="Année de création">
      <input type="text" name="league" placeholder="Championnat">
      <input type="text" name="stadium" placeholder="Nom du stade">
      <input type="text" name="coach" placeholder="Entraîneur">
      <input type="submit" name="submit" value="Enregistrer">
    </form>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Année de création</th>
            <th>Championnat</th>
            <th>Stade</th>
            <th>Entraîneur</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php
        $html = '';
        foreach($teams as $team) {
          $html .= '<tr>';
          $html .= '<td><a href="team_detail.php?id='. $team->getId() .'">' . $team->getName() . '</a></td>';
          $html .= '<td>' . $team->getYearFoundation() . '</td>';
          $html .= '<td>' . $team->getLeague() . '</td>';
          $html .= '<td>' . $team->getStadium() . '</td>';
          $html .= '<td>' . $team->getCoach() . '</td>';
          $html .= '<td><a href="team_update.php?id='.$team->getId().'">Editer</a></td>';
          $html .= '<td><a href="team_delete.php?id='.$team->getId().'">Supprimer</a></td>';
          $html .= '</tr>';
        }
        echo $html;
        ?>
      </tbody>
    </table>
  <footer>
    <?php include 'menu.inc.php' ?>
  </footer>
  </body>
</html>
