<?php

namespace blogapp\controleur;
use blogapp\modele\Categorie;
use blogapp\modele\Billet;
use blogapp\vue\newBillVue;

class newBillControleur
{
    private $cont;

    private function __construct($conteneur)
    {
        $this->cont = $conteneur;
    }

    public function nouveau($rq, $rs, $args) {
        $bill = newBillVue($this->cont, null, newBillVue::NOUVEAU_VUE);
        $rs->getBody()->write($bill->render());
        return $rs;
    }
}