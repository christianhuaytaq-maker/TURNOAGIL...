<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla Pública - Municipalidad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #0f172a; color: white; font-family: sans-serif; }
        .turno-grande { font-size: 12rem; font-weight: bold; line-height: 1; text-shadow: 0 0 20px rgba(59, 130, 246, 0.5); }
        .aviso-audio { position: absolute; bottom: 20px; color: #64748b; font-size: 0.9rem; }

        /* Animación para cuando cambie el turno */
        @keyframes pop {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); color: #60a5fa; }
            100% { transform: scale(1); }
        }
        .animate-pop { animation: pop 0.5s ease-in-out; }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen relative">

    <div class="text-center">
        <h1 class="text-4xl text-slate-400 mb-8 uppercase tracking-widest">Municipalidad de tu Ciudad</h1>

        <div class="bg-slate-800 p-12 rounded-3xl border border-slate-700 inline-block">
            <h2 class="text-2xl text-slate-400 mb-4">TURNO ACTUAL</h2>
            <div id="turno-actual" class="turno-grande text-blue-400">--</div>
            <div id="ventanilla-actual" class="text-3xl text-slate-300 mt-4 font-semibold"></div>
        </div>
    </div>

    <div class="aviso-audio" id="aviso-audio">🔊 Haga clic en la pantalla una vez para habilitar la voz.</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Desbloquear audio (Los navegadores exigen un clic)
            let audioDesbloqueado = false;
            document.body.addEventListener('click', function() {
                if(!audioDesbloqueado) {
                    let utterance = new SpeechSynthesisUtterance("Sistema de audio activado");
                    window.speechSynthesis.speak(utterance);
                    document.getElementById('aviso-audio').style.display = 'none';
                    audioDesbloqueado = true;
                }
            });

            // 2. Escuchar WebSocket
            if (typeof window.Echo === 'undefined') {
                console.error("❌ ERROR: window.Echo NO existe. Ejecuta 'npm run dev'.");
                return;
            }

            window.Echo.channel('pantalla-publica')
                .listen('.turno.llamado', (e) => {
                    console.log("✅ ¡Nuevo turno recibido!", e);

                    const turnoElement = document.getElementById('turno-actual');
                    const ventanillaElement = document.getElementById('ventanilla-actual');

                    // Detener cualquier voz que esté hablando antes de la nueva (por si llaman rápido)
                    window.speechSynthesis.cancel();

                    // Actualizar visualmente
                    turnoElement.innerText = e.turno.codigo;
                    turnoElement.classList.remove('animate-pop'); // Reiniciar animación
                    void turnoElement.offsetWidth; // Truco para reiniciar
                    turnoElement.classList.add('animate-pop');

                    // 3. Armar el texto para la voz
                    let ventanillaNumero = e.turno.ventanilla_id || "1";
                    ventanillaElement.innerText = "Ventanilla " + ventanillaNumero;

                    // Convertir "A-005" en "A, 0, 0, 5" para que la voz lo lea pausado
                    let codigoSeparado = e.turno.codigo.replace('-', ' ').split('').join(' ');

                    // Crear la frase natural: "Turno A cero cero cinco. Por favor, pase a la ventanilla número dos."
                    let mensaje = `Turno ${codigoSeparado}. Por favor, pase a la ventanilla número ${ventanillaNumero}.`;

                    let utterance = new SpeechSynthesisUtterance(mensaje);
                    utterance.lang = 'es-ES';
                    utterance.rate = 0.85; // Un poco más lento para que se entienda bien
                    utterance.pitch = 1;
                    utterance.volume = 1; // Volumen al máximo

                    // Reproducir voz
                    window.speechSynthesis.speak(utterance);
                });

            // Verificar conexión
            window.Echo.connector.pusher.connection.bind('connected', function() {
                console.log("✅ CONECTADO A REVERB");
            });
        });
    </script>
</body>
</html>
