<?php
  class DatabaseTable{
    private $pdo;
    private $table;
    private $primarykey;
    public function __construct(PDO $pdo,string $table,string $primarykey){
      $this->pdo=$pdo;
      $this->table=$table;
      $this->primarykey=$primarykey;
    }
    private function query($sql,$parameters=[]){
      $query=$this->pdo->prepare($sql);
      $query->execute($parameters);
      return $query;
    }
    public function getTotal(){
      $query="SELECT COUNT(*) FROM ".$this->table;
      $query=$this->query($query,$parameters=[]);
      $query=$query->fetch();
      return $query[0];
    }
    public function findById($value){
      $query='SELECT * FROM `'.$this->table.'` WHERE '.$this->primarykey.'= :id';
      $parameters=[':id'=>$value];
      $res=$this->query($query,$parameters);
      return $res->fetch();
    }
    private function insert($array){
        $query='INSERT INTO '.$this->table.'(';
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
          $array=$this->processDates($array);
          $this->query($query,$array);
      }
      private function update($array){
        $query="UPDATE ".$this->table." SET ";
        foreach ($array as $key => $value) {
          $query.=$key.' =:'.$key.',';
        }
        $query=rtrim($query,',');
        $query.=" WHERE ".$this->primarykey."=:primarykey";
        $array['primarykey']=$array[$this->primarykey];
        $array=$this->processDates($array);
        $this->query($query,$array);
      }
      public function delete($id){
        $query="DELETE FROM ". $this->table." WHERE ". $this->primarykey."=:id";
        $parameters=['id'=>$id];
        $this->query($query,$parameters);
      }
      private function processDates($array){
        foreach($array as $key=>$value){
          if($value instanceof DateTime){
            $array[$key]=$value->format('Y-m-d');
          }
        }
        return $array;
      }
      public function findAll(){
        $result=$this->query('SELECT * FROM '.$this->table);
        return $result->fetchAll();
      }
      public function save($array){
        try {
          if($array[$this->primarykey]==''){
            $array[$this->primarykey]=null;
          }
          $this->insert($array);
        } catch (PDOException $e) {
          $this->update($array);
        }
      }
  }
 ?>
