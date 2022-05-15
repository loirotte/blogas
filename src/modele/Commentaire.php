<?php

namespace blogapp\modele;


class Commentaire extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'commentaires';
    protected $primaryKey = 'id';
    protected $billet, $content, $auteur, $date;
    public $timestamps = false;

}

?>
