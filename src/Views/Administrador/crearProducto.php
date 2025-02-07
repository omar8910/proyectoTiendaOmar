<style>
    /* Estilos para crearProducto */
    .product-section-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
        width: 96%;
    }

    .product-section {
        background-color: rgb(51, 51, 51);
        color: #333;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 50%;
        border-radius: 5px;
    }

    .product-section-title {
        text-align: center;
        color: rgb(255, 255, 255);
        margin-bottom: 20px;
    }

    .product-form {
        display: grid;
        gap: 10px;
    }

    .product-label {
        color: rgb(255, 255, 255);
    }

    .product-input,
    .product-textarea,
    .product-select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
    }

    .product-input:focus,
    .product-textarea:focus,
    .product-select:focus {
        border-color: #007BFF;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    .product-submit {
        background-color: #007BFF;
        color: white;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        text-align: center;
        margin-left: 10px;
        width: 100%;
    }

    .product-submit:hover {
        background-color: #0056b3;
    }

    .product-success-message {
        color: #28a745;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .product-error-message {
        color: #dc3545;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .access-denied {
        color: white;
        font-size: 24px;
        text-align: center;
    }
</style>


<?php

use Utils\Utils;
?>
<div class="product-section-container">
    <section class="product-section">
        <?php if (isset($_SESSION['inicioSesion']) && $_SESSION['inicioSesion']->rol === 'administrador') : ?>
            <h1 class="product-section-title">Crear producto</h1>

            <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] === 'correcto') : ?>
                <p class="product-success-message">El producto ha sido creado correctamente</p>
                <?php Utils::eliminarSesion('producto'); ?>
            <?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] === 'incorrecto') : ?>
                <p class="product-error-message">No se ha podido crear el producto</p>
                <?php if (isset($mensajesError)) : ?>
                    <?php foreach ($mensajesError as $mensaje) : ?>
                        <p class="product-error-message"><?= $mensaje; ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php Utils::eliminarSesion('producto'); ?>
            <?php endif; ?>

            <form class="product-form" action="<?= BASE_URL; ?>Administrador/crearProducto" method="POST" enctype="multipart/form-data">
                <label for="nombre" class="product-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="product-input" required aria-label="Nombre del producto" />
                <br>

                <label for="descripcion" class="product-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="product-textarea" required aria-label="Descripción del producto"></textarea>
                <br>

                <label for="precio" class="product-label">Precio</label>
                <input type="number" step="0.01" min="0" name="precio" id="precio" class="product-input" required aria-label="Precio del producto" />
                <br>

                <label for="stock" class="product-label">Stock</label>
                <input type="number" name="stock" id="stock" class="product-input" required aria-label="Stock del producto" />
                <br>

                <label for="imagen" class="product-label">Selecciona una imagen:</label>
                <input type="file" name="imagen" id="imagen" class="product-input" required aria-label="Imagen del producto" />

                <label for="categoria" class="product-label">Categoría</label>
               <select name="categoria_id" id="categoria" class="product-select" required aria-label="Categoría del producto">
                    <option value="">Selecciona una categoría</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id']; ?>"><?= $categoria["nombre"]; ?></option>
                    <?php endforeach; ?>
                <br>


                <input type="submit" value="Crear" class="product-submit">

            </form>
        <?php else : ?>
            <h1 class="access-denied">No tienes permisos para acceder a esta página</h1>
        <?php endif; ?>
    </section>
</div>