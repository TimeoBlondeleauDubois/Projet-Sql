
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

<h1>Liste des serveurs</h1>

<?php foreach ($details as $detail): ?>
    <ul>
        <li>
            <strong>Nom du serveur :</strong> <?php echo $detail['det_Nom_Du_Serveur'] ?><br>
            <strong>Adresse IP du serveur :</strong> <?php echo $detail['det_Adresse_Ip_Du_Serveur'] ?><br>
            <strong>Description du serveur :</strong> <?php echo $detail['det_Description_Du_Serveur'] ?><br>

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
