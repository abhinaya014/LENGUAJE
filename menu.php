<nav class="menu">
            <!-- <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="checkbtn">☰</i>
            </label> -->
            <label class="logo"><a href="index.htmlphp"><img class="logoo" src="fotos/badlogo.png" alt="Logo de pájaro de twitter" /></a></label>
            <ul class="menul">
                <li><a class="active" href="index.php">Inicio</a></li>
                <li>
                    <a href="gira.html">Gira</a>
                    <ul class="gira">
                        <li><a href="giracom.html">GIRA COMPLETA</a></li>
                        <li><a href="galeria.html">GALERIA</a></li>
                        <li><a href="compras.html">COMPRAS</a></li>
                    </ul>

                </li>
                <li>
                    <a href="tienda.html">Tienda</a>
                    <ul class="gira">
                        <li><a href="merchan.html">Merchandising</a></li>
                        <li><a href="discos.html">Discos</a></li>
                        
                    </ul>

                </li>

                <li><a href="miembros.html">Miembros</a></li>
                <li><a href="disco.html">Discografía</a></li>
                <?php
        session_start();
        if (!isset($_SESSION['nombre_usuario'])) {
            echo '<li><a href="login.php">LOGIN</a></li>';
            echo '<li><a href="registro.php">Registro</a></li>';
        } else {
            echo '<li><a href="gestionar.php">Gestionar Noticias</a></li>';
      
        }

        ?>

                
            </ul>
            <div class="usuario-container">
        <?php
        //session_start();
        if (isset($_SESSION['nombre_usuario'])) {
            $nombreUsuario = htmlspecialchars($_SESSION['nombre_usuario']);
            echo "<span class='nombre-usuario'>$nombreUsuario</span>";
            echo "<a href='logout.php' class='boton-salir'>Salir</a>";
        }
        ?>
    </div>

        </nav>