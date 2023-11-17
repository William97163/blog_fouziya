<?php
namespace entity;
class Post
{
    public $id;
    public $content;
    public $title;
    public $date;
    public $id_admin;

    public function __construct($id, $content, $date, $id_admin,  $title) {
        $this->id = $id;
        $this->date = $date;
        $this->content = $content;
        $this->id_admin = $id_admin;
        $this->title = $title;
    }

    public static function fetchPosts() {
        $response = file_get_contents('http://localhost:5000/posts');
        $data = json_decode($response);

        $posts = [];
        foreach ($data as $item) {
            $post = new Post($item[0], $item[1], $item[2], $item[3], $item[4]);
            $posts[] = $post;
        }

        return $posts;
    }

    public function display() {

        echo "<div class='post '><div>Id : " . $this->id . "</div>";
        echo "<div>Contenu : " . $this->contenu . "</div>";
        echo "<div>Date : " . $this->date . "</div>";
        echo "Mail : <div class='id_admin'>" . $this->id_admin . "</div>";
        echo"</div>";
    }

}
?>
