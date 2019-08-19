<?php
  class JokeController{
    private $jokeTable;
    private $authorTable;
    public function __construct(DatabaseTable $jokeTable,DatabaseTable $authorTable){
      $this->jokeTable=$jokeTable;
      $this->authorTable=$authorTable;
    }
    public function list(){
      $result=$this->jokeTable->findAll();
			$jokes=[];
			foreach($result as $joke){
				$author=$this->authorTable->findById($joke['authorid']);
				$jokes[]=[
					'jokeid'=>$joke['jokeid'],
					'joketext'=>$joke['joketext'],
					'jokedate'=>$joke['jokedate'],
					'name'=>$author['name'],
				];
			}
			$totalJokes=$this->jokeTable->getTotal();
			$title="Joke List";
      return ['title'=>$title,'template'=>'jokes.html.php','variables'=>[
        'jokes'=>$jokes??null,
        'totalJokes'=>$totalJokes??null],];
    }
    public function home(){
      $title="Internet Joke Database";
      return ['title'=>$title,'template'=>'home.html.php'];
    }
    public function delete(){
      $this->jokeTable->delete($_POST['jokeid']);
			header('Location:jokes.php');
    }
    public function edit(){
      if(isset($_POST['joke'])){
        $joke=$_POST['joke'];
        $joke['authorid']=1;
        $joke['jokedate']=new DateTime();
        $this->jokeTable->save($joke);
        header('Location: jokes.php');
      }else{
        if(isset($_GET['jokeid'])){
          $joke=$this->jokeTable->findById($_GET['jokeid']);
        }
        $title="Edit Joke";
      }
      return ['title'=>$title,'template'=>'editJoke.html.php','variables'=>['joke'=>$joke??null],];
    }
  }
 ?>
