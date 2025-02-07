<style>
    /* Estilos para el carrito */
    .cart-container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: #333;
        color: white;
        border-radius: 8px;

    }

    .cart-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-table th,
    .cart-table td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #555;
    }

    .cart-product {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cart-product img {
        max-width: 100px;
        border-radius: 8px;
        margin-right: 10px;
    }

    .cart-actions {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .cart-actions a {
        margin: 5px;
        color: white;
        text-decoration: none;
        background-color: #007bff;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .cart-actions a:hover {
        background-color: #0056b3;
    }

    .cart-summary {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        padding: 20px;
        background-color: #222;
        border-radius: 8px;
    }

    .cart-summary p {
        margin: 0;
    }

    .checkout-button {
        text-align: center;
    }

    .checkout-button button {
        padding: 10px 20px;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .checkout-button button:hover {
        background-color: #218838;
    }

    .error-message {
        text-align: center;
        color: #ff0000;
        margin-bottom: 20px;
    }
</style>

</style>
</head>

<section class="cart-container">
    <div id="cart" class="cart">
        <h1 class="cart-header">Carrito</h1>
        <?php if (isset($mensajesError)) : ?>
            <?php foreach ($mensajesError as $mensaje) : ?>
                <p class="error-message"><?= $mensaje; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($_SESSION['carrito'])) : ?>
                    <tr>
                        <td colspan="6">No hay productos en el carrito</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <td>
                                <div class="cart-product">
                                    <img src="<?= BASE_URL ?>public/img/productos/<?= ($producto['imagen']) ?>" alt="<?= ($producto['nombre']) ?>">
                            </td>
                            <td>
                                <div class="cart-product">
                                    <div>
                                        <p><?= htmlspecialchars($producto['nombre']) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($producto['precio']) ?>€</p>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($producto['stock']) ?></p>
                            </td>
                            <td>
                                <div class="cart-actions">
                                    <a href="<?= BASE_URL ?>Carrito/sumarProductos/?id=<?= $producto['id'] ?>"> + </a>
                                    <span><?= htmlspecialchars($producto['cantidad']) ?></span>
                                    <a href="<?= BASE_URL ?>Carrito/restarProductos/?id=<?= $producto['id'] ?>"> - </a>
                                    <a href="<?= BASE_URL ?>Carrito/eliminarProducto/?id=<?= $producto['id'] ?>" class="remove-product">Eliminar producto</a>
                                </div>
                            </td>
                            <td>
                                <p><?= htmlspecialchars($producto['precio'] * $producto['cantidad']) ?>€</p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <div class="total-info">
                <?php if (empty($_SESSION['carrito'])) : ?>
                    <p>Total: <b>0€</b></p>
                    <p>Número de artículos: 0</p>
                <?php else : ?>
                    <!-- <?php var_dump($_SESSION['carrito']); ?> -->
                    <p>Total: <b><?= htmlspecialchars($cantidadProductos) ?>€</b></p>
                    <p>Número de artículos: <?= count($_SESSION['carrito']) ?></p>
                <?php endif; ?>
            </div>
            <div class="checkout-button">
                <a href="<?= BASE_URL ?>Pedido/verPedido">
                    <button>Realizar Pedido</button>
                </a>
            </div>
        </div>
    </div>
</section>