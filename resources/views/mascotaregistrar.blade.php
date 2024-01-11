<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Nueva Mascota</title>
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
            background-color: #01A189;
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
            background-color: #018978;
            border-left: 3px solid white;
        }

        .header {
            background-color: #AC3B93;
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
        }

        .main-content h1 {
            margin: 0;
            padding-bottom: 20px;
            color: #01A189; /* Color verde actualizado */
        }

        .main-content {
            /* Estilos previos... */
            padding: 20px;
            margin-left: 250px; /* Ajuste para el sidebar */
            margin-top: 80px; /* Ajuste para el header */
        }
        .main-content h1 {
            color: #673AB7;
        }
        .main-content {
            /* Estilos previos... */
            padding: 20px;
            margin-left: 250px; /* Ajuste para el sidebar */
            margin-top: 80px; /* Ajuste para el header */
        }
        .form-container {
            background: white;
            padding: 20px;
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
        .form-field input, .form-field select, .form-field .checkbox-group {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-field .checkbox-group {
            display: flex;
            justify-content: space-between;
        }
        .form-field .checkbox-group label {
            flex: 1;
            margin: 0;
        }
        .form-button {
            background-color: #01A189;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
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
        <h2>Nueva Mascota</h2>
        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Nombre de la mascota">
        </div>
        <div class="form-field">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" placeholder="Apellido del dueño">
        </div>
        <div class="form-field">
            <label for="fecha-nacimiento">Fecha Nac.</label>
            <input type="date" id="fecha-nacimiento">
        </div>
        <div class="form-field">
            <label for="sexo">Sexo</label>
            <select id="sexo">
                <option value="macho">Macho</option>
                <option value="hembra">Hembra</option>
            </select>
        </div>
        <div class="form-field">
            <label for="especie">Especie</label>
            <select id="especie">
                <!-- Opciones de especies -->
            </select>
        </div>
        <div class="form-field">
            <label for="raza">Raza</label>
            <select id="raza">
                <!-- Opciones de razas -->
            </select>
        </div>
        <div class="form-field">
            <label>Está esterilizado</label>
            <input type="checkbox" id="esterilizado">
        </div>
        <div class="form-field">
            <label>Vacunas</label>
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" id="vacuna1"> Vacuna 1
                </label>
                <input type="date" id="fecha-vacuna1">
            </div>
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" id="vacuna2"> Vacuna 2
                </label>
                <input type="date" id="fecha-vacuna2">
            </div>
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" id="vacuna3"> Vacuna 3
                </label>
                <input type="date" id="fecha-vacuna3">
            </div>
        </div>
        <div class="form-field">
            <label>Alergias</label>
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" id="alergia1"> Alergia 1
                </label>
                <label>
                    <input type="checkbox" id="alergia2"> Alergia 2
                </label>
            </div>
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" id="alergia3"> Alergia 3
                </label>
                <label>
                    <input type="checkbox" id="alergia4"> Alergia 4
                </label>
            </div>
        </div>
        <button class="form-button" id="registerPetButton">Registrar</button>
    </div>
</div>

<script>
    document.querySelector('.menu-toggle').addEventListener('click', function () {
        var sidebar = document.querySelector('.sidebar');
        var header = document.querySelector('.header');
        var mainContent = document.querySelector('.main-content');
        if (sidebar.style.width === '250px') {
            sidebar.style.width = '0';
            header.style.width = '100%';
            mainContent.style.width = '100%';
        } else {
            sidebar.style.width = '250px';
            header.style.width = 'calc(100% - 250px)';
            mainContent.style.width = 'calc(100% - 250px)';
        }
    });

    // JavaScript para manejar el evento de registro
    document.getElementById('registerPetButton').addEventListener('click', function() {
        // Aquí puedes agregar la lógica para procesar y registrar la información de la mascota
        alert('Mascota registrada (aquí deberías implementar la lógica de registro).');
    });
</script>

</body>
</html>
