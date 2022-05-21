<?php

namespace blogapp\modele;

class Commentaire extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'commentaire';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function billet() {
        return $this->belongsTo('\blogapp\modele\Billet', 'idBillet');
    }

    public function utilisateur() {
        return $this->belongsTo('\blogapp\modele\utilisateur', 'pseudo');
    }
}

?>