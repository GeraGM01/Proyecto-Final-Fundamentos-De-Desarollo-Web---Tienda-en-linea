<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <a href="index.php" class="enlace">
        <h1>TecnoZone</h1>
    </a>
    <ul>
        <li><a class="active" href="index.php">Inicio</a></li>
        <li><a href="#">Nosotros</a></li>
        <li><a href="chat.php">Chat</a></li>
        <?php
        if (isset($_SESSION['Id_Cliente']) == false) {  #si no hay ningun cliente loggeado muestrame la parte de login
        ?>
            <li><a href="loginUsuario.php">Login</a></li>
        <?php
        } else {
        ?>
            <li><a href="perfil.php">Perfil</a></li>
        <?php
        }
        ?>
    </ul>
</nav>