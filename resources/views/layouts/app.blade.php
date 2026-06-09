<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio Técnico de Celulares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }

        body {
            background: #f0f2f5;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%) !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.3);
            padding: 14px 0;
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #fff !important;
        }
        .navbar-brand span {
            color: #4fc3f7;
        }
        .btn-nav-new {
            background: linear-gradient(135deg, #4fc3f7, #0288d1);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 8px 18px;
            transition: all .2s;
        }
        .btn-nav-new:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79,195,247,0.4);
            color: #fff;
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }
        .card-header {
            border-radius: 16px 16px 0 0 !important;
            padding: 18px 24px;
            border-bottom: none;
        }
        .card-body { padding: 28px; }
        .card-footer {
            background: #f8f9fa;
            border-radius: 0 0 16px 16px !important;
            padding: 16px 24px;
            border-top: 1px solid #eee;
        }

        /* TABLE */
        .table thead th {
            background: #1a1a2e;
            color: #fff;
            font-weight: 600;
            font-size: .85rem;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 14px 16px;
            border: none;
        }
        .table tbody tr {
            transition: background .15s;
        }
        .table tbody tr:hover {
            background: #e8f4fd;
        }
        .table tbody td {
            padding: 13px 16px;
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        /* BADGES */
        .badge-estado {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: .8rem;
            font-weight: 600;
        }
        .estado-ingresado    { background: #e3f2fd; color: #1565c0; }
        .estado-reparacion   { background: #fff8e1; color: #e65100; }
        .estado-reparado     { background: #e8f5e9; color: #2e7d32; }
        .estado-entregado    { background: #f3e5f5; color: #6a1b9a; }

        /* BUTTONS */
        .btn-accion {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: .95rem;
            transition: all .15s;
        }
        .btn-accion:hover { transform: translateY(-1px); }

        /* FORM */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid #e0e0e0;
            padding: 10px 14px;
            font-size: .95rem;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4fc3f7;
            box-shadow: 0 0 0 3px rgba(79,195,247,0.15);
        }
        .form-label {
            font-weight: 600;
            font-size: .88rem;
            color: #444;
            margin-bottom: 6px;
        }

        /* ALERT */
        .alert-success {
            background: #e8f5e9;
            border: none;
            border-left: 4px solid #43a047;
            color: #2e7d32;
            border-radius: 10px;
            font-weight: 500;
        }

        /* PAGE TITLE */
        .page-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1a1a2e;
        }
        .page-subtitle {
            color: #888;
            font-size: .9rem;
        }

        /* STATS CARDS */
        .stat-card {
            border-radius: 14px;
            padding: 18px 22px;
            color: #fff;
            font-weight: 600;
        }
        .stat-card .stat-num {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }
        .stat-card .stat-label {
            font-size: .82rem;
            opacity: .85;
            margin-top: 4px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('reparaciones.index') }}">
            <i class="bi bi-phone-fill me-2" style="color:#4fc3f7"></i>
            Servicio <span>Técnico</span>
        </a>
        <a href="{{ route('reparaciones.create') }}" class="btn btn-nav-new ms-auto">
            <i class="bi bi-plus-lg me-1"></i> Nueva Reparación
        </a>
    </div>
</nav>

<div class="container pb-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
