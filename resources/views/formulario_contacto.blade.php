<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Contacto</title>
    <style>
        body { 
            font-family: Arial; 
            background-color:#f0f4f8; 
            display:flex; 
            flex-direction: column;
            align-items:center; 
            min-height:100vh;
            padding: 20px 0;
        }
        .main-container {
            width: 90%;
            max-width: 800px;
        }
        .form-container { 
            background:#fff; 
            padding:40px 50px; 
            border-radius:10px; 
            box-shadow:0 8px 20px rgba(0,0,0,0.1); 
            width:100%;
            margin-bottom: 30px;
        }
        h1 { text-align:center; margin-bottom:30px; color:#333; }
        h2 { color:#444; margin-top: 40px; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        label { font-weight:bold; display:block; margin-top:20px; margin-bottom:5px; }
        input[type="text"], input[type="email"] { width:100%; padding:12px; font-size:16px; border-radius:6px; border:1px solid #ccc; box-sizing:border-box; }
        button { margin-top:30px; width:100%; padding:15px; font-size:18px; background:#007bff; color:#fff; border:none; border-radius:8px; cursor:pointer; transition:0.3s; }
        button:hover { background:#0056b3; }
        .success-message { text-align:center; color:green; font-weight:bold; margin-bottom:15px; }
        
        /* Estilos para la lista de contactos */
        .contactos-container {
            background:#fff; 
            padding:40px 50px; 
            border-radius:10px; 
            box-shadow:0 8px 20px rgba(0,0,0,0.1); 
            width:100%;
            margin-top: 20px;
        }
        .contacto-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .contacto-item:last-child {
            border-bottom: none;
        }
        .contacto-info {
            flex-grow: 1;
        }
        .contacto-nombre {
            font-weight: bold;
            color: #333;
            font-size: 18px;
        }
        .contacto-correo {
            color: #666;
            margin-top: 5px;
        }
        .contacto-id {
            background: #007bff;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            margin-right: 15px;
        }
        .empty-message {
            text-align: center;
            color: #888;
            font-style: italic;
            padding: 30px;
        }
        .contacto-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .total-contactos {
            background: #e922e2ff;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Formulario -->
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

        <!-- Lista de Contactos -->
        <div class="contactos-container">
            <div class="contacto-header">
                <h2>Contactos Registrados</h2>
                <span class="total-contactos">Total: {{ $contactos->count() }}</span>
            </div>
            
            @if($contactos->isEmpty())
                <p class="empty-message">No hay contactos registrados aún. ¡Sé el primero!</p>
            @else
                @foreach($contactos as $contacto)
                <div class="contacto-item">
                    <div class="contacto-info">
                        <div class="contacto-nombre">{{ $contacto->nombre }}</div>
                        <div class="contacto-correo">{{ $contacto->correo }}</div>
                    </div>
                    <span class="contacto-id">ID: {{ $contacto->id }}</span>
                </div>
                @endforeach
            @endif
            
            <div style="text-align: center; margin-top: 25px; color: #888; font-size: 14px;">
                Última actualización: {{ now()->format('d/m/Y H:i:s') }}
            </div>
        </div>

        
        <div style="background: #e8f4ff; padding: 20px; border-radius: 10px; margin-top: 30px; border-left: 5px solid #007bff;">
            <h3>🔄 Integración Continua (CI/CD)</h3>
            <p>Este cambio se implementó automáticamente mediante GitHub Actions después de un <code>git push</code>.</p>
            <p><strong>Flujo demostrado:</strong> Cambio local → Commit → Push → GitHub Action → Despliegue automático en Azure</p>
        </div>
    </div>
</body>
</html>