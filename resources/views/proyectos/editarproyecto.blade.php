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
    @include('proyectos/navproyectos')

  <section class="home">
    <div class="text">Editar Proyecto</div>
    <div class="crear">
      <form action="{{ route('proyectos.actualizar', $proyecto->IdProyecto) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre del Proyecto:</label><br>
        <input type="text" id="nombre" name="nombre" class="nombre" value="{{ $proyecto->Nombre }}" required><br><br>
    
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
            <option value="En planeación" {{ $proyecto->Estado == 'En planeación' ? 'selected' : '' }}>En Planeación</option>
            <option value="En ejecución" {{ $proyecto->Estado == 'En ejecución' ? 'selected' : '' }}>En Ejecución</option>
            <option value="Finalizado" {{ $proyecto->Estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
        </select><br><br>
    
        <label for="direccion">Direccion del proyecto:</label><br>
        <input type="text" id="dire" name="dire" class="nombre" value="{{ $proyecto->Direccion }}" required><br><br>

        <div class="ciudad">
          <label for="">Presupuesto</label><br>
          <input type="number" id="presupuesto" name="presupuesto" class="nombre" value="{{ $proyecto->AporteTotal }}" required><br><br>
        </div>
    
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
            <a href="{{ route('proyectos.gestionproyecto')}}" class="cancelar" style="text-decoration: none">Cancelar</a>
            <button type="submit" class="crearbtn">Actualizar Proyecto</button>
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
