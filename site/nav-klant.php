   <!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="klant-dashboard.php">home</a></li>
            <li><a href="#"><?php echo $_SESSION['voornaam']?></a></li>
                        <li><?php $timestamp = time();
                echo "", date('d-m-Y', $timestamp); ?>
            </li>
        </ul>

    </nav>
</body>

</html>