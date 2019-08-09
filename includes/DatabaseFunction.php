<?php
  function totalJokesCounter($database){
    $sql="SELECT COUNT(*) FROM joke";
    $query=$database->prepare($sql);
    $query->execute();
    $row=$query->fetch();
    return $row[0];
  }
 ?>
