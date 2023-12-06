<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Affichage de la base de données</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <?php
    $db = new PDO(
        'mysql:host=localhost;dbname=timeo;charset=utf8',
        'root',
        'root'
    );

    $requete = $db->prepare('SELECT * FROM detail');
    $requete->execute();
    $details = $requete->fetchAll();
    ?>

    <div class="container">
        <h1>Liste des serveurs</h1>

        <?php foreach ($details as $detail): ?>
            <ul>
                <li>
                <div align="center"><strong>Nom du serveur :</strong> <?php echo $detail['det_Nom_Du_Serveur'] ?><br>

                    <!-- Afficher l'image -->
                    <?php if (!empty($detail['det_Image_Du_Serveur'])): ?>
                        <img src="<?php echo $detail['det_Image_Du_Serveur']; ?>" alt="Image du serveur">
                    <?php endif; ?>
                    
                    <br>

                    <strong>Adresse IP du serveur :</strong> <?php echo $detail['det_Adresse_Ip_Du_Serveur'] ?><br>
                    <strong>Description du serveur :</strong> <?php echo $detail['det_Description_Du_Serveur'] ?><br></div>

                    <!-- Afficher les tags -->
                    <strong>Tags :</strong>
                    <?php
                    $requeteTags = $db->prepare('SELECT Tag_Nom_du_tag FROM tag WHERE serveur_id = :serveurId');
                    $requeteTags->bindParam(':serveurId', $detail['ID_Detail']);
                    $requeteTags->execute();
                    $tags = $requeteTags->fetchAll(PDO::FETCH_COLUMN);
                    
                    if (!empty($tags)) {
                        foreach ($tags as $tag) {
                            echo "<span class='tag'>$tag</span> ";
                        }
                    } else {
                        echo "Aucun tag";
                    }
                    ?>
                </li>
            </ul>
        <?php endforeach ?>
    </div>
</body>
</html>
