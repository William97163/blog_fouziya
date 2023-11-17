<?php
namespace  class;
class Commentaire
{
    public $id;
    public $contenu;
    public $date;
    public $id_user;
    public $id_post;
    public function __construct($id, $contenu, $date, $id_user, $id_post) {
        $this->id = $id;
        $this->contenu = $contenu;
        $this->date = $date;
        $this->id_user = $id_user;
        $this->id_post = $id_post;
    }

    public static function fetchCommentaire() {
        $response = file_get_contents('http://localhost:5000/commentaires');
        $data = json_decode($response);

        $commentaires = [];
        foreach ($data as $item) {
            $commentaire = new Commentaire($item[0], $item[1], $item[2], $item[3], $item[4]);
            $commentaires[] = $commentaire;
        }

        return $commentaires;
    }

    public function display() {

        echo "<div class='commentaire '><div>Id : " . $this->id . "</div>";
        echo "<div>Contenu : " . $this->contenu . "</div>";
        echo "<div>Date : " . $this->date . "</div>";
        echo "id_user : <div class='id_user'>" . $this->id_user . "</div>";
        echo "<div>id_post : " . $this->id_post . "</div>";
        echo"</div>";
    }

}
?>