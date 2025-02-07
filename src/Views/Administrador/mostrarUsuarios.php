<style>
    /* Estilos para mostrarUsuarios */
    .panel-section {
        background-color: #222;
        color: #ddd;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: fit-content;
    }

    .panel-title {
        font-size: 24px;
        margin-bottom: 20px;
        color: white;
    }

    .section-title {
        font-size: 18px;
        margin-bottom: 10px;
        color: white;
    }

    /* Estilos para los botones */
    .btn {
        display: inline-block;
        padding: 8px 12px;
        background-color: #020405;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        margin-right: 10px;
    }

    .btn:hover {
        background-color: #333;
        text-decoration: none;
    }

    .cancel-btn {
        background-color: #dc3545;
    }

    .edit-btn {
        background-color: #28a745;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    /* Estilos para la tabla */
    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .user-table th,
    .user-table td {
        border: 1px solid #ccc;
        padding: 8px;
        color: white;
        text-align: center;
    }

    .user-table th {
        background-color: #000000;
        text-align: center;

    }

    /* Estilos para mensajes de error */
    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        font-size: 14px;
        text-align: center;
    }

    /* Estilos para mensaje de acceso denegado */
    .access-denied {
        font-size: 18px;
        color: #dc3545;
        margin-top: 20px;
    }
</style>

<div class="main-content">
    <section class="panel-section">
        <?php if (isset($_SESSION['inicioSesion']) && $_SESSION['inicioSesion']->rol === 'administrador') : ?>
            <h1 class="panel-title">Panel de administrador</h1>
            <h3 class="section-title">Gestión de usuarios</h3>
            <a class="btn" href="<?= BASE_URL ?>Usuario/registrarUsuarios">Registrar nuevo usuario</a>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo electrónico</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($mensajesError)) : ?>
                        <?php foreach ($mensajesError as $mensaje) : ?>
                            <tr>
                                <td colspan="6" class="error-message"><?= $mensaje; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <?php if ((isset($_GET['id'])) && $usuario['id'] == $_GET['id']) : ?>
                            <form action="<?= BASE_URL ?>Administrador/actualizarUsuario" method="POST">
                                <tr>
                                    <td><?= $usuario['id']; ?></td>
                                    <td><input type="text" name="datos[nombre]" value="<?= $usuario['nombre']; ?>"></td>
                                    <td><input type="text" name="datos[apellidos]" value="<?= $usuario['apellidos']; ?>"></td>
                                    <td><input type="email" name="datos[email]" value="<?= $usuario['email']; ?>"></td>
                                    <td>
                                        <select name="datos[rol]" id="rol" class="form-select">
                                            <option value="usuario" <?= $usuario['rol'] === 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                                            <option value="administrador" <?= $usuario['rol'] === 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="datos[id]" value="<?= $usuario['id']; ?>">
                                        <input type="submit" value="Guardar" class="btn">
                                        <a href="<?= BASE_URL ?>Administrador/mostrarUsuarios" class="btn cancel-btn">Cancelar</a>
                                    </td>
                                </tr>
                            </form>
                        <?php else : ?>
                            <tr>
                                <td><?= $usuario['id']; ?></td>
                                <td><?= $usuario['nombre']; ?></td>
                                <td><?= $usuario['apellidos']; ?></td>
                                <td><?= $usuario['email']; ?></td>
                                <td><?= $usuario['rol']; ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>Administrador/editarUsuario/?id=<?= $usuario['id']; ?>" class="btn edit-btn">Editar</a>
                                    <a href="<?= BASE_URL ?>Administrador/eliminarUsuario/?id=<?= $usuario['id']; ?>" class="btn delete-btn">Eliminar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <h1 class="access-denied">Lo sentimos, no tienes permisos para acceder a esta página</h1>
        <?php endif; ?>
    </section>
</div>