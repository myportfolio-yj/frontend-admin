<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            height: 100vh;
            margin: 0;
            background-size: 100%;
            background-image: linear-gradient(to right, #01A189, #AC3B93);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            width: 80%;
            background: #FCFCFA;
            border-radius: 20px;
            display: flex;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .form-container, .image-container {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .form-container form input, .form-container form button {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-radius: 4px;
        }

        .form-container form button {
            background: #01A189;
            color: white;
        }

        .form-container a {
            color: #01A189;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="form-container">
        <img src="https://res.cloudinary.com/dmaoa8dcd/image/upload/v1704759687/Appomsv/Logo1_vai81d.png" alt="Logo">
        <form method="POST" action="{{ route('ingresar') }}" role="form">
            @csrf
            <input type="email" name="email" placeholder="Correo">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Ingresar</button>
        </form>
        <a href="#">Olvidé mi contraseña</a>
    </div>
    <div class="image-container">
        <img src="https://res.cloudinary.com/dmaoa8dcd/image/upload/v1704858464/Appomsv/imagen_login1_byrmfw.png"
             alt="Imagen">
    </div>
</div>
</body>
</html>
