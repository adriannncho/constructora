<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('/css/navadmin.css')}}">
    <link rel="stylesheet" href="{{asset('/css/materiadash.css')}}">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
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
        <div class="encabezadomat">
            <div class="header_materia">
                <div class="presupuesto">
                    <p>Presupuesto</p>
                    
                    <a href="{{ route('aportes.index')}}" class="boton">Ver más</a>
                </div>
                <div class="pedidos">
                    <p>Pedidos</p>
                    <a href="{{ route('pedidos.index', ['id' => $proyecto->IdProyecto]) }}" class="boton">Ver más</a>
                </div>
            </div>
            <div class="materia">
                <p>Materia Prima</p>
            </div>
            <div class="footer_materia">
                <div class="admin">
                    <p>Administradores</p>
                </div>
                <div class="trabajo">
                    <p>trabajo</p>
                </div>
            </div>
        </div>
        
    </section>

    <script src="{{asset('/js/navadmin.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var aportesData = @json($aportes);

        var labels = aportesData.map(aporte => aporte.socio.Nombre + ' ' + aporte.socio.Apellido);
        var data = aportesData.map(aporte => aporte.AporteTotal);

        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        // Agrega más colores de fondo aquí si es necesario
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        // Agrega más colores de borde aquí si es necesario
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>