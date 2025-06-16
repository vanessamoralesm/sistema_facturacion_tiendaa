<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenido</title>
  <meta http-equiv="refresh" content="3;url={{ route('dashboard') }}">
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      font-family: 'Segoe UI', sans-serif;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      position: relative;
      background: #000;
    }

    /* Fondo con imagen y animación zoom lenta */
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background-image: url('{{ asset("IMG/GFashion.jpg") }}');
      background-size: cover;
      background-position: center;
      filter: brightness(0.5); /* oscurecer un poco para que el texto se lea mejor */
      animation: bgZoom 60s linear infinite alternate;
      z-index: -1;
    }

    @keyframes bgZoom {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(1.1);
      }
    }

    .logo {
      width: 40vw;
      max-width: 400px;
      height: auto;
      /* max-height: 60vh; */
      border-radius: 50%;
      object-fit: cover;
      animation: logoZoomJump 10s ease forwards;
      z-index: 1;
    }

    /* Animación que combina zoom y salto */
    @keyframes logoZoomJump {
      0% {
        transform: scale(0.85) translateY(0);
        opacity: 0;
      }
      50% {
        transform: scale(1.05) translateY(-20px);
        opacity: 1;
      }
      100% {
        transform: scale(1) translateY(0);
        opacity: 1;
      }
    }

    .mensaje {
      z-index: 2;
      text-align: center;
      font-size: 2.5rem;
      animation: fadeIn 2.5s ease-in-out 1.2s forwards;
      opacity: 0;
      margin-top: 30px;
      font-weight: 600;
      text-shadow: 0 0 8px rgba(0,0,0,0.6);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

  </style>
</head>
<body>
  <img src="{{ asset('IMG/logo00.jpg') }}" alt="Logo" class="logo" />
  <div class="mensaje">
    <p>Bienvenidos a <strong>GarMorel</strong><br />Iniciando sistema...</p>
  </div>
</body>
</html>