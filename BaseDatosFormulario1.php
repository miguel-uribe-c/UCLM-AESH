<?php
$host = "localhost:3607";
$usuario = "root";
$contrasena = "12345";
$base_datos = "formulario1";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM resultados";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo SW.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid rgb(178, 178, 178);
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgb(231, 223, 223);
        }
        h2{
        text-align: center;
        }
        .calificacion{
            background-color: rgb(244, 150, 150);;
        }
        #div1{
            background-color: rgb(253, 219, 196);
            width: 50px; height: 50px; border-style: solid;}
        #div2{background-color: rgb(195, 247, 195);
            width: 50px; height: 50px; border-style: solid;}
        #div3{background-color: rgb(160, 255, 244);
            width: 50px; height: 50px; border-style: solid;}
        #div4{background-color: rgb(255, 254, 201);
            width: 50px; height: 50px; border-style: solid;}
        #div5{background-color: rgb(255, 255, 255);
            width: 50px; height: 50px; border-style: solid;}
        .semaforo{
            color: rgb(54, 129, 221);
        }
        .borde{
            border: 0;
        }
    </style>
</head>
       <script>
            function divs_mouseOver(){
            //Document.write(event.target.id);
            let div=
            document.getElementById(event.target.id);
            document.body.style.backgroundColor=window.getComputedStyle(div).backgroundColor;
        }
        </script>
<body>
<header>
        <div class="contenedor-header">
            <div class="logo-EARA">
                <img src="http://localhost/Formul/BlogImg/blog.png" alt="EARA Blog">
                <ul class="menu-horizontal">
                    <li><a href="Ejemplo SW.html">Inicio</a></li>
                    <li><a href="Categorias.html">Categorías</a></li>
                    <li><a href="Formulario_Articulos.html">Resuelve el test</a></li>
                </ul>
            </div>
        </div>
    </header>
    <br><table>
        <tr class="borde">
            <td class="borde"> <div id="div1" onmouseover="divs_mouseOver()"></div></td>
            <td class="borde"><div id="div2" onmouseover="divs_mouseOver()"></div></td>
            <td class="borde"><div id="div3" onmouseover="divs_mouseOver()"></div></td>
            <td class="borde"><div id="div4" onmouseover="divs_mouseOver()"></div></td>
            <td class="borde"><div id="div5" onmouseover="divs_mouseOver()"></div></td>
            <td class="borde" style="width: 1000px;">
            <h4 class="semaforo"><----- Coloca el cursor sobre los recuadros y juega con el semaforo de colores</h4>
            </td>
        </tr>
    </table>

    <script>
    $(document).ready(function () {
        $('#mitabla').DataTable({
            "columnDefs": [
                {
                    "targets": [3,4,5,6,7,8,9],
                    "orderable": false, 
                    "searchable": false 
                }
            ]
        });
    });
    </script>
    <?php if ($result->num_rows > 0): ?>
    
    <br><br><br><h2>Resultados del Formulario</h2><br><br>
    <table><tr><td class="borde">
        <table id="mitabla" cellspacing="30px">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Pregunta 1</th>
                <th>Pregunta 2</th>
                <th>Pregunta 3</th>
                <th>Pregunta 4</th>
                <th>Pregunta 5</th>
                <th class="calificacion">Calif</th>
                <th>Comentarios</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pregunta1']; ?></td>
                    <td><?php echo $row['pregunta2']; ?></td>
                    <td><?php echo $row['pregunta3']; ?></td>
                    <td><?php echo $row['pregunta4']; ?></td>
                    <td><?php echo $row['pregunta5']; ?></td>
                    <td><?php echo $row['puntos']; ?></td>
                    <td><?php echo $row['comentarios']; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </td></tr><table><br><br><br><br><br><br><br>
        
        
    <?php else: ?>
        <p>No hay resultados para mostrar.</p>
    <?php endif; ?>
    <footer>
        <div class="Footer">
            <div class="logo">
                <a href="Ejemplo SW.html"><img src="http://localhost/Formul/BlogImg/blog.png" alt="EARA Blog"></a>
            </div>
            <div class="redes-sociales">
                <a href="https://www.facebook.com/eder.ramirez.1422?mibextid=eHce3h" target="_blank"><img src="http://localhost/Formul/BlogImg/Facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/elderudito007?igsh=d3hsN2h2YmoxbW51" target="_blank"><img src="http://localhost/Formul/BlogImg/Instagram.png" alt="Instagram"></a>
                <a href="https://api.whatsapp.com/send?phone=5523551239" target="_blank"><img src="http://localhost/Formul/BlogImg/Whatsapp.png" alt="Whatsapp"></a>
                <a href="https://youtube.com/@elderudito0075?si=tCHt2LgoksZ4Rsut" target="_blank"><img src="http://localhost/Formul/BlogImg/Youtube.png" alt="Youtube"></a>
                <a href="https://t.me/Eder_Ram" target="_blank"><img src="http://localhost/Formul/BlogImg/Telegram.png" alt="Telegram"></a>
                <a href="https://discord.com/invite/JV746VYD" target="_blank"><img src="http://localhost/Formul/BlogImg/Discord.png" alt="Discord"></a>
                <a href="https://www.tiktok.com/@eder_al_r?_t=8inTw24mEx4&_r=1" target="_blank"><img src="http://localhost/Formul/BlogImg/Tiktok.png" alt="TikTok"></a>
            </div>
        </div>
    </footer>
  
</body>
</html>