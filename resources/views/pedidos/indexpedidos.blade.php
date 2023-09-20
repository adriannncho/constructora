<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('/css/navadmin.css')}}">
    <link rel="stylesheet" href="{{asset('/css/pedidos.css')}}">
    
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <title>Proyectos</title>
</head>
<body>
    @include('pedidos/navinfo')

    <section class="home">
        <div class="encabezado">
            <div class="title-enca">
                <h2>Pedidos del Proyecto:
                    @if ($proyecto)
                        {{ $proyecto->Nombre }}
                    @endif
                </h2>
            </div>
            
            <div class="btn-agregar-proyecto">
                @if ($proyecto)
                    <a href="{{ route('pedidos.create', ['id' => $proyecto->IdProyecto]) }}" class="crear">Crear Pedido</a>
                @endif
            </div>
            
            
            
        </div>
        <div class="contenido">
            <div class="tabla">
               
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Factura <br> Pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedidos as $fila)
                        <tr>
                            <td>{{ $fila->Descripcion }}</td>
                            <td>{{ $fila->FechaHora }}</td>
                            <td>{{ $fila->ValorTotal }}</td>
                            <td>
                                @if ($fila->Evidencia)
                                    <a href="{{ asset('storage/imagen/' . $fila->Evidencia) }}" target="_blank" class="btn btn-pdf">Ver pdf</a>
                                @else
                                    <span>Sin factura pedido</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('detallepedido.index', ['id' => $fila->IdPedido])}}" class="btn" style="background-color: #023877; color: #FFF">Detalle Pedido</a>


                            </td>
                            <td>
                                <a href="" class="btn" style="background-color: #F4D03F">Editar</a>
                            </td>
                            <td>
                                <a href="" target="_blank" class="btn " style="background-color: #E74C3C">Borrar</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">No hay pedidos disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{asset('/js/navadmin.js')}}"></script>
</body>
</html>