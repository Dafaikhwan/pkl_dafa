<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Autentikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .auth-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .auth-footer {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        @yield('content')
    </div>
</body>
</html>
