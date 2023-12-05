<?php
// PHP1: verification.php


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['nomServeur']) && isset($_POST['ipServeur']) && isset($_POST['descServeur'])) {


        try {
            $db = new PDO(
                'mysql:host=localhost;dbname=timeo;charset=utf8',
                'root',
                'root'
            );

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }


        $requeteServeur = $db->prepare('INSERT INTO detail (det_Nom_Du_Serveur, det_Adresse_Ip_Du_Serveur, det_Description_Du_Serveur) VALUES(:nomServeur, :ipServeur, :descServeur)');


        $requeteServeur->execute([
            'nomServeur' => $_POST['nomServeur'],
            'ipServeur' => $_POST['ipServeur'],
            'descServeur' => $_POST['descServeur'],
        ]);

        echo "Enregistrement des détails du serveur réussi.";
        
        // Récupérez l'ID du dernier enregistrement
        $lastInsertId = $db->lastInsertId();



        // Récupérez les tags du formulaire
        $tags = !empty($_POST['tags']) ? $_POST['tags'] : [];

        // Si des tags sont sélectionnés, insérez-les dans la table tag
        if (!empty($tags)) {
            $requeteTag = $db->prepare('INSERT INTO tag (Tag_Nom_du_tag, serveur_id) VALUES(:tag, :serveurId)');
            foreach ($tags as $tag) {

                $requeteTag->execute(['tag' => $tag, 'serveurId' => $lastInsertId]);
                
            }
            echo "Enregistrement des tags réussi.";
        } else {
            echo "Aucun tag sélectionné.";
        }

    } else {

        echo "Tous les champs du formulaire doivent être remplis.";
    }
}

?>

<?php
