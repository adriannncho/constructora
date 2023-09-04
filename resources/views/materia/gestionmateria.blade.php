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
    @include('pedidos/navinfo')

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