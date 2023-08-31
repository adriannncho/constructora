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
            <canvas id="myChart"></canvas>
        </div>
        
    </section>

    <script src="{{asset('/js/navadmin.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var aportesData = @json($aportes);
        var sociosData = @json($socios);

        var labels = sociosData.map(socio => socio.Nombre); // Etiquetas de socios, ajusta según tus necesidades
        var data = aportesData.map(aporte => aporte.AporteTotal);

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        // Agrega más colores de fondo aquí
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        // Agrega más colores de borde aquí
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
    
    
    <canvas id="myChart"></canvas>






   

