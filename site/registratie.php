<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
<div class="container">
    <div class="main">
        <div class="signup">
            <h2>User registratie</h2>
            <form action="registratie-compleet.php" method="post">
                <div class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" name="voornaam" id="voornaam">
                </div>
                <div class="form-group">
                    <label for="tussenvoegsels">tussenvoegsels</label>
                    <input type="text" name="tussenvoegsels" id="tussenvoegsels">
                </div>
                <div class="form-group">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" name="achternaam" id="achternaam">
                </div>

                <div class="form-group">
                    <label for="geslacht">Man</label>
                    <input type="radio" name="geslacht" id="geslacht" value="Man">
                </div>
                <div class="form-group">
                    <label for="geslacht">Vrouw</label>
                    <input type="radio" name="geslacht" id="geslacht" value="Vrouw">
                </div>
                <div class="form-group">
                    <label for="geslacht">Anders</label>
                    <input type="radio" name="geslacht" id="geslacht" value="Anders">
                </div>
                <div class="form-group">
                    <label for="geslacht">Wil ik niet zeggen</label>
                    <input type="radio" name="geslacht" id="geslacht" value="PrivÃ©">
                </div>

                <div class="form-group">
                    <label for="username">gebruikersnaam</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="wachtwoord">wachtwoord</label>
                    <input type="password" name="wachtwoord" id="wachtwoord">
                </div>
                <div class="form-group">
                    <label for="omschrijving">omschrijving</label>
                    <input type="text" name="omschrijving" id="omschrijving">
                </div>

                <div class="form-group">
                    <label for="straat">straat</label>
                    <input type="text" name="straat" id="straat">
                </div>
                <div class="form-group">
                    <label for="huisnummer">huisnummer</label>
                    <input type="text" name="huisnummer" id="huisnummer">
                </div>

                <div class="form-group">
                    <label for="postcode">postcode</label>
                    <input type="text" name="postcode" id="postcode">
                </div>
                <div class="form-group">
                    <label for="plaats">plaats</label>
                    <input type="text" name="plaats" id="plaats">
                </div>
                <div class="form-group">
                    <label for="land">land</label>
                    <input type="text" name="land" id="land">
                </div>
                <div class="form-group">
                    <label for="telefoonnummer">telefoonnummer</label>
                    <input type="text" name="telefoonnummer" id="telefoonnummer">
                </div>

                <div class="form-group">
                    <label for="mobielnummer">mobielnummer</label>
                    <input type="text" name="mobielnummer" id="mobielnummer">
                </div>
                <div class="form-group">
                    <label for="notitie">notitie</label>
                    <input type="text" name="notitie" id="notitie">
                </div>
                <div class="form-group">
                    <label for="toevoegdatum">toevoegdatum</label>
                    <input type="text" name="toevoegdatum" id="toevoegdatum">
                </div>
                <div class="form-group">
                    <label for="role">Administrator</label>
                    <input type="radio" name="role" id="role" value="Administrator">
                </div>
                <div class="form-group">
                    <label for="role">Manager</label>
                    <input type="radio" name="role" id="role" value="Manager">
                </div>
                <div class="form-group">
                    <label for="role">Klant</label>
                    <input type="radio" name="role" id="role" value="Regular">
                </div>
                
                <button type="submit">Verzend</button>
</div>
</body>

</html>