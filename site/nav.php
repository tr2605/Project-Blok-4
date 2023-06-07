<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="<?php if (isset($_SESSION['role'])) {
                                $data = $_SESSION['role'];
                                if ($data == 'administrator') {
                                    echo ("admin-dashboard.php");
                                } else if ($data == 'manager') {
                                    echo ("manager-dashboard.php");
                                } else if ($data == 'manager'){
                                    echo ("klant-dashboard.php");
                                }
                                else{
                                    echo ("hoofdpagina.php");
                                }
                            }
                            ?>">home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><?php $timestamp = time();
                echo "", date('d-m-Y', $timestamp); ?>
            </li>
        </ul>

    </nav>
</body>

</html>