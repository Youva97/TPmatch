<?php

require_once '../../template/tournament/tournament.php';
require_once './PlayerController.php';

class DatabaseTournamentController
{
    private $dbModel;

    private $playerController;

    public function __construct()
    {
        $this->dbModel = new DatabaseTournament();
        $this->playerController = new PlayerController();
    }

    public function createTables()
    {
        $this->dbModel->createTables();
    }

    public function index()
    {
        // Logique de traitement des données
        // Vous pouvez interagir avec la base de données à partir d'ici

        // Appel à une méthode du PlayerController
        $this->playerController->showPlayerForm();

        // Inclure la vue
        require '../../index.php'; // Chemin correct vers le fichier index.php
    }
}

// Exemple d'utilisation
$controller = new DatabaseTournamentController();
$controller->createTables();
$controller->index();
