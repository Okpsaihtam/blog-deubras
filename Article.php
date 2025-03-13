<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $utilisateur_id;

    public function __construct($titre, $contenu, $utilisateur_id) {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->utilisateur_id = $utilisateur_id;
    }

    public function publier() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO articles (titre, contenu, utilisateur_id) VALUES (?, ?, ?)");
        return $stmt->execute([$this->titre, $this->contenu, $this->utilisateur_id]);
    }
}
?>
