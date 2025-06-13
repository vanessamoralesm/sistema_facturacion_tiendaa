<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- fuentes-->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">

  <!-- Estilos-->
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="style.css">
 
</head>
<body class="cuerpo">
    <div class="logo">
        <img src="IMG/logo00.jpg" alt="logo moda">
        <aside class="sidebar">

            <nav class="menu">
                <ul class="menu-content">
                    <li>
                        <a href="inicio.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 10h4l3-10h4M5 6h14M7 6V4a1 1 0 012-2h6a1 1 0 011 1v1"/>
                            </svg>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="factura.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2h6v2m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h2l2-2h2l2 2h2a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                            </svg>
                            <span>Factura</span>
                        </a>
                    </li>
                    <li>
                        <a href="Clientes.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-3-3h-4M9 20H4v-2a3 3 0 013-3h4m4-6a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <span>Clientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="Productos.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
                            </svg>
                            <span>Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="Usuarios.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.656 6.879 1.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                            </svg>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="Roles.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4z"/>
                            </svg>
                            <span>Roles</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
    </div>

  <main class="main">
        <div class="header">
            <h1 class="text-usuarios">GarMorel</h1>
            <div class="user-avatar">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MO
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Maricarmen Orozco</a></li>
                    <li><a class="dropdown-item" href="#">m.@gmail.com</a></li>
                    <li><a class="dropdown-item" href="#">Administrador</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                          <!-- Ícono SVG -->
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                               stroke-width="1.5" stroke="currentColor" width="20" height="20">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 
                                     2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 
                                     0-3-3m0 0 3-3m-3 3H15" />
                          </svg>
                          Cerrar sesión
                        </a>
                    </li>       
                </ul>
            </div>
        </div>

        <div class="container-info">

           @yield('contenido');
               
        </div>
    </main>

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap 5 JS con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
