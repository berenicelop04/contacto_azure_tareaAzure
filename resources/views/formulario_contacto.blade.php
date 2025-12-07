<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Contacto</title>
    <style>
        body { font-family: Arial; background-color:#f0f4f8; display:flex; justify-content:center; align-items:center; height:100vh; }
        .form-container { background:#fff; padding:40px 50px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.1); width:400px; }
        h1 { text-align:center; margin-bottom:30px; color:#333; }
        label { font-weight:bold; display:block; margin-top:20px; margin-bottom:5px; }
        input[type="text"], input[type="email"] { width:100%; padding:12px; font-size:16px; border-radius:6px; border:1px solid #ccc; box-sizing:border-box; }
        button { margin-top:30px; width:100%; padding:15px; font-size:18px; background:#007bff; color:#fff; border:none; border-radius:8px; cursor:pointer; transition:0.3s; }
        button:hover { background:#0056b3; }
        .success-message { text-align:center; color:green; font-weight:bold; margin-bottom:15px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Formulario de Contacto</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form method="POST" action="/save">
            @csrf
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Escribe tu nombre" required>

            <label>Correo:</label>
            <input type="email" name="correo" placeholder="Escribe tu correo" required>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
