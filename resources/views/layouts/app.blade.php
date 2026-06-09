<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio Técnico de Celulares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }

        body {
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(10,10,30,0.92) 0%, rgba(5,5,20,0.95) 100%),
                url('https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=1920&q=80') center/cover fixed;
            color: #e0e0e0;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: rgba(255,255,255,0.04) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 14px 0;
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff !important;
            letter-spacing: .5px;
        }
        .navbar-brand .brand-accent { color: #4fc3f7; }
        .btn-nav-new {
            background: linear-gradient(135deg, #4fc3f7, #0288d1);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            padding: 9px 20px;
            transition: all .25s;
            box-shadow: 0 4px 15px rgba(79,195,247,0.3);
        }
        .btn-nav-new:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79,195,247,0.5);
            color: #fff;
        }

        /* ── GLASS CARD ── */
        .glass {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        }
        .glass-header {
            border-radius: 18px 18px 0 0 !important;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 20px 26px;
        }
        .glass-body { padding: 28px; }
        .glass-footer {
            border-top: 1px solid rgba(255,255,255,0.08);
            border-radius: 0 0 18px 18px !important;
            padding: 16px 26px;
            background: rgba(0,0,0,0.15);
        }

        /* ── STAT CARDS ── */
        .stat-card {
            border-radius: 16px;
            padding: 20px 24px;
            position: relative;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s;
            cursor: default;
        }
        .stat-card:hover {
            transform: translateY(-4px);
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: -30px; right: -30px;
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }
        .stat-card .stat-num {
            font-size: 2.4rem;
            font-weight: 800;
            line-height: 1;
            color: #fff;
        }
        .stat-card .stat-label {
            font-size: .82rem;
            color: rgba(255,255,255,0.75);
            margin-top: 5px;
            font-weight: 500;
        }
        .stat-card .stat-icon {
            font-size: 2rem;
            opacity: .25;
            position: absolute;
            bottom: 12px; right: 16px;
        }

        /* ── TABLE ── */
        .glass-table thead th {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.6);
            font-size: .78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .8px;
            padding: 14px 16px;
            border: none;
        }
        .glass-table tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background .15s;
        }
        .glass-table tbody tr:hover {
            background: rgba(255,255,255,0.05);
        }
        .glass-table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border: none;
            color: #ddd;
        }

        /* ── BADGES ── */
        .badge-estado {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: .78rem;
            font-weight: 600;
            letter-spacing: .3px;
        }
        .estado-ingresado  { background: rgba(33,150,243,0.2);  color: #64b5f6; border: 1px solid rgba(33,150,243,0.3); }
        .estado-reparacion { background: rgba(255,152,0,0.2);   color: #ffb74d; border: 1px solid rgba(255,152,0,0.3); }
        .estado-reparado   { background: rgba(76,175,80,0.2);   color: #81c784; border: 1px solid rgba(76,175,80,0.3); }
        .estado-entregado  { background: rgba(156,39,176,0.2);  color: #ce93d8; border: 1px solid rgba(156,39,176,0.3); }

        /* ── ACTION BUTTONS ── */
        .btn-accion {
            width: 34px; height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: .95rem;
            transition: all .15s;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            color: #ccc;
        }
        .btn-accion:hover { transform: translateY(-2px); background: rgba(255,255,255,0.15); color: #fff; }

        /* ── FORMS ── */
        .form-control, .form-select {
            background: rgba(255,255,255,0.07);
            border: 1.5px solid rgba(255,255,255,0.12);
            border-radius: 10px;
            color: #fff;
            padding: 11px 14px;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .form-control:focus, .form-select:focus {
            background: rgba(255,255,255,0.1);
            border-color: #4fc3f7;
            box-shadow: 0 0 0 3px rgba(79,195,247,0.2);
            color: #fff;
        }
        .form-select option { background: #1a1a2e; color: #fff; }
        .form-label {
            font-weight: 600;
            font-size: .85rem;
            color: rgba(255,255,255,0.7);
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        .input-group-text {
            background: rgba(255,255,255,0.07);
            border: 1.5px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.5);
        }

        /* ── ALERT ── */
        .alert-success {
            background: rgba(76,175,80,0.15);
            border: 1px solid rgba(76,175,80,0.3);
            border-left: 4px solid #4caf50;
            color: #81c784;
            border-radius: 12px;
        }

        /* ── DETAIL BOXES ── */
        .detail-box {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            padding: 16px 20px;
        }
        .detail-box .detail-label {
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: rgba(255,255,255,0.4);
            margin-bottom: 6px;
        }
        .detail-box .detail-value {
            font-size: 1.05rem;
            font-weight: 500;
            color: #fff;
        }

        /* ── PAGE TITLE ── */
        .page-title { font-size: 1.5rem; font-weight: 700; color: #fff; }
        .page-subtitle { color: rgba(255,255,255,0.4); font-size: .88rem; }

        /* ── BACK LINK ── */
        .back-link { color: rgba(255,255,255,0.5); text-decoration: none; font-size: .9rem; transition: color .2s; }
        .back-link:hover { color: #4fc3f7; }

        /* ── EMPTY STATE ── */
        .empty-state i { font-size: 3.5rem; color: rgba(255,255,255,0.15); }
        .empty-state p { color: rgba(255,255,255,0.4); }

        /* scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 3px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('reparaciones.index') }}">
            <i class="bi bi-phone-fill me-2" style="color:#4fc3f7"></i>
            Servicio <span class="brand-accent">Técnico</span>
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
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
