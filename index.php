<?php

// Démarrage sessions PHP
// (pour le support des variables de session)
session_start();

require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \blogapp\conf\ConnectionFactory;

// Création de la connexion à la base
ConnectionFactory::makeConnection('src/conf/conf.ini');

// Configuration de Slim

$configuration = [
    'settings' => [
        'displayErrorDetails' => true
    ],
    'flash' => function() {
        return new \Slim\Flash\Messages();
    }
];

// Création du dispatcher

$app = new \Slim\App($configuration);

// Définition des routes

$app->get('/billet/{id}',
          '\blogapp\controleur\BilletControleur:affiche')
    ->setName('billet_aff');

$app->get('/',
          '\blogapp\controleur\BilletControleur:liste')
    ->setName('billet_liste');

$app->get('/newutil',
          '\blogapp\controleur\UtilisateurControleur:nouveau')
    ->setName('util_nouveau');

$app->get('/signup',
          '\blogapp\controleur\UtilisateurControleur:connexion')
    ->setName('util_connexion');

$app->post('/createutil',
          '\blogapp\controleur\UtilisateurControleur:cree')
    ->setName('util_cree');

$app->post('/connecteutil',
          '\blogapp\controleur\UtilisateurControleur:connecter')
    ->setName('util_conn');

$app->run();
