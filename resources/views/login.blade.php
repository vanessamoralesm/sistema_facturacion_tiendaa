<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <link rel="stylesheet" href="{{ asset('style.css') }}"> {{-- Ruta al CSS --}}
  <title>Login - GarMorel</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="login-container">
    <img src="{{ asset('IMG/logo00.jpg') }}" alt="moda Logo" height="250" width="250">
    <h1>GarMorel</h1>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required> <!-- Cambia 'correo' por 'email' -->
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <div class="show-password">
            <input type="password" name="password" id="password" placeholder="Contraseña" value="" required>
            <span class="toggle" onclick="togglePassword()">👁️</span>
        </div>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    
        <div class="checkbox-container">
            <input type="checkbox" name="keep-session" id="keep-session">
            <label for="keep-session">Mantener sesión activa</label>
        </div>
        <a href="#" class="forgot">¿Olvidó su contraseña?</a>
        <button type="submit" class="btn">INICIAR SESIÓN</button>
    </form>
    
  </div>

  <script>
    function togglePassword() {
        const passField = document.getElementById("password");
        passField.type = passField.type === "password" ? "text" : "password";
    }
  </script>

</body>
</html>
