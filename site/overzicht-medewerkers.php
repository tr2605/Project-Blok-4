<?php
require 'database.php';
$sql = "SELECT *
FROM Users u
LEFT JOIN Administrator admin ON u.adminID = admin.adminID
LEFT JOIN Manager manager ON u.managerID = manager.managerID
LEFT JOIN Regular regular ON u.regularID = regular.regularID
JOIN Adres a ON u.adresID = a.adresID";
$result = mysqli_query($conn, $sql);
$all_users = mysqli_fetch_all($result, MYSQLI_ASSOC);
session_start();
if (!isset($_SESSION['isIngelogd'])) {
header("location: login.php");

}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>overzicht medewerkers</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

</head>
<body>
<?php include('nav-admin.php')?>
<?php foreach ($all_users as $user) : ?>
    <table class="list">
      <tr>
        <th>type</th>
        <th>gebruiker</th>
      </tr>
      <tr>
        <td>Voornaam</td>
        <td><?php echo $user["voornaam"] ?></td>
      </tr>
      <tr>
        <td>Tussenvoegsels</td>
        <td><?php echo $user["tussenvoegsels"] ?></td>
      </tr>
      <tr>
        <td>Achternaam</td>
        <td><?php echo $user["achternaam"] ?></td>
      </tr>
      <tr>
        <td>gebruikersnaam</td>
        <td><?php echo $user["gebruikersnaam"] ?></td>
      </tr>
      <tr>
        <td>geslacht</td>
        <td><?php echo $user["geslacht"] ?></td>
      </tr>
      <tr>
        <td>toevoegdatum</td>
        <td><?php echo $user["toevoegdatum"] ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $user["email"] ?></td>
      </tr>
      <tr>
        <td>Straat</td>
        <td><?php echo $user["straat"] ?></td>
      </tr>
      <tr>
        <td>Omschrijving</td>
        <td><?php echo $user["omschrijving"]; ?></td>
      </tr>
      <tr>
        <td>Huisnummer</td>
        <td><?php echo $user["huisnummer"]; ?></td>
      </tr>
      <tr>
        <td>Postcode</td>
        <td><?php echo $user["postcode"]; ?></td>
      </tr>
      <tr>
        <td>Plaats</td>
        <td><?php echo $user["plaats"]; ?></td>
      </tr>
      <tr>
        <td>Land</td>
        <td><?php echo $user["land"]; ?></td>
      </tr>
    </table>
  <?php endforeach; ?>
</body>
</html>