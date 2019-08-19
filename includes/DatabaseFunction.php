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
  function insert($pdo,$table,$array){
    $query='INSERT INTO '.$table.'(';
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
      echo $query;
      $array=processDates($array);
      query($pdo,$query,$array);
  }
  //update joke
  function update($pdo,$table,$array,$primarykey){
    $query="UPDATE ".$table." SET ";
    foreach ($array as $key => $value) {
      $query.=$key.' =:'.$key.',';
    }
    $query=rtrim($query,',');
    $query.=" WHERE ".$primarykey."=:primarykey";
    $array['primarykey']=$array[$primarykey];
    $array=processDates($array);
    query($pdo,$query,$array);
  }
  //delete
  function delete($pdo,$table,$primarykey,$id){
    $query="DELETE FROM ". $table." WHERE ". $primarykey."=:id";
    $parameters=['id'=>$id];
    query($pdo,$query,$parameters);
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
  function insertAuthor($pdo,$array){
    $query='INSERT INTO author'.'( ';
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
        query($pdo,$query,$array);
  }

  function findById($pdo,$table,$primarykey,$value){
    $query="SELECT * FROM ".$table." WHERE ".$primarykey."=:value";
    $parameters=[':value'=>$value];
    $query=query($pdo,$query,$parameters);
    return $query->fetch();
  }
  function getTotal($pdo,$table){
    $query="SELECT COUNT(*) FROM ".$table;
    $query=query($pdo,$query,$parameters=[]);
    $query=$query->fetch();
    return $query[0];
  }
  //save
  function save($pdo,$table,$array,$primarykey){
    try {
      if($array[$primarykey]==''){
        $array[$primarykey]=null;
      }
      insert($pdo,$table,$array);
    } catch (PDOException $e) {
      update($pdo,$table,$array,$primarykey);
    }

  }
 ?>
