<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .register-card h3 {
        font-weight: 700;
        text-align: center;
        margin-bottom: 25px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
    }

    .btn-register {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        padding: 12px;
        font-weight: 600;
        border-radius: 10px;
    }

    .btn-register:hover {
        opacity: 0.9;
    }

    .login-link {
        text-align: center;
        margin-top: 15px;
    }

    .login-link a {
        text-decoration: none;
        font-weight: 600;
        color: #667eea;
    }
    </style>
</head>

<body>

    <div class="register-card">
        <h3>Login</h3>

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-register text-white">
                     Login
                </button>
            </div>

            
        </form>

    </div>

</body>

</html>