<?php

class Movie{
    public $id;
    public $title;
    public $original_title;
    public $overview;
    public $vote;
    public $poster_path;
    public $original_language;

    function __construct($id, $title, $original_title, $overview, $vote, $poster_path, $original_language){
        $this->id = $id;
        $this->title = $title;
        $this->original_title = $original_title;
        $this->overview = $overview;
        $this->vote = $vote;
        $this->poster_path = $poster_path;
        $this->original_language = $original_language;
    }

    public function printCard(){
        $image = $this->poster_path;
        $title = $this->title;
        $content = $this->overview;
        $custom = $this->vote;

        include __DIR__."/../Views/card.php";
    }

    public function getVote(){
        $vote = ceil($this->vote / 2);
        $template = "<p class= 'm-0'>";
        for($n=1; $n<=$vote; $n++){
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }
}

$movieString = file_get_contents(__DIR__.'/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];

foreach($movieList as $item){
    $movie = new Movie($item['id'], $item['title'], $item['original_title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language']);
    array_push($movies, $movie);
}

?>