<?php
    $lines = file('config.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
    
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }


    $host = getenv('DB_HOST');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASS');
    $dbname = getenv('DB_NAME');
    

    $conexion = mysqli_connect("$host", "$username", "$password", "$dbname");
    $consulta = "INSERT INTO `clientes`(`nombre`, `apellido`, `correo`, `contraseña`) VALUES ('$name','$lastName','$email','$password')";
    $resultado = mysqli_query($conexion, $consulta);
        if ($resultado){
            include("cerrar.php");
            header("Location: ../index.html");
            exit();
        }
        else{
            echo "Error al registrar";
        }
?>