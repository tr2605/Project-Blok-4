<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="hoofdpagina.php">home</a></li>
            <li><a href="adres-toevoegen.php">adres toevoegen</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><?php $timestamp = time();
                echo "", date('d-m-Y', $timestamp); ?>
            </li>
        </ul>

    </nav>
</body>

</html>