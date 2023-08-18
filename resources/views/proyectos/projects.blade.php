<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('/css/navadmin.css')}}">
    <link rel="stylesheet" href="{{asset('/css/adminproyec.css')}}">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Proyectos</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="storage/imagen/torre-logo.svg" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">San Mathias</span>
                    <span class="profession">Constructora</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Buscar...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('proyectos.gestionproyecto')}}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Proyectos</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="/index.html">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Salir</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo oscuro</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="encabezado">
            <div class="text">Proyectos</div>
        </div>

        <div class="conten-proye">
            @forelse ($proyecto as $fila)
            <div class="proyectos">
                @if ($fila ->Imagen)
                <img class="proyejecutado" src="{{asset('storage/imagen/' . $fila->Imagen)}}" alt="">
                @else 
                        Sin imagen  
                @endif
                <h3 class="tituloejecutado">
                    {{$fila->Nombre}}
                </h3><br>
                <p class="info-proyecto">
                    {{$fila->Estado}}
                  </p>
                  <div class="btn">
                    <a href="{{ route('proyectos.editarproyecto',  ['id' => $fila->IdProyecto]) }}" class="boton">Editar</a>
                    <a href="" class="boton">Ver más</a>
                </div>
               
              </div>
            @empty
            @endforelse
        </div>
    </section>

    <script src="{{asset('/js/navadmin.js')}}"></script>

</body>
</html>