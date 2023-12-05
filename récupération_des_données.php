<?php
$db = new PDO(
    'mysql:host=localhost;dbname=timeo;charset=utf8',
    'root',
    'root'
);

$requete = $db->prepare('SELECT * FROM detail');
$requete->execute();
$detail = $requete->fetchAll();
?>

<h1>Liste des personnes : </h1>

<?php foreach ($detail as $detail): ?>
    <ul>
        <li><?php echo $detail['det_Nom_Du_Serveur'] . ' ' . $detail['det_Adresse_Ip_Du_Serveur'] ?></li>
    </ul>
<?php endforeach ?>