<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>Création du serveur Minecraft</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
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
    <input type="file" id="imgServeur" name="imgServeur" accept="image/*" required/><br/>

    <br>

    <fieldset>
    <legend>Choisissez vos tags : (par défaut vanilla et prenium) </legend>
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
            <nav>
                <ul>
                    <li class="deroulant"><a href="#">Version ⇩ &ensp;</a>
                        <ul class="sous">
                            <li><input type="checkbox" id="Version.1.15" name="tags[]" value="Version.1.15" /><label for="Version">1.15.X</label> </li>
                            <li><input type="checkbox" id="Version.1.16" name="tags[]" value="Version.1.16" /><label for="Version">1.16.X</label></li>
                            <li><input type="checkbox" id="Version.1.17" name="tags[]" value="Version.1.17" /><label for="Version">1.17.X</label></li>
                            <li><input type="checkbox" id="Version.1.18" name="tags[]" value="Version.1.18" /><label for="Version">1.18.X</label></li>
                            <li><input type="checkbox" id="Version.1.19" name="tags[]" value="Version.1.19" /><label for="Version">1.19.X</label></li>
                            <li><input type="checkbox" id="Version.1.20" name="tags[]" value="Version.1.20" /><label for="Version">1.20.X</label></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </fieldset>

<button type="submit">Valider la création de votre serveur</button>
</form>
</body>
</html>