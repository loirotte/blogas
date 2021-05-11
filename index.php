<?php

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
    ]
];

// Création du dispatcher

$app = new \Slim\App($configuration);

// Définition des routes

$app->get('/billet/{id}',
          '\blogapp\controleur\BilletControleur:affiche')
    ->setName('billet_aff');

$app->get('/billets',
          '\blogapp\controleur\BilletControleur:liste')
    ->setName('billet_liste');

$app->run();
