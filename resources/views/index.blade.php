<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constructora San Mathias</title>

    <link rel="stylesheet" href="{{asset('/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('/css/estilos.css')}}">
   <link rel="stylesheet" href="{{asset('/css/footer.css')}}">
   <script src="https://kit.fontawesome.com/9100e950df.js" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
  </style>
</head>
<body>
    <header>
        <div class="container_menu">
            <div class="logo">
                <img src="storage/imagen/logo.png" alt="">
                <img src="storage/imagen/logoblanco.png" alt="" class="scroll">
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#inicio" id="select">Inicio</a></li>
                        <li><a href="#quienessomos">Quienes Somos</a></li>
                        <li><a href="#proyectos">Proyectos</a></li>
                        <li><a href="#contactanos">Contactos</a></li>
                        <li><a href="{{ route('proyectos.gestionproyecto')}}">Iniciar Sesión</a></li>
                    </ul>
                </nav>
            </div>  
        </div>
        <div class="scrol">
        
        </div>
    
    </header>
    <main>
        <!--INICIO-->
        <section id="inicio">
          <div class="container_cover">
            <div class="cover">
                <div class="text">
                    <h1>
                        San Mathias: Construyendo apartamentos de lujo con excelencia.
                    </h1>
                    <p> San Mathias es una empresa constructora comprometida en ofrecer espacios de alta calidad y confort,
                        combinando innovación, diseño y excelencia en cada uno de sus proyectos. 
                        Con más de una década de experiencia en el mercado, San Mathias se ha posicionado gracias a
                        su atención personalizada y su compromiso con la satisfacción total de sus clientes.
                    </p>
                </div>
                <div class="imagensvg">
                    <img src="storage/imagen/edificioInicio.png" alt="">
                </div>
            </div>
        </div>
        </section>
        


        <!--MISION VISION VALORES-->

        <section id="quienessomos">
          <div class="containergeneral container_card">
            <div class="cards card_primary">
                <div class="text text_primary">
                    <h1>¿Quienes Somos?</h1>
                    <p>"En San Mathias, construimos espacios que inspiran y mejoran la calidad de vida, 
                        con una visión innovadora y comprometidos con la excelencia en cada proyecto".</p>
                </div>
                <div class="missioncard_primary">
                    <div class="mision_box boxcard_primary">
                        <img class="iconos_cards" src="storage/imagen/mision.png" alt="">
                        <h2>Mision</h2>
                        <p>Nuestra misión es construir espacios funcionales y estéticos, innovadores, 
                        de alta calidad y sostenibles, que superen las expectativas de nuestros clientes. 
                        Trabajamos en equipo con colaboradores y proveedores, ofreciendo un servicio 
                        personalizado y adaptable a cada proyecto.
                        </p>
                    </div>
                
                
                    <div class="mision_box boxcard_primary">
                        <img class="iconos_cards" src="storage/imagen/vision.png" alt="">
                        <h2>Vision</h2>
                        <p>Nuestra visión es ser una constructora líder en el mercado, comprometida 
                        con la excelencia y la mejora continua. Queremos ser innovadores, 
                        adaptables a las necesidades del mercado y a los avances tecnológicos, 
                        y estar siempre en búsqueda de nuevas oportunidades para crecer y desarrollarnos.</p>
                    </div>
                
                
                    <div class="mision_box boxcard_primary">
                        <img class="iconos_cards" src="storage/imagen/value.png" alt="">
                        <h2>Valores</h2>
                        <p> <ul class="lista">
                            <li>Compromiso con la satisfacción del cliente.</li>
                            <li>Innovación y mejora continua.</li>
                            <li>Honestidad y transparencia en todas nuestras acciones.</li>
                            <li>Profesionalismo y calidad en el servicio ofrecido.</li>
                            </ul> 
                        </p>
                    </div>
                </div>
            </div>
        </div>

        </section>
        


  <!--SLIDER PROYECTOS-->
    <section id="proyectos">
        <div class="tituloproyectos">
            <h1>Proyectos</h1>
        </div>
        <div id="carouselExampleIndicators" class="container carousel slide" style="width: 1100px; margin-top: 20px; border-radius: 25px">
            <div class="carousel-indicators" >
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="border-radius: 25px; height: 500px">
              <div class="carousel-item active">
                <img src="storage/imagen/proyectos ejecutados 1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" style="border-radius: 25px; height: 500px" >
                <img src="storage/imagen/proyectos ejecutados 2.png" class="d-block w-100" style="" alt="...">
              </div>
              <div class="carousel-item" style="border-radius: 25px; height: 500px">
                <img src="storage/imagen/proyectos ejecutados 3.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>


      <!--PROYECTOS REALIZADOS-->
      <section id="proyectos-realizados">
        <div id="proyectosCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner w-100 container" >
            @foreach($proyectosFinalizados->chunk(3) as $chunk)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="row">
                    @foreach($chunk as $fila) <!-- Aquí iteras sobre $chunk -->
                        <div class="col-md-4">
                            <div class="proyectos d-flex flex-column">
                                @if ($fila->Imagen)
                                    <img class="proyejecutado" src="{{ asset('storage/imagen/' . $fila->Imagen) }}" alt="">
                                @else 
                                    Sin imagen  
                                @endif
                                <div class="flex-grow-1">
                                    <h3 class="tituloejecutado">{{ $fila->Nombre }}</h3><br>
                                    <p class="info-proyecto">{{ $fila->Estado }}</p>
                                </div>
                                <div class="btn">
                                    <a href="{{ route('proyectos.editarproyecto', ['id' => $fila->IdProyecto]) }}" class="boton">Editar</a>
                                    <a href="{{ route('gestionmateria.index', ['id' => $fila->IdProyecto]) }}" class="boton">Ver más</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        
          </div>
          <a class="carousel-control-prev" href="#proyectosCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" style="background-color: gray " href="#proyectosCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
          </a>
      </div>
    
      </section>
    </section>
  


        <!--CONTACTANOS-->
  <section id="contactanos">
    <div class="contactar_primary">
      <div class="text text_contacto">
          <h1>Contactos</h1>
      </div>
      <form action="">
          <table class="tabla">
            <tr>
              <td class="columnas">
                <label class="formcont" for="">Nombre*</label>
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"/>
              </td>
              <td class="columnas">
                <label class="formcont" for="">Apellido*</label>
                <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido"/>
              </td>
            </tr>
            <tr>
              <td class="columnas">
                <label class="formcont" for="">Correo*</label>
                <input class="controlse" type="email" name="correo" id="correo" placeholder="Ingrese su Correo"/>
              </td>
              <td class="columnas">
                <label class="formconte" for="">Número de celular*</label>
                <input class="control" type="text" name="celular" id="celular" placeholder="Ingrese su número de celular"/>
              </td>
            </tr>
          </table>
          <table class="tabla">
            <tr>
              <td class="columnas">
                <label class="formcont" for="">Asunto*</label>
                <input class="controlse" type="text" name="asunto" id="asunto" placeholder="Ingrese el asunto"/>
              </td>
            </tr>
            <tr>
              <td class="columnas">
                <label class="formcont" for="">Mensaje*</label>
                <input class="controles" type="text" name="mensaje" id="mensaje" placeholder="Ingrese su mensaje"/>
              </td>
            </tr>
          </table>
          <div class="boton">
            <div>
              <button class="cont">Enviar</button>
            </div>
            
            <div class="contenedor">
              <div class="cuadro">
                <div class="icono">
                  <i class="fa-brands fa-facebook"></i>
                </div>
                <span>Facebook</span>
              </div>
              <div class="cuadro">
                <div class="icono">
                  <i class="fa-brands fa-twitter"></i>
                </div>
                <span>Twitter</span>
              </div>
              <div class="cuadro">
                <div class="icono">
                  <i class="fa-brands fa-instagram"></i>
                </div>
                <span>Instagram</span>
              </div>
              <div class="cuadro">
                <div class="icono">
                  <i class="fa-brands fa-tiktok"></i>
                </div>
                <span>Tiktok</span>
              </div>
              <div class="cuadro">
                <div class="icono">
                  <i class="fa-brands fa-whatsapp"></i>
                </div>
                <span>Whatsapp</span>
              </div>
            </div>
          </div>
    </div>
  </section>
        
          

    </main>
    @include('footer')

    <script src="js/menu.js"></script>
</body>
</html>




