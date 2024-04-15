

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abhinaya</title>
    <link rel="icon" type="image/png" href="/fotos/foto.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="contain">


        
<?php
            include_once "menu.php";

            // Verificar si las credenciales son válidas
if ($usuario === "usuario_valido" && $contrasena === "contrasena_valida") {
    // Iniciar sesión y almacenar el nombre de usuario en una variable de sesión
    session_start();
    $_SESSION['nombre_usuario'] = $usuario;
    // Redirigir a index.php
    header("Location: index.php");
    exit; // Asegúrate de salir después de redirigir
}

        ?>
  

    <div class="container">
            <div class="noti">
              <div class="title">
               
            </div>
              <div class="noticia">
                <marquee>
                <p>
                    Bad Bunny estalla contra una canción viral de TikTok generada por IA: "Si a ustedes les gusta esta mierda, sálganse de este grupo" La Inteligencia Artificial (IA) ha emergido como una potente herramienta para músicos y productores de la industria. En los últimos meses, su avance imparable ha puesto en el punto de mira a los artistas, quienes temen por el futuro de su profesión.
                    
                    Si hace unos meses una canción con las voces de Drake y The Weeknd y generada por IA revolucionaba las redes sociales, en esta ocasión el protagonista ha sido ni más ni menos que Bad Bunny. 
                    
                    Detrás de este tema que suplanta la voz del cantante puertorriqueño se encuentra la cuenta de TikTok FlowGPT, la cual se define como "el primer artista potenciado con tecnología GPT (Generador Preentrenado de Temazos)". Se trata, en este sentido, de un productor que, después de crear la base de un tema de reguetón, agrega artificialmente la voz de uno de los artistas urbanos del momento.
                </p>
                </marquee>
                
              </div>
            </div>
          </div>
          <div class="noticias">
            <div class="contenido">
              
                <div class="titulo">
                    <h2>ULTIMAS NOTICIAs</h2>
                </div>
                <div class="tarjetas">
        <?php
       
        include 'bbdd.php';
        $noticias = obtenerUltimasNoticias();

        // Iterar sobre las noticias y mostrarlas
        foreach ($noticias as $noticia) {


            echo '<div class="tarjeta">';
            echo '<div class="image">';
            echo '<img src="' . $noticia['imagen'] . '" class="juego">';
            echo '</div>';
            echo '<div class="article">';
            echo '<a href="noticia.php?id=' .$noticia['id_noticia']. '"><h4>' .$noticia['titulo']. '</h4></a>';
            echo '<p>' . $noticia['descripcion'] . '</p>';
            echo '<div class="blog-view">';
            echo '<a href="' . $noticia['url'] . '" target="button">Leer Más</a>';
            echo '</div>';
            echo '<div class="posted-date">';
            echo '<p>PUBLICADO EN ' . $noticia['fecha_pub'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
                           
        }
  
        ?>
  </div>
    </div>
    </div>
    <div class="noticias">
            <div class="contenido">
              
                <div class="titulo">
                    <h2>PROXIMAS GIRAS</h2>
                </div>
        </div>
        </div>

          <div class="tables">
            <table>
                <thead>
                    <tr>
                        <th>LUGAR</th>
                        <th>FECHA</th>
                        <th>TICKET</th>
                        <th>ENTRADAS</th>


                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>Skully's Music Diner</td>
                        <td>18/11/2023</td>
                        <td>15€</td>
                        <td><button><a href="youtube.com" target="_blank">COMPRAR</button></a></td>
                    </tr>

                    <tr>
                        <td>Angel Du$t (US)
                            Candy, DAZY, and Steve Marino</td>
                        <td>01/12/2023</td>
                        <td>20$</td>
                        <td><button><a href="youtube.com" target="_blank">COMPRAR</button></a></td>
                    </tr>

                    <tr>
                        <td>Columbus, OH, US</td>
                        <td>14/12/2023</td>
                        <td>20$</td>
                        <td><button><a href="youtube.com" target="_blank">COMPRAR</button></a></td>
                    </tr>

                    <tr>
                        <td>1151 N. High St.</td>
                        <td>01/01/2024</td>
                        <td>20$</td>
                        <td><button><a href="youtube.com" target="_blank">COMPRAR</button></a></td>
                    </tr>

                    <tr>
                        <td>Salt Lake City, UT, US. Delta Center</td>
                        <td>02/02/2024</td>
                        <td>20$</td>
                        <td><button><a href="youtube.com" target="_blank">COMPRAR</button></a></td>
                    </tr>
                </tbody>
            </table>




          </div>
          <div class="noticias">
            <div class="contenido">
              
                <div class="titulo">
                    <h2>merchandising bad bunny</h2>
                </div>
        </div>
        </div>
        <div class="productos">
            
            <div class="todoproducto">
                <div class="producto">
                    <img src="fotos/suda.jpg" alt="">
                    <div class="info">
                        <h4 class="titulo">SUDADERA (BAD BUNNY) CON CAPUCHA</h4>
                        <p class="precio">50€</p>
                        <a class="btn" href="#">COMPRAR</a>
                    </div>
                </div>
                <div class="producto">
                    <img src="fotos/cam.PNG" alt="">
                    <div class="info">
                        <h4 class="titulo">CAMISETA(BAD BUNNY) </h4>
                        <p class="precio">20€</p>
                        <a class="btn" href="#">COMPRAR</a>
                    </div>
                </div>
                <div class="producto">
                    <img src="fotos/CAMIS.webp" alt="">
                    <div class="info">
                        <h4 class="titulo">CAMISETA ALBUM (BAD BUNNY) </h4>
                        <p class="precio">24.99€</p>
                        <a class="btn" href="#">COMPRAR</a>
                    </div>
                </div>

                <div class="producto">
                    <img src="fotos/SHOP3.webp" alt="">
                    <div class="info">
                        <h4 class="titulo">Sudadera con capucha Un Verano Sin Ti </h4>
                        <p class="precio">19.99€</p>
                        <a class="btn" href="#">COMPRAR</a>
                    </div>
                </div>
                <div class="producto">
                    <img src="fotos/BADSHOP.webp" alt="">
                    <div class="info">
                        <h4 class="titulo">Bad Bunny Badbunny / XL </h4>
                        <p class="precio">69.99€</p>
                        <a class="btn" href="#">COMPRAR</a>
                    </div>
                </div>

            </div>
        </div>



          <div class="piecont">
            <div class="socialicon">
                <!-- <a href="https://twitter.com/?lang=es"><img class="iconosSociales" src="images/twitterLogo.png" alt="Logo de pájaro de twitter" /></a>
                <a href="https://www.instagram.com/"><img class="iconosSociales" src="images/instagramLogo.png" alt="Logo de cámara de instagram" /></a>
                <a href="https://www.tiktok.com/es/"><img class="iconosSociales" src="images/tiktokLogo.png" alt="Logo de nota musical de TikTok" /></a>
 -->


                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="pieboton">
                <p>copyright &copy;2024;  <span class="des">Abhinaya Dahal</span></p>
            </div>


          </div>

        


    </div>
</body>
</html>