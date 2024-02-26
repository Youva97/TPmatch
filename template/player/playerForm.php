<div class="player-form-container">
    <h2 class="mt-4">Ajouter des Joueurs</h2>
    <form class="mt-4" method="post" action="index.php">
        <?php for ($i = 1; $i <= 4; $i++) { ?>
            <?php if ($i == 1 || !empty($_POST['players'][$i - 1]['nom'])) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nom_<?php echo $i; ?>" class="form-label">Nom du Joueur <?php echo $i; ?>:</label>
                        <select class="form-select mb-3" id="nom_<?php echo $i; ?>" name="players[<?php echo $i; ?>][nom]">
                            <option value="Roger">Roger</option>
                            <option value="Rafael">Rafael</option>
                            <option value="Novak">Novak</option>
                            <!-- Ajoutez d'autres options de noms ici -->
                        </select>

                        <label for="prenom_<?php echo $i; ?>" class="form-label">Prénom du Joueur <?php echo $i; ?>:</label>
                        <select class="form-select mb-3" id="prenom_<?php echo $i; ?>" name="players[<?php echo $i; ?>][prenom]">
                            <option value="Federer">Federer</option>
                            <option value="Nadal">Nadal</option>
                            <option value="Djokovic">Djokovic</option>
                            <!-- Ajoutez d'autres options de prénoms ici -->
                        </select>

                        <!-- Ajoutez d'autres champs ici -->
                        <label for="nationalite_<?php echo $i; ?>" class="form-label">Nationalité du Joueur <?php echo $i; ?>:</label>
                        <select class="form-select mb-3" id="nationalite_<?php echo $i; ?>" name="players[<?php echo $i; ?>][nationalite]">
                            <option value="France">France</option>
                            <option value="Espagne">Espagne</option>
                            <option value="Allemagne">Allemagne</option>
                            <!-- Ajoutez d'autres options de nationalité ici -->
                        </select>
                        <label for="age_<?php echo $i; ?>" class="form-label">Age du Joueur <?php echo $i; ?>:</label>
                        <input type="number" class="form-control mb-3" id="age_<?php echo $i; ?>" name="players[<?php echo $i; ?>][age]" placeholder="Age du Joueur <?php echo $i; ?>">
                    </div>
                    <div class="col-md-6">
                        <!-- Ajoutez d'autres champs ici -->
                        <label for="force_<?php echo $i; ?>" class="form-label">Force du Joueur <?php echo $i; ?>:</label>
                        <input type="number" class="form-control mb-3" id="force_<?php echo $i; ?>" name="players[<?php echo $i; ?>][force]" placeholder="Force du Joueur <?php echo $i; ?>">

                        <label for="endurance_<?php echo $i; ?>" class="form-label">Endurance du Joueur <?php echo $i; ?>:</label>
                        <input type="number" class="form-control mb-3" id="endurance_<?php echo $i; ?>" name="players[<?php echo $i; ?>][endurance]" placeholder="Endurance du Joueur <?php echo $i; ?>">

                        <label for="precision_<?php echo $i; ?>" class="form-label">Précision du Joueur <?php echo $i; ?>:</label>
                        <input type="number" class="form-control mb-3" id="precision_<?php echo $i; ?>" name="players[<?php echo $i; ?>][precision]" placeholder="Précision du Joueur <?php echo $i; ?>">
                        <!-- Ajoutez d'autres champs ici -->
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <button type="submit" class="btn btn-primary mt-4">Ajouter des Joueurs</button>
    </form>
</div>

<?php
// Vérifier si des données de joueur ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $playersData = $_POST['players'];

    // Insérer les joueurs dans la base de données en utilisant le modèle
    foreach ($playersData as $player) {
        // Insérer chaque joueur dans la base de données
        // (votre code d'insertion de joueur ici)
    }

    // Rediriger vers la page de gestion des matchs
    header("Location: match.php");
    exit(); // Assure que le script s'arrête après la redirection
}
?>
