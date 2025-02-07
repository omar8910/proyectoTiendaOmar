<style>
    /* Estilos editarProducto */
    #editar-producto-section {
        background-color: #222;
        color: #ddd;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    #editar-producto-section h1 {
        color: white;
        margin-bottom: 20px;
    }

    /* Estilos formulario */
    #editar-producto-form {
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    #editar-producto-form .form-label {
        color: white;
        margin-bottom: 5px;
    }

    #editar-producto-form .form-input {
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
        background-color: #444;
        color: white;
    }

    #editar-producto-form .btn {
        background-color: #555;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #editar-producto-form .btn:hover {
        background-color: #666;
    }

    .access-denied {
        color: white;
        font-size: 24px;
    }

    .return-link {
        display: inline-block;
        text-align: center;
        margin-top: 20px;
        background-color: #555;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .return-link:hover {
        background-color: #666;
    }
</style>

<!-- <?php var_dump($producto) ?>
<?php var_dump($categorias) ?> -->
<section id="editar-producto-section">
    <?php if (isset($_SESSION['inicioSesion']) && $_SESSION['inicioSesion']->rol === 'administrador') : ?>
        <h1 class="section-title">Editar Producto</h1>
        <form action="<?= BASE_URL ?>Administrador/editarProducto" method="POST" class="form" id="editar-producto-form">
            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" id="nombre-input" class="form-input">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" value="<?= $producto['descripcion'] ?>" id="descripcion-input" class="form-input">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name="precio" value="<?= $producto['precio'] ?>" id="precio-input" class="form-input">
            <!-- <label for="categoria_id" class="form-label">Categoria ID:</label>
            <input type="text" id="categoria_id" name="categoria_id" value="<?= $producto['categoria_id']  ?>" class="form-input"> -->
            <label for="nombre_categoria" class="form-label">Nombre Categoria:</label>
            <select name="nombre_categoria" id="nombre_categoria" class="form-input">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="text" id="imagen" name="imagen" value="<?= $producto['imagen'] ?>" class="form-input">
            <input type="submit" value="Actualizar" class="btn" id="guardar-btn">
            <a href="<?= BASE_URL ?>Administrador/gestionarProductos" class="return-link" id="cancelar-btn">Cancelar</a>
        </form>
    <?php else : ?>
        <h1 class="access-denied">No tienes permisos para acceder a esta página</h1>
    <?php endif; ?>
</section>