<?php
// PHP1: verification.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['nomServeur']) && isset($_POST['ipServeur']) && isset($_POST['descServeur'])) {
        
        $imagePath = 'uploads/';  // Dossier où vous souhaitez stocker les images

        // Vérifiez si un fichier a été téléchargé
        if (isset($_FILES['imgServeur']) && $_FILES['imgServeur']['error'] === UPLOAD_ERR_OK) {
            $imageName = $_FILES['imgServeur']['name'];
            $imageTmp = $_FILES['imgServeur']['tmp_name'];
            $imageDestination = $imagePath . $imageName;
    
            // Assurez-vous que le fichier est bien un fichier image
            $imageFileType = strtolower(pathinfo($imageDestination, PATHINFO_EXTENSION));
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                die("Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
            }
    
            // Déplacez le fichier téléchargé vers le dossier de destination
            if (!move_uploaded_file($imageTmp, $imageDestination)) {
                die("Erreur lors de l'envoi du fichier.");
            }
        } else {
            die("Aucun fichier image téléchargé.");
        }

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

        $requeteServeur = $db->prepare('INSERT INTO detail (det_Nom_Du_Serveur, det_Adresse_Ip_Du_Serveur, det_Description_Du_Serveur, det_Image_Du_Serveur, det_version) VALUES(:nomServeur, :ipServeur, :descServeur, :imagePath, :version)');

// ...

$version = isset($_POST['Version_Minecraft_du_serveur']) ? $_POST['Version_Minecraft_du_serveur'] : null;

$requeteServeur = $db->prepare('INSERT INTO detail (det_Nom_Du_Serveur, det_Adresse_Ip_Du_Serveur, det_Description_Du_Serveur, det_Image_Du_Serveur, det_version) VALUES(:nomServeur, :ipServeur, :descServeur, :imagePath, :version)');

$requeteServeur->execute([
    'nomServeur' => $_POST['nomServeur'],
    'ipServeur' => $_POST['ipServeur'],
    'descServeur' => $_POST['descServeur'],
    'imagePath' => $imageDestination,
    'version' => $version,
]);

// ...


        echo "Enregistrement des détails du serveur réussi.";
        
        // Récupérez l'ID du dernier enregistrement
        $lastInsertId = $db->lastInsertId();

        // Récupérez les tags du formulaire
        $tags = !empty($_POST['tags']) ? $_POST['tags'] : [];

        // Si des tags sont sélectionnés, insérez-les dans la table tag
        if (!empty($tags)) {
            $requeteTag = $db->prepare('INSERT INTO tag (Tag_Nom_du_tag, serveur_id) VALUES(:tag, :serveurId)');
            foreach ($tags as $tag) {
                $requeteTag->execute(['tag' => htmlspecialchars($tag), 'serveurId' => $lastInsertId]);
            }
            echo "Enregistrement des tags réussi.";
        } else {
            echo "Aucun tag sélectionné.";
        }

        // Fermez la connexion à la base de données
        $db = null;

    } else {

        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
?>