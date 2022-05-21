<?php

namespace blogapp\modele;

class Membre extends Illuminate\Database\Eloquent\Model {
    protected $table = 'membres';
    protected $primaryKey = 'id';
    public $pseudo, $nom, $prenom, $mail, $mdp_hash;
    public $timestamp = false;
}

?>