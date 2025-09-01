<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, rgb(224, 203, 170) 0%, rgb(208, 241, 118) 100%);
            background-image: url('https://hips.hearstapps.com/hmg-prod/images/elle-los-angeles02-1559906859.jpg');
            background-size: cover;
            background-position: center;
             background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        nav {
            display: none !important;
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
             border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: rgb(10, 130, 216);
            margin-bottom: 1.8rem;
            text-align: center;
            font-weight: 600;
        }

        

        .input-group {
          
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: rgb(103, 150, 198);
            font-weight: 500;
             text-align: center;
             width: 100%;
        }

        input {
            width: 90%;
            padding: 12px 15px;
            border: 2px solid #dfe6e9;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.3s;
     
        }

        input:focus {
            outline: none;
            border-color: #3498db;
        }

        .login-btn {
            width: 90%;
            padding: 12px;
            background: linear-gradient(135deg, rgb(114, 165, 232) 0%, rgb(3, 62, 122) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.1rem;
            transition: transform 0.2s, box-shadow 0.2s;
          
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(2, 59, 36, 0.4);
        }

        .divider {
            margin: 1.8rem 0;
            border-top: 1px solid #ecf0f1;
            position: relative;
        }

        .divider::after {
            content: "o";
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 0 10px;
            color: #7f8c8d;
        }

        .footer-links {
            margin-top: 1.5rem;
        }

        .footer-links a {
            color: #348adbff;
            text-decoration: none;
            font-size: 0.9rem;
            margin: 0 8px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #2c3e50;
            text-decoration: underline;
        }
    </style>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <div class="login-container">
        <img src="view/img/iicono.jpeg" alt="" height="100" width="100">
        <h1>Iniciar sesión</h1>

        <form id="frm_login">
            <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>


            <button type="button" class="login-btn" onclick="iniciar_sesion();">Ingresar</button>
        </form>

        <div class="divider"></div>

        <div class="footer-links">
            <a href="#">Crear una cuenta</a>
            <a href="#">¿Olvidaste tu contraseña?</a>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>view/function/user.js"></script>

</body>

</html>