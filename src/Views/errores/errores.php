<style>
    .error-section {
        text-align: center;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .error-section h1 {
        color: coral;
        font-size: 2.5rem;
        margin-bottom: 45px;
    }

    .error-section a {
        color: white;
        text-decoration: none;
        font-size: 1.2rem;
        padding: 8px 16px;
        border: 2px solid white;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .error-section a:hover {
        background-color: coral;
        color: #fff;
    }
</style>

<section class="error-section">
    <h1><?= $mensajeError ?></h1>
    <a href="<?= BASE_URL ?>">Volver al inicio</a>
</section>