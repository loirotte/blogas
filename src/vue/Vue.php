<?php

namespace blogapp\vue;

class Vue {

    protected $cont;
    protected $source;
    protected $selecteur;

    public function __construct($cont, $src, $sel) {
        $this->cont = $cont;
        $this->source = $src;
        $this->selecteur = $sel;
    }

    // Méthode qui calcule la base de l'URL (nécessaire pour le bon
    // fonctionnnement des fichiers « statiques », comme styles.css)
    public function baseURL() {
        $url = $this->cont['environment']['SCRIPT_NAME'];
        $url = str_replace("/index.php", "", $url);
        return $url;
    }
    
    public function userPage($cont) {
        $res = "";

        $res .= "<!doctype html>";
        $res .= "<html>";
        $res .= "<head>";
        $res .= "<title>Application de Blog !</title>";
        $res .= "<link rel=\"stylesheet\" href=\"" .
                $this->baseURL() .
                "/css/styles.css\" type=\"text/css\" />";
        $res .= "<meta charset=\"utf-8\" />";
        $res .= "</head>";
        $res .= "<body>";
        $res .= $cont;
        $res .= "</body>";
        $res .= "</html>";

        return $res;
    }
}
