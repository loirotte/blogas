<?php

namespace blogapp\controleur;

use blogapp\modele\Utilisateur;
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

    public function connexion($rq, $rs, $args) {
            $bl = new UtilisateurVue($this->cont, null, UtilisateurVue::NOUVEAU_CONNEXION);
            $rs->getBody()->write($bl->render());
            return $rs;
        }


    public function cree($rq, $rs, $args) {
        // Récupération variable POST + nettoyage
        $u = new Utilisateur();
        $u->pseudo = filter_var($rq->getParsedBodyParam('pseudo'), FILTER_SANITIZE_STRING);
        $u->nom = filter_var($rq->getParsedBodyParam('nom'), FILTER_SANITIZE_STRING);
        $u->prenom = filter_var($rq->getParsedBodyParam('prenom'), FILTER_SANITIZE_STRING);
        $u->mail = filter_var($rq->getParsedBodyParam('mail'), FILTER_SANITIZE_STRING);
        $u->mdp = password_hash(filter_var($rq->getParsedBodyParam('mdp'), FILTER_SANITIZE_STRING), 
                                    PASSWORD_DEFAULT, ['cost'=>12]);
        // Insertion dans la base...
        $u->save();
        // Ajout d'un flash
        $this->cont->flash->addMessage('info', "Utilisateur $pseudo ajouté !");
        // Retour de la réponse avec redirection
        return $rs->withRedirect($this->cont->router->pathFor('billet_liste'));
    }
}
