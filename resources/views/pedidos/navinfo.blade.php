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
            <ul class="menu-links" style="padding-left: 0px">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-arrow-back icon' ></i>
                        <span class="text nav-text">Volver</span>
                    </a>
                </li>
            </ul>
            <ul class="menu-links" style="padding-left: 0px">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-trending-up icon'></i>
                        <span class="text nav-text">Presupuesto</span>
                    </a>
                </li>
            </ul>
            <ul class="menu-links" style="padding-left: 0px">
                @if ($proyecto)
                <li class="nav-link">
                    <a href="{{ route('pedidos.index', ['id' => $proyecto->IdProyecto]) }}">
                        <i class='bx bx-building icon'></i>
                        <span class="text nav-text">Pedidos</span>
                    </a>
                </li>
                @endif
            </ul>
            <ul class="menu-links" style="padding-left: 0px">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-brush icon'></i>
                        <span class="text nav-text">Materia Prima</span>
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