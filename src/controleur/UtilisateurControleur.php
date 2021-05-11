<?php

namespace blogapp\controleur;

use blogapp\vue\UtilisateurVue;

class UtilisateurControleur {
    private $cont;
    
    public function __construct($conteneur) {
        $this->cont = $conteneur;
    }

    public function nouveau($rq, $rs, $args) {
        $bl = new UtilisateurVue($this->cont, null, UtilisateurVue::NOUVEAU_VUE);
        $rs->getBody()->write($bl->render());
        return $rs;
    }

    public function cree($rq, $rs, $args) {
        print(filter_var($rq->getParsedBodyParam('nom'), FILTER_SANITIZE_STRING));
        // Insertion dans la base...
        // Redirection vers l'URL finale...
    }
}
