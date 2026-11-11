<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla Pública - Municipalidad</title>
    <!-- Importante: Vite carga el app.js aquí -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #0f172a; color: white; font-family: sans-serif; }
        .turno-grande { font-size: 12rem; font-weight: bold; line-height: 1; text-shadow: 0 0 20px rgba(59, 130, 246, 0.5); }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen">

    <div class="text-center">
        <h1 class="text-4xl text-slate-400 mb-8 uppercase tracking-widest">Municipalidad de tu Ciudad</h1>

        <div class="bg-slate-800 p-12 rounded-3xl border border-slate-700 inline-block">
            <h2 class="text-2xl text-slate-400 mb-4">TURNO ACTUAL</h2>
            <div id="turno-actual" class="turno-grande text-blue-400">--</div>
        </div>

        <audio id="campana" src="https://actions.google.com/sounds/v1/alarms/beep_short.ogg" preload="auto"></audio>
    </div>

    <!-- Script de WebSockets -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("1. La página cargó. Revisando si Echo existe...");

            if (typeof window.Echo === 'undefined') {
                console.error("❌ ERROR: window.Echo NO existe. Vite no cargó el app.js correctamente. Ejecuta 'npm run build' y recarga.");
                return;
            }

            console.log("2. Echo existe. Intentando conectar al canal 'pantalla-publica'...");

            window.Echo.channel('pantalla-publica')
                .listen('NuevoTurnoGenerado', (e) => {
                    console.log("✅ ¡Nuevo turno recibido del servidor!", e.turno);

                    // Actualizamos el número gigante en la pantalla
                    document.getElementById('turno-actual').innerText = e.turno.codigo;

                    // Hacemos sonar la campanita
                    document.getElementById('campana').play().catch(() => {
                        console.log("🔇 No se pudo reproducir el sonido automáticamente (bloqueo del navegador).");
                    });
                });

            // Verificar estado de conexión de Reverb
            window.Echo.connector.pusher.connection.bind('connected', function() {
                console.log("3. ✅ CONECTADO EXITOSAMENTE A REVERB (WebSockets)");
            });

            window.Echo.connector.pusher.connection.bind('error', function(err) {
                console.error("❌ ERROR DE CONEXIÓN A REVERB:", err);
            });
        });
    </script>
</body>
</html>
