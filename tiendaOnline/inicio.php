<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <header>
        <?php
            require_once("./header.php");
        ?>
    </header>
    <div class="container">
        <div class="row mt-5 bg-transparent text-white" id="acercaDe">
                <div class="col-lg-3 col-sm-12 d-flex align-items-center" style="padding: 10px;">
                    <img class="fm-logo" src="../img/logoSinFondo.png" alt="Logo">
                </div>
                <div class="col-lg-9 col-sm-12">
                    <h4 class="mt-4 d-flex justify-content-center">Acerca de</h4>
                    <p>
                        Descubre Fundamental, nuestras encantadoras tiendas familiares en Madrid. Especializadas en fundas y accesorios para dispositivos móviles, también ofrecemos servicios de reparación. En Fundamental, nos enorgullece brindar soluciones rápidas y efectivas para problemas como pantallas rotas, baterías agotadas y más. Con un equipo de expertos técnicos y atención personalizada, te aseguramos una experiencia excepcional. ¡Visítanos en Madrid y confía en Fundamental para proteger y reparar tus dispositivos móviles!
                    </p>
                    <p>
                        En Fundamental, sabemos lo valiosos que son tus dispositivos móviles en tu vida diaria. Por eso, no solo ofrecemos una amplia selección de fundas y accesorios de calidad, sino también servicios de reparación confiables y asequibles. Nuestro objetivo es devolverle la funcionalidad a tus dispositivos en tiempo récord, para que puedas seguir disfrutando de ellos sin interrupciones. Ven a nuestras tiendas y descubre que en Fundamental cuidamos de tus dispositivos como si fueran nuestros propios.
                    </p>
                    <h6 class="mt-4 d-flex justify-content-center">Calidad fundas</h6>
                    <div class="progress mb-4" style="height: 30px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                            100%
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <iframe class="col-lg-6 col-sm-12 " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3037.831195239223!2d-3.712706615954475!3d40.41259019780105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4227d6008b08e5%3A0x98018289c94cd44c!2sC.%20de%20Toledo%2C%2040%2C%2028005%20Madrid!5e0!3m2!1ses!2ses!4v1683486048321!5m2!1ses!2ses" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                    
                <div class="col-lg-6 col-sm-12 mt-5 bg-transparent text-white " id="contacto">
                    <h4 class="mt-3 d-flex justify-content-center">Contacto</h4>
                    <form action="mailto:tiendafundamentalnm@gmail.com" method="post">
                        <div class="row mt-4 d-flex justify-content-center">
                            <div class="col-lg-4 col-sm-12 mb-3">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
                            </div>
                        </div>
                        <div class="row mt-4 d-flex justify-content-center">
                            <div class="col-lg-8 col-md-6">
                                <textarea name="mensaje" id="mensaje" class="form-control" placeholder="Mensaje" style="height: 200px;"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3 mb-5">
                            <div class="col d-flex justify-content-center">
                                <input type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <hr>
            <div class="row-12 bg-transparent d-flex justify-content-center">
                <div class="row gy-3 mb-5">
                    <div class="col-4">
                        <a href="https://www.tiktok.com/@fundamental__oficial?lang=es" target="_blank"><img src="../img/tik-tok.png" class="inicio-icon" alt=""></a>
                    </div>
                    <div class="col-4">
                        <a href="https://www.instagram.com/fundamental__oficial/?hl=es" target="_blank"><img src="../img/instagram.png" class="inicio-icon" alt=""></a>
                    </div>
                    <div class="col-4">
                        <a href="https://www.facebook.com/profile.php?id=100061948031813" target="_blank"><img src="../img/facebook.png" class="inicio-icon" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>