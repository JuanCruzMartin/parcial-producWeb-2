<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión — Servicio Técnico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                linear-gradient(135deg, rgba(10,10,30,0.93) 0%, rgba(5,5,20,0.96) 100%),
                url('https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=1920&q=80') center/cover fixed;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            padding: 40px;
        }
        .login-logo { text-align: center; margin-bottom: 30px; }
        .login-logo .icon-wrap {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, #4fc3f7, #0288d1);
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #fff;
            box-shadow: 0 8px 25px rgba(79,195,247,0.4);
            margin-bottom: 14px;
        }
        .login-logo h4 { color: #fff; font-weight: 800; font-size: 1.3rem; margin: 0; }
        .login-logo p { color: rgba(255,255,255,0.4); font-size: .85rem; margin: 4px 0 0; }
        .form-label {
            font-weight: 600; font-size: .82rem;
            color: rgba(255,255,255,0.6);
            text-transform: uppercase; letter-spacing: .5px; margin-bottom: 7px;
        }
        .form-control {
            background: rgba(255,255,255,0.07);
            border: 1.5px solid rgba(255,255,255,0.12);
            border-radius: 10px; color: #fff; padding: 12px 14px;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.25); }
        .form-control:focus {
            background: rgba(255,255,255,0.1);
            border-color: #4fc3f7;
            box-shadow: 0 0 0 3px rgba(79,195,247,0.2);
            color: #fff;
        }
        .input-group-text {
            background: rgba(255,255,255,0.07);
            border: 1.5px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.4);
        }
        .btn-login {
            background: linear-gradient(135deg, #4fc3f7, #0288d1);
            border: none; color: #fff; font-weight: 700; font-size: 1rem;
            border-radius: 10px; padding: 13px; width: 100%;
            box-shadow: 0 4px 15px rgba(79,195,247,0.35);
            transition: all .25s;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(79,195,247,0.5); color: #fff; }
        .form-check-label { color: rgba(255,255,255,0.5); font-size: .85rem; }
        .form-check-input { background-color: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); }
        .form-check-input:checked { background-color: #0288d1; border-color: #0288d1; }
        .alert-danger {
            background: rgba(239,83,80,0.15);
            border: 1px solid rgba(239,83,80,0.3);
            border-left: 4px solid #ef5350;
            color: #ef9a9a; border-radius: 10px; font-size: .88rem;
        }
    </style>
</head>
<body>
<div class="login-card">

    <div class="login-logo">
        <div class="icon-wrap"><i class="bi bi-phone-fill"></i></div>
        <h4>Servicio <span style="color:#4fc3f7">Técnico</span></h4>
        <p>Iniciá sesión para continuar</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" placeholder="tu@email.com" required autofocus>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Contraseña</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control"
                       placeholder="••••••••" required>
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Recordarme</label>
            </div>
        </div>

        <button type="submit" class="btn-login">
            <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
        </button>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
