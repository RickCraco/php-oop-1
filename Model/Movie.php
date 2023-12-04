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
}

$movieString = file_get_contents(__DIR__.'/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];

foreach($movieList as $item){
    $movie = new Movie($item['id'], $item['title'], $item['original_title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language']);
    array_push($movies, $movie);
}

?>