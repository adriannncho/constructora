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