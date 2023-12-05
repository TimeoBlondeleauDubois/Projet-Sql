<?php

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Vérifiez si les données POST existent
    if (isset($_POST['nomServeur']) && isset($_POST['ipServeur']) && isset($_POST['descServeur'])) {

        // Connexion à la base de données
        try {
            $db = new PDO(
                'mysql:host=localhost;dbname=timeo;charset=utf8',
                'root',
                'root'
            );
            // Définissez le mode d'erreur de PDO sur Exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En cas d'échec de la connexion, affichez une erreur
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }

        // Préparez la requête SQL d'insertion pour les détails du serveur
        $requeteServeur = $db->prepare('INSERT INTO detail (det_Nom_Du_Serveur, det_Adresse_Ip_Du_Serveur, det_Description_Du_Serveur) VALUES(:nomServeur, :ipServeur, :descServeur)');

        // Exécutez la requête avec les valeurs fournies via le formulaire POST
        try {
            $requeteServeur->execute([
                'nomServeur' => $_POST['nomServeur'],
                'ipServeur' => $_POST['ipServeur'],
                'descServeur' => $_POST['descServeur'],
            ]);

            // Récupérez l'ID de la dernière insertion (peut être utile)
            $lastInsertId = $db->lastInsertId();

            echo "Enregistrement des détails du serveur réussi. ID du serveur : $lastInsertId";
        } catch (PDOException $e) {
            // En cas d'échec de l'insertion, affichez une erreur
            die("Erreur d'insertion des détails du serveur dans la base de données: " . $e->getMessage());
        }

        // Récupérez les tags du formulaire
        $tags = [];

        // Vérifiez si au moins un tag a été coché
        if (!empty($_POST['tags'])) {
            // Ajoutez tous les tags cochés
            $tags = $_POST['tags'];

                        // Préparez la requête SQL d'insertion pour les tags
            $requeteTag = $db->prepare('INSERT INTO tag (Tag_Nom_du_tag, ID_Tag, serveur_id) VALUES(:tag, NULL, :serveurId)');

            // Exécutez la requête pour chaque tag
            foreach ($tags as $tag) {
                try {
                    $requeteTag->execute(['tag' => $tag, 'serveurId' => $lastInsertId]);
                    echo "Enregistrement du tag réussi : $tag";
                } catch (PDOException $e) {
                    // En cas d'échec de l'insertion du tag, affichez une erreur
                    die("Erreur d'insertion du tag dans la base de données: " . $e->getMessage());
                }
            }
        }

    } else {
        // Si des données POST sont manquantes, affichez un message d'erreur
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}

?>
