<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Création du serveur Minecraft</title>
</head>
<body>

<form method="POST" action="verification.php" enctype="multipart/form-data">

    <label for="nomServeur">Nom du serveur :</label>
    <input type="text" id="nomServeur" name="nomServeur" required/><br/>

    <label for="ipServeur">Adresse IP du serveur :</label>
    <input type="text" id="ipServeur" name="ipServeur" required/><br/>

    <label for="descServeur">Description du serveur :</label>
    <input type="text" id="descServeur" name="descServeur" required/><br/>

    <label for="imgServeur">Veuillez insérer l'image que vous voulez mettre :</label>
    <input type="file" id="imgServeur" name="imgServeur"/><br/>

    <br>

<fieldset>
    <legend>Choisissez vos tags : (par défaut vanilla et prenium) </legend>
    <div>
        <input type="checkbox" id="Version_Minecraft_du_serveur" name="tags[]" value="Version_Minecraft_du_serveur" />
        <label for="Version_Minecraft_du_serveur">Version Minecraft du serveur</label>
    </div>
    <div>
        <input type="checkbox" id="Moddee" name="tags[]" value="Moddee" />
        <label for="Moddee">Moddee</label>
    </div>
    <div>
        <input type="checkbox" id="Vanilla" name="tags[]" value="Vanilla" />
        <label for="Vanilla">Vanilla</label>
    </div>
    <div>
        <input type="checkbox" id="Crack" name="tags[]" value="Crack" />
        <label for="Crack">Crack</label>
    </div>
    <div>
        <input type="checkbox" id="Prenium" name="tags[]" value="Prenium" />
        <label for="Prenium">Prenium</label>
    </div>
    <div>
        <input type="checkbox" id="Rp" name="tags[]" value="Rp" />
        <label for="Rp">Rp</label>
    </div>
    <div>
        <input type="checkbox" id="Semi_Rp" name="tags[]" value="Semi_Rp" />
        <label for="Semi_Rp">Semi-Rp</label>
    </div>
    <div>
        <input type="checkbox" id="Mini_jeux" name="tags[]" value="Mini_jeux" />
        <label for="Mini_jeux">Mini-jeux</label>
    </div>
    <div>
        <input type="checkbox" id="Plot_Build" name="tags[]" value="Plot_Build" />
        <label for="Plot_Build">Plot-Build</label>
    </div>
    <div>
        <input type="checkbox" id="SMP" name="tags[]" value="SMP" />
        <label for="SMP">SMP (Survival MultiPlayer)</label>
    </div>
  <div>
      <input type="checkbox" id="Version_Minecraft_du_serveur" name="tags[]" value="Version_Minecraft_du_serveur" />
      <label for="Version_Minecraft_du_serveur">Version Minecraft du serveur</label>
  </div>
</fieldset>

    <button type="submit">Valider la création de votre serveur</button>
</form>
</body>
</html>
