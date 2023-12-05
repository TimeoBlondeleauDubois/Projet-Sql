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

<h1>Liste des serveurs </h1>

<?php foreach ($details as $detail): ?>
    <ul>
        <li>
            <strong>Nom du serveur :</strong> <?php echo $detail['det_Nom_Du_Serveur'] ?><br>
            <strong>Adresse IP du serveur :</strong> <?php echo $detail['det_Adresse_Ip_Du_Serveur'] ?><br>
            <strong>Description du serveur :</strong> <?php echo $detail['det_Description_Du_Serveur'] ?><br>

            <!-- Afficher les tags -->
            <strong>Tags :</strong>
            <?php
            // Vérifiez si des tags existent
            if (!empty($detail['det_Tags'])) {
                $tags = explode(', ', $detail['det_Tags']);
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
