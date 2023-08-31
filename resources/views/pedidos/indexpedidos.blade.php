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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Proyectos</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="public/storage/imagen/torre-logo.svg" alt="">
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
                        <a href="#">
                            <i class='icono bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Informacion</span>
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
            <div class="title-enca">
                <h2 >Pedidos del Proyecto: <br> {{ $proyecto->Nombre }}</h2>
            </div>
            
            <div class="btn-agregar-proyecto">
             <a href="" class="crear"  data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Crear Pedido</a>
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

    @include('pedidos.crearPedido')

    <script src="{{asset('/js/navadmin.js')}}"></script>
</body>
</html>