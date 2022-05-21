<?php

namespace blogapp\controleur;

use blogapp\modele\Billet;
use blogapp\vue\BilletVue;

class BilletControleur {
    private $cont;
    
    public function __construct($conteneur) {
        $this->cont = $conteneur;
    }

    public function affiche($rq, $rs, $args) {
        $id = $args['id'];
        $billet = Billet::where('id', '=', $id)->first();
        $coms = Commantaire::select('id','pseudo','textcom','dateCom')->where('idBillet','=',$id)->get();

        $bl = new BilletVue($this->cont, $billet, BilletVue::BILLET_VUE);
        $rs->getBody()->write($bl->render());
        return $rs;
    }

    public function liste($rq, $rs, $args) {
        $billets = Billet::get();

        $bl = new BilletVue($this->cont, $billets, BilletVue::LISTE_VUE);
        $rs->getBody()->write($bl->render());
        return $rs;
    }
}
