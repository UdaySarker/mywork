<?php
include __DIR__.'\.\includes\DatabaseConnection.php';
include __DIR__.'\.\includes\DatabaseFunction.php';
  try {
    if(isset($_POST['updateJoke'])){
      $joketext=htmlspecialchars($_POST['jokes']);
      updateJoke($pdo,$_POST['jokeid'],$joketext,$_POST['authorid']);
      header('Location: jokes.php');
    }else{
      $joke=getJoke($pdo,$_GET['jokeid']);
      $title="Edit Joke";
      ob_start();
      include __DIR__.'\.\template\editJoke.html.php';
      $output=ob_get_clean();
    }
  } catch (PDOException $e) {
      $output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine().$e->getMessage();
  }
  include __DIR__.'\.\template\layout.html.php';
 ?>
