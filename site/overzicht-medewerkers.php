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
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>overzicht medewerkers</title>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
  <?php include('nav-admin.php') ?>
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
  <?php
  require 'database.php';

  $sql = "SELECT 
            SUM(CASE WHEN adminID IS NOT NULL THEN 1 ELSE 0 END) AS admin_count,
            SUM(CASE WHEN managerID IS NOT NULL THEN 1 ELSE 0 END) AS manager_count,
            SUM(CASE WHEN regularID IS NOT NULL THEN 1 ELSE 0 END) AS regular_count
        FROM Users
        WHERE adminID IS NOT NULL OR managerID IS NOT NULL OR regularID IS NOT NULL";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Check if there is a row returned
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      // Echo the counts for adminID, managerID, and regularID
      echo "Admin count: " . $row['admin_count'] . "<br>";
      echo "Manager count: " . $row['manager_count'] . "<br>";
      echo "Regular count: " . $row['regular_count'] . "<br>";
    } else {
      echo "No individuals found.";
    }
  } else {
    echo "Error executing the query: " . mysqli_error($conn);
  }

  // Close the database connection

  ?>
  <form action="overzicht-medewerkers.php" method="POST">
    <input id="search" name="search" type="text" placeholder="Type here">
    <input id="submit" type="submit" name="submit" value="Search">
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $sql2 = "SELECT u.*, admin.*, manager.*, regular.*, a.*
    FROM Users u
    LEFT JOIN Administrator admin ON u.adminID = admin.adminID
    LEFT JOIN Manager manager ON u.managerID = manager.managerID
    LEFT JOIN Regular regular ON u.regularID = regular.regularID
    JOIN Adres a ON u.adresID = a.adresID
    WHERE u.voornaam LIKE '%$search%'";

    $result2 = mysqli_query($conn, $sql2);
    $searchusers = mysqli_fetch_all($result2, MYSQLI_ASSOC);


  ?>

    <table>
      <thead>
        <th>id</th>
        <th>voornaam</th>
        <th>tussenvoegsels</th>
        <th>achternaam</th>
        <th>gebruikersnaam</th>
        <th>geslacht</th>
        <th>toevoegdatum</th>
        <th>email</th>
        <th>huisnummer</th>
        <th>telefoonnummer</th>
        <th>mobielnummer</th>

      </thead>
      <?php foreach ($searchusers as $user) : ?>
        <tbody>
          <td><?php echo $user["ID"] ?></td>
          <td><?php echo $user["voornaam"] ?></td>
          <td><?php echo $user["tussenvoegsels"] ?></td>
          <td><?php echo $user["achternaam"] ?></td>
          <td><?php echo $user["gebruikersnaam"] ?></td>
          <td><?php echo $user["geslacht"] ?></td>
          <td><?php echo $user["toevoegdatum"] ?></td>
          <td><?php echo $user["email"] ?></td>
          <td><?php echo $user["huisnummer"] ?></td>
          <td><?php echo $user["telefoonnummer"] ?></td>
          <td><?php echo $user["mobielnummer"] ?></td>

        </tbody>
      <?php endforeach; ?>

    </table>
  <?php
  }
  if (empty($_POST['submit'])) {
  ?>
    <?php foreach ($all_users as $user) : ?>
      <table class="list">
        <tr>
          <th></th>
          <th></th>
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
          <td>Huisnummer</td>
          <td><?php echo $user["huisnummer"]; ?></td>
        </tr>
        <tr>
          <td>telefoonummer</td>
          <td><?php echo $user["telefoonnummer"] ?></td>
        </tr>
        <tr>
          <td>mobielnummer</td>
          <td><?php echo $user["mobielnummer"] ?></td>
        </tr>
      </table>
  <?php endforeach;
  } ?>


</body>

</html>