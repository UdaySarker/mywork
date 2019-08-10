<?php
include __DIR__.'\.\includes\DatabaseConnection.php';
include __DIR__.'\.\includes\DatabaseFunction.php';
  try {
    if(isset($_POST['updateJoke'])){
      updateJoke()
    }else{
      $title="Edit Joke"
    }
  } catch (PDOException $e) {
      $output='Unable to connect to database server. Error in'.$e->getFile()." on line".$e->getLine().$e->getMessage();
  }

 ?>
