<?php

require_once '../../template/tournament/tournament.php';

class PlayerController {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DatabaseTournament();
    }

    public function showPlayerForm() {
        // Inclure la vue du formulaire pour saisir les joueurs et leurs statistiques
        require '../../template/player/playerForm.php';
    }

    public function addPlayers() {
        // Vérifier si des données de joueur ont été soumises
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $playersData = $_POST['players'];

            // Insérer les joueurs dans la base de données en utilisant le modèle
            foreach ($playersData as $player) {
                $this->dbModel->addPlayer($player['nom'], $player['prenom'], $player['nationalite'], $player['age'], $player['classement'], $player['force_joueur'], $player['endurance_joueur'], $player['precision_joueur']);
            }

            // Rediriger vers une page de confirmation ou une autre action
            header("Location: playerForm.php");
            exit();
        }
    }
    
    public function addPlayer($nom, $prenom, $nationalite, $age, $classement, $force_joueur, $endurance_joueur, $precision_joueur) {
        // Ajouter un joueur à la base de données
        $this->dbModel->addPlayer($nom, $prenom, $nationalite, $age, $classement, $force_joueur, $endurance_joueur, $precision_joueur);
    }
}
