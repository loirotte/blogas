<?php

namespace blogapp\vue;

use blogapp\vue\Vue;

class UtilisateurVue extends Vue {
    const NOUVEAU_VUE = 1;
    const NOUVEAU_CONNEXION = 2;

    public function render() {
        switch($this->selecteur) {
            case self::NOUVEAU_VUE:
                $content = $this->nouveau();
                break;
//        ça ne marche pas mais ça me semble plutot logique
            case self::NOUVEAU_CONNEXION:
                $content = $this->connexion();
                break;

        }
        return $this->userPage($content);
    }

    public function nouveau() {
        return <<<YOP
        <form method="post" action="{$this->cont['router']->pathFor('util_cree')}">
        <h1>CREATION</h1>
          pseudo
          <input type="text" name="pseudo"><br>
          nom
          <input type="text" name="nom"><br>
          prenom
          <input type="text" name="prenom"><br>
          mail
          <input type="text" name="mail"><br>
          mot de passe
          <input type="password" name="mot de passe"><br>
          <input type="submit" value="Validation">
        </form>
YOP;
    }

    //Je pense appeler la methode la dans index
    public function connexion() {
        return <<<YOP
        <form method="post" action="{$this->cont['router']->pathFor('util_connexion')}">
        <h1>CONNEXION</h1>          
          mail
          <input type="text" name="mail"><br>
          mot de passe
          <input type="password" name="mot de passe"><br>
          <input type="submit" value="connexion">
        </form>
YOP;
    }


}