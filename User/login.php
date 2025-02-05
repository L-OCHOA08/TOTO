<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="login.css">
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
    
    <?php 
        if (isset($_REQUEST['email'])) {
            $userLog = $_REQUEST['email'];
            $passw = $_REQUEST['passw'];

            $campos = array();

            if (!$userLog && !$passw) {
                array_push($campos, 'Necesitas ingresar un email y una contraseña');
            } else if (!$userLog) {
                array_push($campos, 'Necesitas agregar un correo');
            }else if (!$passw) {
                array_push($campos, 'Necesitas ingresar una contraseña.');
            }
            
            if (count($campos) > 0) {
                echo "<div class='error' style='height: auto; background: #d90000; padding: .5rem; width: 50%; border-radius: 20px; text-align: center; margin-bottom: 1rem; display: flex; flex-direction: column; align-items: center; justify-content: center; position: absolute; top: 20dvh; left: 25dvw;'>";
                for ($i = 0; $i < count($campos); $i++) {
                    echo "<li style='list-style: none; color: #fff';>" . $campos[$i];
                }
                echo "</div>";
            }
        }
    ?>
    <form action="validar.php" method="post">
        <h1>Iniciar Sesión</h1>
        <div class="inputContainer correoCliente">
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="inputContainer contraCliente">
            <label for="passw">Contraseña:</label>
            <input type="password" id="passw" name="passw">
        </div>

        <p class="linkRegister">¿No tenés cuenta? <a href="register.php">Crear una.</a></p>

        <input id="ingresar" type="submit" value="Ingresar">
    </form>

    <script src="../nav.js"></script>
</body>
</html>