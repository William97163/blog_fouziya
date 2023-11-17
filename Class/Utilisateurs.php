<?php

namespace class;
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

    public static function fetchUtilisateurs() {
        $response = file_get_contents('http://localhost:5000/utilisateurs');
        $data = json_decode($response);

        $utilisateurs = [];
        foreach ($data as $item) {
            $utilisateur = new Utilisateur($item[0], $item[1], $item[2], $item[3], $item[4]);
            $utilisateurs[] = $utilisateur;
        }

        return $utilisateurs;
    }
//    public static function loginUtilisateur($form) {
//        $response = file_get_contents('http://localhost:5000/login');
//        $data = json_decode($response);
//
//        $utilisateur = new Utilisateur($item[0], $item[1], $item[2], $item[3], $item[4]);
//
//        return $utilisateur;
//    }



    public function display() {

        echo "<div class='utilisateur '><div>Id : " . $this->id . "</div>";
        echo "<div>Pseudo : " . $this->pseudo . "</div>";
        echo "<div>Mot de pass : " . $this->mdp . "</div>";
        echo "Mail : <div class='mail'>" . $this->mail . "</div>";
        echo "<div>telephone : " . $this->tel . "</div>";
        echo"</div>";
    }
}
?>