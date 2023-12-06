<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Projet 2</title>

    <style>
      .button {
        background-color: #1c87c9;
        border: none;
        color: white;
        padding: 20px 34px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>

    <link rel="stylesheet" type="text/css" href="style3.css">
  </head>
  <body>
    
  <div align="center"><a href="creer_serveur.php" class="button">Créer votre serveur minecraft</a></div>

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

<br>

    <!-- input tag -->
    <input id="rechercher" onkeyup="search_server()" type="text"
        name="rechercher" placeholder="rechercher un serveur">

    <!-- ordered list -->
    <ol id='list'>
        <li class="minecraft">serveur 1</li>
        <li class="minecraft">serveur 2</li>
        <li class="minecraft">serveur 3</li>
        <li class="minecraft">serveur 4</li>
        <li class="minecraft">serveur 5</li>
        <li class="minecraft">serveur 6</li>
        <li class="minecraft">serveur 7</li>
        <li class="minecraft">serveur 8</li>
        <li class="minecraft">serveur 9</li>
        <li class="minecraft">serveur 10</li>
        <li class="minecraft">serveur 11</li>
    </ol>
      

    <!-- linking javascript -->
    <script src="./BarreDeRecherche.js"></script>
  </body>
</html>