<?php
$db = new PDO(
    'mysql:host=localhost;dbname=timeo;charset=utf8',
    'root',
    'root'
);

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère le nom, l'adresse IP du serveur et les tags à partir du formulaire
    $nomServeur = $_POST['nomServeur'];
    $ipServeur = $_POST['ipServeur'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : array();

    // Requête de sélection dans la base de données
    $requeteServeur = $db->prepare("
        SELECT d.*, GROUP_CONCAT(t.Tag_Nom_du_tag) as tags
        FROM detail d
        LEFT JOIN tag t ON d.ID_Detail = t.serveur_id
        WHERE d.det_Nom_Du_Serveur LIKE :nomServeur
        AND d.det_Adresse_Ip_Du_Serveur LIKE :ipServeur
        AND t.Tag_Nom_du_tag IN ('" . implode("','", $tags) . "') 
        GROUP BY d.ID_Detail
    ");

    $nomServeurParam = '%' . $nomServeur . '%';
    $ipServeurParam = '%' . $ipServeur . '%';
    $requeteServeur->bindParam(':nomServeur', $nomServeurParam);
    $requeteServeur->bindParam(':ipServeur', $ipServeurParam);
    $requeteServeur->execute();

    // Récupération des résultats
    $resultats = $requeteServeur->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des résultats
    foreach ($resultats as $detail) {
        echo "<div align='center'><strong>Nom du serveur :</strong> " . $detail['det_Nom_Du_Serveur'] . "<br>";

        // Afficher l'image
        if (!empty($detail['det_Image_Du_Serveur'])) {
            echo "<img src='" . $detail['det_Image_Du_Serveur'] . "' alt='Image du serveur' style='max-width: 100%; max-height: 300px; height: auto; margin-top: 10px; border-radius: 8px;'><br>";
        }

        echo "<strong>Adresse IP du serveur :</strong> " . $detail['det_Adresse_Ip_Du_Serveur'] . "<br>";
        echo "<strong>Description du serveur :</strong> " . $detail['det_Description_Du_Serveur'] . "<br>";

        // Afficher les tags
        echo "<strong>Tags :</strong>";
        echo "<span class='tag'>" . $detail['tags'] . "</span> ";

        echo "</div><br>";
      }
}
?>
