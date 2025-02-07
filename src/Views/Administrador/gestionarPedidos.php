<style>
    .admin-section {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background-color: #333;
        /* Cambiado a fondo oscuro */
        color: white;
        /* Cambiado a texto blanco */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Actualizado para que coincida con el estilo */
    }

    .admin-section h1 {
        color: #ff9900;
        /* Cambiado a color naranja */
        text-align: center;
    }

    .error-message {
        color: #ff4c4c;
        /* Cambiado a color rojo */
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 15px;
        /* Cambiado a padding más grande */
        text-align: left;
        border-bottom: 1px solid #555;
        /* Cambiado a color de borde oscuro */
    }

    th {
        background-color: #444;
        /* Cambiado a fondo oscuro */
        color: #ff9900;
        /* Cambiado a color naranja */
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #444;
        /* Cambiado a fondo oscuro */
    }

    .alert_red {
        color: #ff4c4c;
        /* Cambiado a color rojo */
        font-weight: bold;
        text-align: center;
        display: block;
        margin-top: 20px;
    }

    .action-links a {
        margin-right: 10px;
        color: #ff9900;
        /* Cambiado a color naranja */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .action-links a:hover {
        color: #ffd700;
        /* Cambiado a color dorado */
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        padding: 8px 16px;
        background-color: #ff9900;
        /* Cambiado a color naranja */
        color: white;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #ffd700;
        /* Cambiado a color dorado */
    }

    a {
        text-decoration: none;
        color: #ff9900;
        /* Cambiado a color naranja */
    }

    td {
        text-align: center;
    }


</style>

<?php if (($_SESSION['inicioSesion']->rol === 'administrador') && (isset($_SESSION['inicioSesion']))) : ?>

    <section class="admin-section">
        <h1>Gestionar Pedidos</h1>

        <?php if (isset($mensajesError)) : ?>
            <?php foreach ($mensajesError as $mensaje) : ?>
                <p class="error-message"><?= htmlspecialchars($mensaje); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['inicioSesion']) && $pedidos >= 1) : ?>
            <table>
                <thead>
                    <th>Id</th>
                    <th>Coste</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>ID Usuario</th>
                    <th>Confirmar Pedido</th>
                    <th>Opciones</th>
                </thead>
                <?php foreach ($pedidos as $pedido) : ?>
                    <?php if ((isset($_GET['id'])) && ($_GET['id'] == $pedido['id'])) : ?>
                        <tr>
                            <form action="<?= htmlspecialchars(BASE_URL . 'Administrador/actualizar') ?>" method="post">
                                <td><input type="text" name="datos[id]" value="<?= htmlspecialchars($pedido['id']) ?>"></td>
                                <td><input type="text" name="datos[coste]" value="<?= htmlspecialchars($pedido['coste']) ?>"></td>
                                <td><input type="text" name="datos[fecha]" value="<?= htmlspecialchars($pedido['fecha']) ?>"></td>
                                <td><input type="text" name="datos[hora]" value="<?= htmlspecialchars($pedido['hora']) ?>"></td>
                                <td>
                                    <select name="datos[estado]">
                                        <option value="pendiente" <?= $pedido['estado'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                        <option value="confirmado" <?= $pedido['estado'] === 'confirmado' ? 'selected' : '' ?>>Confirmado</option>
                                    </select>
                                </td>
                                <td><input type="text" name="datos[usuario_id]" value="<?= htmlspecialchars($pedido['usuario_id']) ?>"></td>
                                <td>
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($pedido['id']) ?>">
                                    <input type="submit" value="Guardar">
                                </td>
                            </form>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td><a href="<?= htmlspecialchars(BASE_URL . 'Pedido/verPedido/?id=' . $pedido['id']) ?>"><?= htmlspecialchars($pedido['id']) ?></a></td>
                            <td><?= htmlspecialchars($pedido['coste']) ?>€</td>
                            <td><?= htmlspecialchars($pedido['fecha']) ?></td>
                            <td><?= htmlspecialchars($pedido['hora']) ?></td>
                            <td><?= htmlspecialchars($pedido['estado']) ?></td>
                            <td><?= htmlspecialchars($pedido['usuario_id']) ?></td>
                            <?php if($pedido['estado'] === 'Pendiente a confirmar') : ?>
                            <td><a href="<?= BASE_URL ?>Administrador/confirmarPedido/?id=<?= $pedido['id'] ?>">Confirmar pedido</a></td>
                            <?php else: ?>
                                <td>El pedido ya ha sido confirmado</td>
                            <?php endif; ?>

                            <td class="action-links">
                                <?php if ($pedido['estado'] === 'Pendiente a confirmar') : ?>
                                    <a href="<?= BASE_URL ?>Administrador/eliminarPedido/?id=<?= $pedido['id']; ?>">Eliminar</a>
                                    <a href="<?= BASE_URL . 'Administrador/editarPedido/?id=' . $pedido['id'] ?>">Editar</a>
                                <?php else: ?>
                                    <p>No se pueden realizar operaciones</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <strong class="alert_red">No tienes pedidos</strong>
        <?php endif; ?>
    </section>

<?php else : ?>
    <h2>No tienes permiso para entrar en esta página</h2>
<?php endif; ?>