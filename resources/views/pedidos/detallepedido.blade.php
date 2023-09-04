<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Nuevo Proyecto</title>

  <link rel="stylesheet" href="{{asset('/css/navadmin.css')}}">
  <link rel="stylesheet" href="{{asset('/css/pedidos.css')}}">
  <link rel="stylesheet" href="{{asset('/css/createpedido.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  @include('proyectos/navproyectos')
  
  <section class="home">
    <div class="encabezado">
        <div class="title-enca">
            <h2 >Detalle Pedido</h2>
        </div>        
    </div>
    <div class="contenido">
        <div class="tabla" style="width: 100%">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Valor Unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detallePedidos as $detalle)
                    <tr>
                        <td>{{ $detalle->NombreMateriaPrima }}</td>
                        <td>{{ $detalle->ValorUnitario }}</td>
                        <td>{{ $detalle->Cantidad }}</td>
                        <td>{{ $detalle->Total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="botones">
                <button type="submit" class="cancelar"><a href="{{ route('proyectos.gestionproyecto')}}" style="text-decoration: none">Cancelar</a></button>
            </div>
        </div>
    </div>
</section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script src="{{asset('/js/ciudades.js')}}"></script>  
<script src="{{asset('/js/navadmin.js')}}"></script>
<script src="{{asset('/js/cargarimagen.js')}}"></script>
</body>
</html>
