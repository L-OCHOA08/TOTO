<?php 
    $userLog = $_POST['email'];
    $userPassw = $_POST['passw'];
    session_start();
    $_SESSION['email'] = $userLog;

    $conexion = mysqli_connect("localhost", "root", "", "winco");

    $consulta="SELECT * FROM clientes WHERE nombre='$userLog' or correo='$userLog' and contraseña='$userPassw'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        header("location:index.html");
    } else {
        ?>
        <div class="error-content">
            <h1>CORREO O CONTRASEÑA INCORRECTA.</h1>
            <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#ddd"><path d="M479.79-288q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5ZM444-432h72v-240h-72v240Zm36.28 336Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>
        </div>
        <?php
        include('login.php');
        ?>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>