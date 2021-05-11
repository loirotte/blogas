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

    public function userPage($cont) {
        $res = "";

        $res .= "<!doctype html>";
        $res .= "<html>";
        $res .= "<head>";
        $res .= "<title>Application de Blog !</title>";
        $res .= "<link rel=\"stylesheet\" href=\"css/styles.css\" type=\"text/css\" />";
        $res .= "<meta charset=\"utf-8\" />";
        $res .= "</head>";
        $res .= "<body>";
        $res .= $cont;
        $res .= "</body>";
        $res .= "</html>";

        return $res;
    }
}
