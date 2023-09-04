<!DOCTYPE html>
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
    @include('proyectos/navproyectos')

    <section class="home">
        <div class="encabezado">
            <div class="text">Proyectos</div>
            <div class="conten">
                <div class="btn-agregar-proyecto">
                    <a href="{{ route('projects.index', ['status' => 'En planeacion']) }}" class="agregar-proyecto">En Planeación</a>
                </div>
                <div class="btn-agregar-proyecto">
                    <a href="{{ route('projects.index', ['status' => 'En ejecucion']) }}" class="agregar-proyecto">En Ejecución</a>
                </div>
                <div class="btn-agregar-proyecto">
                    <a href="{{ route('projects.index', ['status' => 'Finalizado']) }}" class="agregar-proyecto">Finalizados</a>
                </div>
            </div>
            <div class="btn-agregar-proyecto">
                <a href="{{route('proyectos.createproyecto')}}" class="agregar-proyecto">Agregar Proyecto</a>
            </div>
        </div>

        <div class="conten-proye">
            @forelse ($proyectos as $fila)
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
                    <a href="{{ route('gestionmateria.index',  ['id' => $fila->IdProyecto])}}" class="boton">Ver más</a>
                </div>
                
               
              </div>
            @empty
            @endforelse
        </div>
    </section>

    <script src="{{asset('/js/navadmin.js')}}"></script>

</body>
</html>