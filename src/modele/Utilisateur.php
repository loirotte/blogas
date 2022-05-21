<?php

namespace blogapp\modele;

class Utilisateur extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'util';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

?>