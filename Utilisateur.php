<?php
class Utilisateur {
    private $id;
    private $nom;
    private $email;
    private $mot_de_passe;

    public function __construct($nom, $email, $mot_de_passe) {
        $this->nom = $nom;
        $this->email = $email;
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }

    public function enregistrer() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
        return $stmt->execute([$this->nom, $this->email, $this->mot_de_passe]);
    }
}
?>
