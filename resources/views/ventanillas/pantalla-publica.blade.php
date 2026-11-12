<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla Pública - Municipalidad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { background-color: #0f172a; color: white; font-family: sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .titulo { font-size: 3rem; color: #94a3b8; margin-bottom: 2rem; text-transform: uppercase; letter-spacing: 5px; }
        .tarjeta-turno { background-color: #1e293b; border-radius: 20px; padding: 4rem; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.5); border: 1px solid #334155; min-width: 400px;}
        .subtitulo { font-size: 1.5rem; color: #cbd5e1; margin-bottom: 2rem; text-transform: uppercase; }
        #turno-actual { font-size: 6rem; font-weight: bold; color: #38bdf8; text-shadow: 0 0 20px rgba(56, 189, 248, 0.5); }
        #ventanilla-actual { font-size: 2rem; color: #94a3b8; margin-top: 1rem; }
    </style>
</head>
<body>

    <div class="titulo">MUNICIPALIDAD DE TU CIUDAD</div>

    <div class="tarjeta-turno">
        <div class="subtitulo">TURNO ACTUAL</div>
        <div id="turno-actual">--</div>
        <div id="ventanilla-actual"></div>
    </div>

    <script type="module">
        // Esperamos un momento a que Echo esté disponible
        setTimeout(() => {
            if (window.Echo) {
                console.log('✅ Echo conectado. Escuchando canal: pantalla-publica');

                window.Echo.channel('pantalla-publica')
                    .listen('.turno.llamado', (e) => {
                        console.log('🎉 ¡Evento recibido!', e);

                        const turnoElement = document.getElementById('turno-actual');
                        const ventanillaElement = document.getElementById('ventanilla-actual');

                        if (turnoElement && e.turno) {
                            turnoElement.innerText = e.turno.codigo;

                            // Si no viene ventanilla_id, mostramos un texto genérico
                            if(e.turno.ventanilla_id) {
                                ventanillaElement.innerText = 'Ventanilla: V0' + e.turno.ventanilla_id;
                            } else {
                                ventanillaElement.innerText = 'Por favor, acérquese a su ventanilla';
                            }
                        }
                    });
            } else {
                console.error('❌ Echo no está cargado. Revisa npm run dev y bootstrap.js');
            }
        }, 500); // Espera medio segundo
    </script>
</body>
</html>
