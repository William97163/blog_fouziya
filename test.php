<?php
class Utilisateur
{
    public $id;
    public $pseudo;
    public $mdp;
    public $mail;
    public $tel;

    public function __construct($id, $pseudo, $mdp, $mail, $tel) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->mail = $mail;
        $this->tel = $tel;
    }

    public static function fetchUtilisateur() {
        $response = file_get_contents('http://localhost:5000/utilisateurs');
        $data = json_decode($response);

        $livres = [];
        foreach ($data as $item) {
            $utilisateur = new Utilisateur($item[0], $item[1], $item[2], $item[3], $item[4]);
            $utilisateurs[] = $utilisateur;
        }

        return $utilisateurs;
    }

    public function display() {

        echo "<div class='utilisateur '><div>Id : " . $this->id . "</div>";
        echo "<div>Titre : " . $this->pseudo . "</div>";
        echo "<div>Mot de pass : " . $this->mdp . "</div>";
        echo "Mail : <div class='mail'>" . $this->mail . "</div>";
        echo "<div>telephone : " . $this->tel . "</div>";
        echo"</div>";
    }

}
?>

<div class="utilisateurs"> <h2>Utilisateur :</h2>
    <?php
    $utilisateurs = Utilisateur::fetchUtilisateur();
    ?>
    <div>
        <?php
        foreach ($utilisateurs as $utilisateur){
            $utilisateur->display();
        }
        ?>
    </div>
</div>