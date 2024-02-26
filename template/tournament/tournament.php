<?php

class DatabaseTournament
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=tpmach';
        $username = 'root';
        $password = '';

        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Méthode pour ajouter un joueur à la base de données
    public function addPlayer($nom, $prenom, $nationalite, $age, $classement, $force_joueur, $endurance_joueur, $precision_joueur)
    {
        // Préparation de la requête d'insertion
        $stmt = $this->pdo->prepare("INSERT INTO joueurs (nom, prenom, nationalite, age, classement, force_joueur, endurance_joueur, precision_joueur) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Exécution de la requête avec les valeurs des paramètres
        $stmt->execute([$nom, $prenom, $nationalite, $age, $classement, $force_joueur, $endurance_joueur, $precision_joueur]);
    }
    public function createTables()
    {
        try {
            $this->pdo->exec("
                CREATE TABLE IF NOT EXISTS tournois (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nom VARCHAR(100) NOT NULL,
                    date_debut DATE NOT NULL,
                    date_fin DATE NOT NULL
                );
                
                CREATE TABLE IF NOT EXISTS joueurs (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nom VARCHAR(100) NOT NULL,
                    prenom VARCHAR(100) NOT NULL,
                    nationalite VARCHAR(50) NOT NULL,
                    age INT,
                    classement INT,
                    force INT,
                    endurance INT,
                    precision INT,
                );
                
                CREATE TABLE IF NOT EXISTS matchs (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    tournoi_id INT,
                    joueur1_id INT,
                    joueur2_id INT,
                    date_match DATETIME,
                    score_joueur1 INT,
                    score_joueur2 INT,
                    gagnant_id INT,
                    FOREIGN KEY (tournoi_id) REFERENCES tournois(id),
                    FOREIGN KEY (joueur1_id) REFERENCES joueurs(id),
                    FOREIGN KEY (joueur2_id) REFERENCES joueurs(id),
                    FOREIGN KEY (gagnant_id) REFERENCES joueurs(id)
                );
            ");
            echo "Tables créées avec succès!";
        } catch (PDOException $e) {
            echo "Erreur lors de la création des tables: " . $e->getMessage();
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
