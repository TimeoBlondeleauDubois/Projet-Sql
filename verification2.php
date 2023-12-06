<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>résultat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
      <?php
      $db = new PDO(
          'mysql:host=localhost;dbname=timeo;charset=utf8',
          'root',
          'root'
      );

      // Vérifie si le formulaire a été soumis
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Récupère le nom du serveur à partir du formulaire
          $nomServeur = $_POST['nomServeur'];

          // Requête de sélection dans la base de données
          $requeteServeur = $db->prepare("SELECT * FROM detail WHERE det_Nom_Du_Serveur LIKE :timeo");
          $nomServeurParam = $nomServeur . '%'; // Ajoutez le % ici
          $requeteServeur->bindParam(':timeo', $nomServeurParam);
          $requeteServeur->execute();

          // Récupération des résultats
          $resultats = $requeteServeur->fetchAll(PDO::FETCH_ASSOC);

          // Affichage des résultats
          foreach ($resultats as $detail) {
              echo "<div align='center'><strong>Nom du serveur :</strong> " . $detail['det_Nom_Du_Serveur'] . "<br>";

              // Afficher l'image
              if (!empty($detail['det_Image_Du_Serveur'])) {
                  echo "<img src='" . $detail['det_Image_Du_Serveur'] . "' alt='Image du serveur'><br>";
              }

              echo "<strong>Adresse IP du serveur :</strong> " . $detail['det_Adresse_Ip_Du_Serveur'] . "<br>";
              echo "<strong>Description du serveur :</strong> " . $detail['det_Description_Du_Serveur'] . "<br></div>";

              // Afficher les tags
              echo "<strong>Tags :</strong>";
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
          }
      }
      ?>
    </div>
  </body>
</html>
