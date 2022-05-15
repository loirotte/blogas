<?php

namespace blogapp\modele;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model {
    protected $table = 'membres';
    protected $primaryKey = 'id';
    protected $pseudo, $nom, $prenom, $mail, $mdp;
    public $timestamp = false;
}

?>