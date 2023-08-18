<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Nuevo Proyecto</title>

  <link rel="stylesheet" href="{{asset('/css/navadmin.css')}}">
  <link rel="stylesheet" href="{{asset('/css/createproyecto.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
    <div class="text">Crear Proyecto</div>
    <div class="crear">
      <form action="{{ route('proyectos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre del Proyecto:</label><br>
        <input type="text" id="nombre" name="nombre" class="nombre" required><br><br>

        
        
        <div class="listas">
          <div>
            <label for="">Departamento:</label><br>
            <select name="depto" id="depto" class="estado">
              <option value="">Seleccionar departamento</option>
              @forelse ($departamentos as $departamento)
                  <option value="{{ $departamento->IdDepartamento}}">{{$departamento->Nombre}} </option>
              @empty
                  
              @endforelse
            </select> 
  
          </div>
          <div class="ciudad">
            <label for="">Ciudad</label><br>
              <select name="ciudad" id="ciudad" class="estado">
                <option value="">Seleccionar Ciudad</option>
              </select><br>
          </div>
          
        </div>
        
        <label for="estado">Estado:</label><br>
        <select id="estado" name="estado" class="inputs" required>
          <option value="En planeación">En Planeación</option>
          <option value="En ejecución">En Ejecución</option>
          <option value="finalizado">Finalizado</option>
        </select><br><br>

        <label for="direccion">Direccion del proyecto:</label><br>
        <input type="text" id="dire" name="dire" class="nombre" required><br><br>
        
        <label for="imagen">Subir Imagen:</label><br>
        <div>
          <label for="input-file" id="drop-area">
            <div id="img-view" style="height: 250px">
              <i class="fas fa-cloud-upload-alt"></i>
              <p>Arrastra o haz clic aquí para<br>subir imagen</p>
            </div>
          </label>
          <input class="file-input" type="file" name="file" id="input-file" hidden>
        </div>
        
        <div>
          <button type="submit" class="cancelar"><a href="{{ route('proyectos.gestionproyecto')}}" style="text-decoration: none">Cancelar</a></button>
          <button type="submit" class="crearbtn">Crear Proyecto</button>
        </div>
      </form>
    </div>
  </section>



<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script src="{{asset('/js/ciudades.js')}}"></script>  
<script src="{{asset('/js/navadmin.js')}}"></script>
<script src="{{asset('/js/cargarimagen.js')}}"></script>
</body>
</html>
