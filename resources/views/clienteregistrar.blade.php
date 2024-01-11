<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 250px;
            background-color: #01A189; /* Color verde actualizado */
            color: white;
            height: 100vh;
            padding: 10px;
            position: fixed;
        }

        .sidebar img {
            max-width: 100%;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
            border-left: 3px solid transparent;
        }

        .sidebar ul li:hover {
            background-color: #018978; /* Tono más oscuro para el hover */
            border-left: 3px solid white;
        }

        .header {
            width: 100%;
            background-color: white;
            border-bottom: 3px solid #AC3B93;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            box-sizing: border-box;
            margin-left: 250px;
        }

        .header .menu-toggle {
            cursor: pointer;
        }

        .header .user-info:hover .user-menu {
            display: block;
        }

        .user-info {
            position: relative;
        }

        .user-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #AC3B93; /* Color morado actualizado */
            border: 1px solid #9A2B88; /* Borde más oscuro para el menú */
            border-radius: 4px;
        }

        .user-menu li {
            padding: 10px;
            cursor: pointer;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #FAFAFA;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .main-content h1 {
            margin: 0;
            padding-bottom: 20px;
            color: #01A189; /* Color verde actualizado */
        }

        .form-container {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-field {
            margin-bottom: 10px;
        }

        .form-field label {
            display: block;
            margin-bottom: 5px;
        }

        .form-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-button {
            background-color: #01A189;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="https://res.cloudinary.com/dmaoa8dcd/image/upload/v1704759687/Appomsv/Logo1_vai81d.png" alt="Logo">
    <ul>
        <li>Citas</li>
        <li>Clientes</li>
        <li>Mascotas</li>
    </ul>
</div>

<div class="header">
    <span class="menu-toggle">&#9776;</span>
    <div class="user-info">
        <span>Nombre Perfil</span>
        <ul class="user-menu">
            <li>Cerrar sesión</li>
        </ul>
    </div>
</div>

<div class="main-content">
    <div class="form-container">
        <h2>Nuevo Cliente</h2>
        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Nombre">
        </div>
        <div class="form-field">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" placeholder="Apellido">
        </div>
        <div class="form-field">
            <label for="tipo-documento">Tipo de documento</label>
            <select id="tipo-documento">
                <option value="dni">DNI</option>
                <option value="carnet-extranjeria">Carnet de Extranjería</option>
                <!-- Más opciones si son necesarias -->
            </select>
        </div>
        <div class="form-field">
            <label for="documento">Documento</label>
            <input type="text" id="documento" placeholder="Documento">
        </div>
        <div class="form-field">
            <label for="celular">Celular</label>
            <input type="tel" id="celular" placeholder="Celular">
        </div>
        <div class="form-field">
            <label for="fijo">Fijo</label>
            <input type="tel" id="fijo" placeholder="Fijo">
        </div>
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email">
        </div>
        <button class="form-button" id="registerButton">Registrar</button>
    </div>
</div>

<script>
    // JavaScript para manejar el evento de registro
    document.getElementById('registerButton').addEventListener('click', function () {
        // Aquí puedes agregar la lógica para procesar y registrar la información
        alert('Cliente registrado (aquí deberías implementar la lógica de registro).');
    });
</script>

</body>
</html>
