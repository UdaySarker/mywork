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
  function getAllJoke($pdo){
    $sql="SELECT joke.jokeid,joke.joketext,author.name,joke.authorid FROM joke INNER JOIN author ON joke.authorid=author.id";
    $result=query($pdo,$sql,$parameters=[]);
    return $result->fetchAll();
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
  //update joke
  function updateJoke($pdo,$jokeid,$joketext,$authorid){
    $sql="UPDATE joke SET joketext=:joketext,authorid=:authorid WHERE jokeid=:jokeid";
    $parameters=[':authorid'=>$authorid,':joketext'=>$joketext,':jokeid'=>$jokeid];
    query($pdo,$sql,$parameters);
  }
  function deleteJoke($pdo,$jokeid){
    $sql="DELETE FROM joke WHERE jokeid=:jokeid";
    $parameters=['jokeid'=>$jokeid];
    query($pdo,$sql,$parameters);
  }
 ?>
