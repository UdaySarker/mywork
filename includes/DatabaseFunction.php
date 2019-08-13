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
    $sql="SELECT joke.jokeid,joke.joketext,joke.jokedate,author.name,joke.authorid FROM joke INNER JOIN author ON joke.authorid=author.id";
    $result=query($pdo,$sql,$parameters=[]);
    return $result->fetchAll();
  }
  function query($pdo,$sql,$parameters){
    $query=$pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
  }
  //insert
  function insertJoke($pdo,$array){
    $query='INSERT INTO joke (';
      foreach($array as $key=>$value){
        $query.=$key.',';
      }
      $query=rtrim($query,',');
      $query.=')VALUES(';
        foreach($array as $key=>$value){
          $query.=':'.$key.',';
        }
        $query=rtrim($query,',');
        $query.=')';
        $array=processDates($array);
    query($pdo,$query,$array);
  }
  //update joke
  function updateJoke($pdo,$array){
    $sql="UPDATE joke SET joketext=:joketext,authorid=:authorid WHERE jokeid=:jokeid";
    $query="UPDATE joke SET ";
    foreach ($array as $key => $value) {
      $query.=$key.' =:'.$key.',';
    }
    $query=rtrim($query,',');
    $query.=" WHERE jokeid =:primarykey";
    $array['primarykey']=$array['jokeid'];
    echo $query;
    print_r($array);
    query($pdo,$query,$array);
  }
  function deleteJoke($pdo,$jokeid){
    $sql="DELETE FROM joke WHERE jokeid=:jokeid";
    $parameters=['jokeid'=>$jokeid];
    query($pdo,$sql,$parameters);
  }
  function processDates($array){
    foreach($array as $key=>$value){
      if($value instanceof DateTime){
        $array[$key]=$value->format('Y-m-d');
      }
    }
    return $array;
  }
  function deleteAuthor($pdo,$id){
    $query="DELETE FROM author WHERE id=:id";
    $parameters=["id"=>$id];
    query($pdo,$query,$parameters);
  }
  function allAuthor($pdo){
    $query="SELECT * FROM author";
    $result=$query($pdo,$query,$parameters=[]);
    return $result->fetchAll();
  }
  
 ?>
