<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Cliente</title>
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
        .client-details, .pet-list {
            background: white;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .client-details h2, .pet-list h2 {
            color: #673AB7;
        }
        .client-details table, .pet-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .client-details td, .pet-list td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .client-details label, .pet-list label {
            font-weight: bold;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .action-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit-button {
            background-color: #4CAF50;
            color: white;
        }
        .new-pet-button {
            background-color: #01A189;
            color: white;
        }
        .view-button {
            background-color: #AC3B93;
            color: white;
        }
        .delete-button {
            background-color: #FF0000;
            color: white;
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
    <div class="client-details">
        <h2>Detalle Cliente</h2>
        <table>
            <tr>
                <td><label>Nombre:</label></td>
                <td>Pedro</td>
            </tr>
            <tr>
                <td><label>Apellido:</label></td>
                <td>Díaz</td>
            </tr>
            <tr>
                <td><label>DNI:</label></td>
                <td>xxxxxxxx</td>
            </tr>
            <tr>
                <td><label>Fijo:</label></td>
                <td>123456789</td>
            </tr>
            <tr>
                <td><label>Celular:</label></td>
                <td>987654321</td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td>pedro@db.com</td>
            </tr>
        </table>
        <div class="action-buttons">
            <button class="edit-button">Editar</button>
        </div>
    </div>

    <div class="pet-list">
        <h2>Mascotas</h2>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>CodIdent</th>
                <th>Nombres</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>C101</td>
                <td>Cloe Jiménez</td>
                <td class="action-buttons">
                    <button class="view-button">Ver</button>
                    <button class="delete-button">Eliminar</button>
                </td>
            </tr>
            <!-- Más filas pueden ser agregadas aquí -->
            </tbody>
        </table>
        <div class="action-buttons">
            <button class="new-pet-button">Nueva Mascota</button>
        </div>
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

    // JavaScript para manejar eventos de botones
    document.querySelector('.edit-button').addEventListener('click', function() {
        // Aquí puedes agregar la lógica para editar los detalles del cliente
        alert('Editar detalles del cliente.');
    });

    document.querySelector('.new-pet-button').addEventListener('click', function() {
        // Aquí puedes agregar la lógica para registrar una nueva mascota
        alert('Registrar nueva mascota.');
    });

    document.querySelectorAll('.view-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para ver los detalles de la mascota
            alert('Ver detalles de la mascota.');
        });
    });

    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para eliminar una mascota
            alert('Eliminar mascota.');
        });
    });
</script>

</body>
</html>
