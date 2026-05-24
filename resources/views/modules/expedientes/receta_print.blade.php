<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Receta Médica - {{ $mascota->nombre }}</title>
    <!-- Incluir Bootstrap solo para estilos básicos de impresión -->
    <link href="{{ asset('startbootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('startbootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: #000;
            padding: 40px;
            font-family: 'Nunito', sans-serif;
        }
        .receta-header {
            border-bottom: 2px solid #4e73df;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo-placeholder {
            width: 80px;
            height: 80px;
            background-color: #4e73df;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
        .clinic-info h2 {
            margin: 0;
            color: #4e73df;
            font-weight: 800;
        }
        .clinic-info p {
            margin: 0;
            font-size: 0.9rem;
            color: #555;
        }
        .info-box {
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f8f9fc;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 250px;
            margin: 80px auto 10px auto;
            text-align: center;
            padding-top: 5px;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.04;
            font-size: 25rem;
            z-index: -1;
        }
        
        /* Ocultar elementos en la impresión que no sean la receta */
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="text-right mb-4 no-print">
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print mr-2"></i>Imprimir Ahora</button>
        <button onclick="window.close()" class="btn btn-secondary ml-2"><i class="fas fa-times mr-2"></i>Cerrar</button>
    </div>

    <!-- Watermark -->
    <div class="watermark"><i class="fas fa-paw"></i></div>

    <!-- Header -->
    <div class="row receta-header align-items-center">
        <div class="col-2 text-center">
            <div class="logo-placeholder mx-auto">
                <i class="fas fa-paw"></i>
            </div>
        </div>
        <div class="col-6 clinic-info">
            <h2>VETERINARIA</h2>
            <p>Atención médica integral para tu mascota</p>
            <p><i class="fas fa-map-marker-alt mr-1"></i> Av. Principal #123, Centro</p>
            <p><i class="fas fa-phone mr-1"></i> (555) 123-4567</p>
        </div>
        <div class="col-4 text-right">
            <h4 class="text-gray-800 font-weight-bold mb-1">RECETA MÉDICA</h4>
            <p class="mb-0"><strong>Folio:</strong> #{{ str_pad($consulta->id, 5, '0', STR_PAD_LEFT) }}</p>
            <p class="mb-0"><strong>Fecha:</strong> {{ $consulta->fecha_consulta->format('d/m/Y') }}</p>
        </div>
    </div>

    <!-- Datos del Paciente -->
    <div class="info-box">
        <div class="row">
            <div class="col-6">
                <p class="mb-1"><strong>Paciente:</strong> {{ $mascota->nombre }}</p>
                <p class="mb-1"><strong>Especie/Raza:</strong> {{ $mascota->especie }} / {{ $mascota->raza ?? 'N/A' }}</p>
                <p class="mb-0"><strong>Peso:</strong> {{ $consulta->peso }} kg &nbsp;&nbsp;|&nbsp;&nbsp; <strong>Talla:</strong> {{ $consulta->talla }} cm</p>
            </div>
            <div class="col-6">
                <p class="mb-1"><strong>Propietario:</strong> {{ $mascota->dueno->nombre_completo ?? 'N/A' }}</p>
                <p class="mb-1"><strong>Teléfono:</strong> {{ $mascota->dueno->telefono ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    <!-- Contenido de la Receta (Tratamiento) -->
    <div class="mt-5 mb-5" style="min-height: 400px;">
        <h5 class="font-weight-bold text-primary border-bottom pb-2 mb-4"><i class="fas fa-prescription mr-2"></i>Tratamiento Indicado:</h5>
        
        <div class="tratamiento-content text-gray-900" style="font-size: 1.1rem; line-height: 1.6;">
            {!! $consulta->tratamiento !!}
        </div>
    </div>

    <!-- Firma -->
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div class="signature-line">
                <p class="mb-0 font-weight-bold">MVZ. {{ $consulta->veterinario->user->name ?? 'Firma del Médico' }}</p>
            </div>
        </div>
    </div>

    <script>
        // Trigger print dialog automatically when loaded
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
