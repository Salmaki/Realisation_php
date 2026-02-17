<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Livre d'or</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #fff;
            padding: 20px;
        }

        .container {
            width: 500px;
            margin: 0 auto;
            background-color: #FFD700;
            padding: 20px;
            border: 1px solid #000;
        }

        fieldset {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #FFD700;
        }

        legend {
            font-weight: bold;
            padding: 0 5px;
            background-color: #FFD700;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 95%;
            padding: 5px;
            border: 1px solid #333;
        }

        textarea {
            height: 80px;
            font-family: sans-serif;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 5px 15px;
            cursor: pointer;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
            margin-top: 10px;
        }

        td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 14px;
        }

        .header-row {
            background-color: #DAA520;
            font-weight: bold;
        }

        .msg-row {
            background-color: #FFFFE0;
        }

        h3 {
            margin: 0;
            padding-bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <form method="post" action="">
            <fieldset>
                <legend>Donnez votre avis sur PHP !</legend>

                <label>Nom :</label>
                <input type="text" name="nom" required>

                <label>Mail :</label>
                <input type="email" name="mail" required>

                <label>Vos commentaires sur le site :</label>
                <textarea name="commentaire" required></textarea>

                <br>
                <input type="submit" name="btn_envoyer" value="Envoyer">
                <input type="submit" name="btn_afficher" value="Afficher les avis">
            </fieldset>
        </form>

        <?php
        $fichier = "avis.txt";

        if (isset($_POST['btn_envoyer'])) {
            if (!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['commentaire'])) {
                $nom = $_POST['nom'];
                $mail = $_POST['mail'];
                $commentaire = str_replace(array("\r", "\n", "|", "<", ">"), ' ', $_POST['commentaire']);
                $date = date("d/m/y H:i:s");

                $ligne = "<<$nom|$mail|$date|$commentaire>>" . PHP_EOL;
                file_put_contents($fichier, $ligne, FILE_APPEND);
            }
        }

        if (file_exists($fichier)) {
            echo "<h3>Liste des avis</h3>";

            $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $lignes = array_reverse($lignes);
            $max = min(5, count($lignes));

            echo "<table>";
            for ($i = 0; $i < $max; $i++) {
                $ligne_clean = trim($lignes[$i]);

                if (substr($ligne_clean, 0, 2) == "<<" && substr($ligne_clean, -2) == ">>") {

                    $contenu = substr($ligne_clean, 2, -2);
                    $infos = explode("|", $contenu);

                    if (count($infos) >= 4) {
                        $num = count($lignes) - $i;
                        echo "<tr class='header-row'>";
                        echo "<td>$num : de {$infos[0]} ({$infos[1]})</td>";
                        echo "<td style='text-align:right; width:150px;'>le : {$infos[2]}</td>";
                        echo "</tr>";
                        echo "<tr class='msg-row'>";
                        echo "<td colspan='2'>{$infos[3]}</td>";
                        echo "</tr>";
                    }
                }
            }
            echo "</table>";
        }
        ?>
    </div>

</body>

</html>