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

    public function ajoute($rq, $rs, $args){
        $content = filter_var($rq->getParsedBodyParam('commentaire'), FILTER_SANITIZE_STRING);
        $billet = $args['id'];
        $auteur = $_COOKIE['membre'];

        $commentaire = new Commentaire();
        $commentaire->content = $content;
        $commentaire->billet = $billet;
        $commentaire->auteur = $auteur;
        $commentaire->date = date("Y-m-d");
        $commentaire->save();

        $this->cont->flash->addMessage('info', "Billet posté :)");
        return $rs->withRedirect($this->cont->router->pathFor('billet_aff', ['id' => $billet]));
    }
}
