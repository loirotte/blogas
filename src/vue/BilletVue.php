<?php

namespace blogapp\vue;
use blogapp\vue\Vue;

class BilletVue extends Vue {
    const BILLET_VUE = 1;
    const LISTE_VUE = 2;
    
    private $cont;
    private $source;
    private $selecteur;

    public function __construct($cont, $src, $sel) {
        $this->cont = $cont;
        $this->source = $src;
        $this->selecteur = $sel;
    }

    public function render() {
        switch($this->selecteur) {
        case self::BILLET_VUE:
            $content = $this->billet();
            break;
        case self::LISTE_VUE:
            $content = $this->liste();
            break;
        }
        return $this->userPage($content);
    }

    public function billet() {
        $res = "";

        if ($this->source != null) {
            $res .= "<h1>Affichage du billet : {$this->source->id}</h1>";
            $res .= "<h2>Nom : {$this->source->titre}</h1>";
            $res .= "<ul>";
            $res .= "<li>Catégorie : {$this->source->categorie->titre}</li>";
            $res .= "<li>Contenu : {$this->source->body}</li>";
            $res .= "</ul>";
        }
        else
            $res .= "<h1>Erreur : le billet n'existe pas !</h1>";

        return $res;
    }

    public function liste() {
        $res = "";
        
        if ($this->source != null) {
            $res .= "<h1>Affichage de la liste des billets</h1>";
            $res .= "<ul>";

            foreach ($this->source as $billet) {
                $url = $this->cont['router']->pathFor('billet_aff', ['id' => $billet->id]);
                $res .= "<li><a href=\"$url\">";
                $res .= $billet->titre;
                $res .= "</a></li>";
                
            }

            $res .= "</ul>";
        }
        else
            $res .= "<h1>Erreur : la liste de billets n'existe pas !</h1>";

        return $res;
    }
}
