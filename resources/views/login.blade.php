<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - GarMorel</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <!-- Tailwind CDN (puedes quitar si usas tu CSS personalizado) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('login.css') }}">

</head>
<body class="flex items-center justify-center px-4 py-12">

  <div class="login-card text-center">
    <img src="{{ asset('IMG/logo01.png') }}" alt="Logo GarMorel" class="mx-auto mb-4 rounded-full w-40 h-40 object-cover ">
    <h1 class="text-2xl font-semibold text-gray-700 mb-6">GarMorel</h1>

    <form method="POST" action="{{ route('login.submit') }}" class="text-left">
      @csrf

      <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required class="form-input">
      @error('email')
        <span class="error">{{ $message }}</span>
      @enderror

      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Contraseña" required class="form-input pr-10">
        <span class="toggle" onclick="togglePassword()">👁️</span>
      </div>
      @error('password')
        <span class="error">{{ $message }}</span>
      @enderror

      <div class="flex items-center mb-4">
        <input type="checkbox" name="keep-session" id="keep-session" class="mr-2">
        <label for="keep-session" class="text-sm text-gray-600">Mantener sesión activa</label>
      </div>

      <a href="#" class="text-sm text-pink-600 hover:underline block mb-4">¿Olvidó su contraseña?</a>

      <button type="submit" class="btn">INICIAR SESIÓN</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const field = document.getElementById('password');
      field.type = field.type === 'password' ? 'text' : 'password';
    }
  </script>
</body>
</html>
