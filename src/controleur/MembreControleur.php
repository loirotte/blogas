<?php

namespace blogapp\controleur;
use blogapp\modele\Membre;
use blogapp\vue\MembreVue;

class MembreControleur
{
    private $cont;

    public function __construct($conteneur)
    {
        $this->cont = $conteneur;
    }

    //accéder à la page de connexion
    public function connexion($rq, $rs, $args)
    {
        $bl = new MembreVue($this->cont, null, MembreVue::NOUVEAU_VUE);
        $rs->getBody()->write($bl->render());
        return $rs;
    }

    //to disconnect
    public function deconnexion($rq, $rs, $args){
        if (isset($_COOKIE["membre_authentifier"]))
        {
            setcookie("membre");
        }
        $this->cont->flash->addMessage('info', "disconnection successfully");
        return $rs->withRedirect($this->cont->router->pathFor('billet_liste',['numPage' => 1]));
    }
}