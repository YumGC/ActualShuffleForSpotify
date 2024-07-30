<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Manhattan</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Proyecto Manhattan</h1>
        <nav>
            <ul>
                <li><a href="#inicio">Inicio</a></li>
                <li class="dropdown">
                    <a href="#categorias" class="dropbtn">Categorías</a>
                    <div class="dropdown-content">
                        <a href="#musica">Música</a>
                        <a href="#deportes">Deportes</a>
                        <a href="#teatro">Teatro</a>
                    </div>
                </li>
                <li><a href="#proximas">Próximas Actividades</a></li>
                <li><a href="register.php">Registrarse</a></li>
                <li><a href="login.php">Inciar Sesión</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <aside class="sidebar">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd21I1HTEY0lkZBCGbWKfIZFdd1Za086ZRog&s" alt="Publicidad 1">
        </aside>
        <main class="content">
            <h2 id="proximas">Próximas Actividades</h2>
            <?php
            include 'db_connection.php';
            //Limite de 5 para que no se haga la página eterna hacia abajo
            $sql = "SELECT titulo, descripcion, fecha, hora, ubicacion FROM actividades ORDER BY fecha, hora LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["titulo"] . "</h3>";
                    echo "<p>Fecha: " . $row["fecha"] . "</p>";
                    echo "<p>Hora: " . $row["hora"] . "</p>";
                    echo "<p>Ubicación: " . $row["ubicacion"] . "</p>";
                    echo "<p>Descripción: " . $row["descripcion"] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "<p>No hay actividades programadas.</p>";
            }

            $conn->close();
            ?>
        </main>
        <aside class="sidebar">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd21I1HTEY0lkZBCGbWKfIZFdd1Za086ZRog&s" alt="Publicidad 2">
        </aside>
    </div>
    <footer>
        <p>&copy; 2024 Proyecto Manhattan. Todos los derechos reservados.</p>
    </footer>


    <script>
        window.addEventListener('scroll', function() {
            var header = document.querySelector('header');
            var nav = header.querySelector('nav');
            if (window.scrollY > header.offsetTop + header.offsetHeight) {
                nav.style.position = 'fixed';
                nav.style.top = '0';
                nav.style.left = '0';
            } else {
                nav.style.position = 'static'; // Vuelve a la posición estática si el usuario se desplaza hacia arriba
            }
        });
    </script>

</body>

</html>