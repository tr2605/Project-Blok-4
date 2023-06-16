<?php
require 'database.php';
$sql = "SELECT *
FROM Users u
LEFT JOIN Administrator admin ON u.adminID = admin.adminID
LEFT JOIN Manager manager ON u.managerID = manager.managerID
LEFT JOIN Regular regular ON u.regularID = regular.regularID
JOIN Adres a ON u.adresID = a.adresID";
$result = mysqli_query($conn, $sql);
$all_adres = mysqli_fetch_all($result, MYSQLI_ASSOC);
session_start();
if (!isset($_SESSION['isIngelogd'])) {
    header("location: login.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>overzicht adressen</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
<?php include('nav-manager.php') ?>
<?php
require 'database.php';

$sql = "SELECT *
FROM Users
WHERE adminID IS NOT NULL OR managerID IS NOT NULL OR regularID IS NOT NULL";

$result = mysqli_query($conn, $sql);

if ($result) {
    // Check if there are rows returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and echo the individual's details
        while ($row = mysqli_fetch_assoc($result)) {
            // Echo the individual's details here
            echo "Individual ID: " . $row['ID'] . "<br>";
            echo "Name: " . $row['voornaam'] . "<br>";
            echo "Role: ";
            
            // Determine the filled ID (adminID, managerID, regularID) for the individual
            if (!empty($row['adminID'])) {
                echo "Admin<br>";
            } elseif (!empty($row['managerID'])) {
                echo "Manager<br>";
            } elseif (!empty($row['regularID'])) {
                echo "Regular<br>";
            }
            
            echo "<br>";
        }
    } else {
        echo "No individuals found.";
    }
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
  <?php foreach ($all_adres as $adres) : ?>
    <table class="list">
      <tr>
        <th></th>
        <th>  </th>
      </tr>
      <tr>
        <td>Voornaam</td>
        <td><?php echo $adres["voornaam"] ?></td>
      </tr>
      <tr>
        <td>Tussenvoegsels</td>
        <td><?php echo $adres["tussenvoegsels"] ?></td>
      </tr>
      <tr>
        <td>Achternaam</td>
        <td><?php echo $adres["achternaam"] ?></td>
      </tr>
      <tr>
        <td>telefoonummer</td>
        <td><?php echo $adres["telefoonnummer"] ?></td>
      </tr>
      <tr>
        <td>mobielnummer</td>
        <td><?php echo $adres["mobielnummer"] ?></td>
      </tr>
      <tr>
        <td>toevoegdatum</td>
        <td><?php echo $adres["toevoegdatum"] ?></td>
      </tr>
      <tr>
        <td>Straat</td>
        <td><?php echo $adres["straat"] ?></td>
      </tr>
      <tr>
        <td>Omschrijving</td>
        <td><?php echo $adres["omschrijving"]; ?></td>
      </tr>
      <tr>
        <td>Huisnummer</td>
        <td><?php echo $adres["huisnummer"]; ?></td>
      </tr>
      <tr>
        <td>Postcode</td>
        <td><?php echo $adres["postcode"]; ?></td>
      </tr>
      <tr>
        <td>Plaats</td>
        <td><?php echo $adres["plaats"]; ?></td>
      </tr>
      <tr>
        <td>Land</td>
        <td><?php echo $adres["land"]; ?></td>
      </tr>
    </table>
  <?php endforeach; ?>
</body>
</html>