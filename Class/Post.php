<?php
namespace entity;
class Post
{
    public $id;
    public $contenu;
    public $date;
    public $id_admin;

    public function __construct($id, $contenu, $date, $id_admin) {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->date = $date;
        $this->id_admin = $id_admin;
    }

    public static function fetchPost() {
        $response = file_get_contents('http://localhost:5000/posts');
        $data = json_decode($response);

        $posts = [];
        foreach ($data as $item) {
            $post = new Post($item[0], $item[1], $item[2], $item[3]);
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
