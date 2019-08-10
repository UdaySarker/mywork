<?php
  function totalJokesCounter($database){
    $sql="SELECT COUNT(*) FROM joke";
    $query=query($database,$sql,$parameters=[]);
    $row=$query->fetch();
    return $row[0];
  }
  function getJoke($pdo,$id){
    $sql="SELECT jokeid,joketext,authorid FROM joke WHERE jokeid=:jokeid";
    $parameters=[':jokeid'=>$id];
    $joke=query($pdo,$sql,$parameters);
    return $joke->fetch();
  }
  function query($pdo,$sql,$parameters){
    $query=$pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
  }
  function insertJoke($pdo,$joke,$author){
    $sql="INSERT INTO joke(joketext,jokedate,authorid) VALUES (:joketext,CURDATE(),:authorid)";
    $parameters=[':joketext'=>$joke,':authorid'=>$author];
    query($pdo,$sql,$parameters);
  }
  function updateJoke($pdo,$authorid,$joketext,$jokeid){
    $sql="UPDATE joke SET joketext=:joketext,authorid=:authorid WHERE jokeid=:id";
    $parameters=[':authorid'=>$authorid,':joketext'=>$joketext,':id'=>$jokeid];
    query($pdo,$sql,$parameters);
  }
 ?>
