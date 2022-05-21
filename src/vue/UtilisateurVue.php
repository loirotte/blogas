<?php

namespace blogapp\vue;

use blogapp\vue\Vue;

class UtilisateurVue extends Vue {
    const NOUVEAU_VUE = 1;
    
    public function render() {
        switch($this->selecteur) {
        case self::NOUVEAU_VUE:
            $content = $this->nouveau();
            break;
        }
        return $this->userPage($content);
    }

    public function nouveau() {
        return <<<YOP
        <form method="post" action="{$this->cont['router']->pathFor('util_cree')}">
            <h1>Inscription d'un nouveau membre</h1>
            <input type="text" class="toggle-all" name="pseudo" placeholder="Enter your pseudo" required><br>
            <input type="text" name="nom" placeholder="Enter your nom" required><br>
            <input type="text" name="prenom" placeholder="Enter your prenom" required><br>
            <input type="text" name="mail" placeholder="Enter your mail" required><br>
            <input type="text" name="mdp_hash" placeholder="Enter your password" required><br>
            <input type="text" name="verification" placeholder="Enter your password again" required><br>
            <input type="submit" value="Enregistrer">
        </form>
YOP;
    }
}
