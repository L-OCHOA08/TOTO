<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="register.css">
    <title>WINCO</title>
</head>
<body>
<header>
        <!--  ---------------BUSCADOR EN COMPUTADORA DE ESCRITORIO--------------- -->
        <a href="../index.html" class="logo--conteiner">
            <img class="logo" src="TOTO/components/icons/WINCO.png" alt="">
        </a>
        <div id="searcher--desktop">
            <div class="searcher--conteiner--desktop">
                <i class="bi bi-search searcher--icon"></i>
                <input class="searcher--desktop" type="text" placeholder="¿Que estás buscando?">
            </div>
        </div>

        <button class="abrir--menu"><i class="bi bi-list"></i></button>
        <nav id="nav">
            <button class="cerrar--menu"><i class="bi bi-x"></i></button>
            <ul>
                <li>
                    <a class="nav--item" href="TOTO/index.html">Inicio</a>
                </li>

                <li>
                    <a class="nav--item" href="#">Sobre nosotros</a>
                </li>

                <li>
                    <a class="nav--item" href="#">Contacto</a>
                </li>

                <li class="submenu">
                    <a class="nav--item nav--icon" href="../carrito/carrito.html">
                        <i class="bi bi-cart"></i>
                        <p class="nav--icon--p">Carrito</p>
                    </a>
                    <div id="carrito">
                                    
                        <table id="lista-carrito" class="u-full-width">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>

                        <div class="botones--table">
                            <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                            <a href="TOTO/carrito/carrito.html" class="boton--ir--carrito">Ir al carrito</a>
                        </div>
                </div>
                </li>

                <li>
                    <a class="nav--item nav--icon" href="#">
                        <i class="bi bi-person"></i>
                        <p class="nav--icon--p">Usuario</p>
                    </a>
                </li>

            </ul>
        </nav>
    </header>

<form action="" method="post">
        <h1>Registrarme</h1>
        <div class="alert">
        <?php
            if (isset($_POST['name'])) {
                $name = $_REQUEST['name'];
                $lastName = $_REQUEST['apellido'];
                $email = $_REQUEST['email'];
                $password = $_REQUEST['passw'];
                $passwordC = $_REQUEST['passwC'];

                    $campos = array();

                    if ($name == "") {
                        array_push($campos, "Necesitas agregar tu nombre para continuar.");
                    }

                    if ($email == "" || strpos($email, "@") === false) {
                        array_push($campos, "Ingrese un email válido.");
                    }

                    if ($password == "" || strlen($password) < 6 || strpos($password, "@") === false) {
                        array_push($campos, 'Su contraseña debe tener al menos 6 carácteres y un signo especial. Ejemplo: "@".');
                    }

                    if ($passwordC == "" || $passwordC != $password) {
                        array_push($campos, "Sus contraseñas no coinciden.");
                    }

                    if (count($campos) > 0) {
                        echo "<div class='error' style='height: auto; background: #d90000; padding: .5rem; width: 80%; border-radius: 20px; text-align: center; margin-bottom: 1rem; display: flex; flex-direction: column; align-items: center; justify-content: center; margin:auto; margin-bottom: 1rem;'>";
                        for ($i = 0; $i < count($campos); $i++) {
                            echo "<li style='list-style: none; color: #fff';>" . $campos[$i];
                        }
                        echo "</div>";
                    } else {
                        include("conexion.php");
                    }
                }
            ?>
        </div>
        <div class="input-form">
            <div class="input-content">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="input-content">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido">
            </div>
            <div class="input-content">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="input-content">
                <label for="passw">Contraseña</label>
                <input type="password" name="passw" id="passw">
            </div>

            <div class="input-content">
                <label for="passwC">Confirmar Contraseña</label>
                <input type="password" name="passwC" id="passwC">
            </div>
            <div class="consulta_login">
                <p class="consulta_login_p">¿Ya tenés un usuario? <a href="login.php" class="consulta_login_a">Iniciar Sesión</a></p>
            </div>
            <input id="ingresar" type="submit" value="Registrarme">
        </div>
    </form>
</body>
</html>