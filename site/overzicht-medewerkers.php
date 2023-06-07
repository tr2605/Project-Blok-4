<?php
require 'database.php';
$sql = "SELECT * FROM Users";
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
<?php include('nav.php')?>
<?php foreach ($all_users as $user) : ?><ul>
                    <li><?php echo $user["voornaam"] ?></li>
                    <li><?php echo $user["tussenvoegsels"] ?></li>
                    <li><?php echo $user["achternaam"] ?></li>
                    <li><?php echo $user["email"] ?></li>
                    <li><?php echo $user["role"] ?></li>
                </ul>
        </div>
    </div>
    <!-- <a href="sams.html" class="newanchor"></a> -->
<?php endforeach; ?>
</body>
</html>