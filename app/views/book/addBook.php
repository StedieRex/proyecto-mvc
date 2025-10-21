<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro - Biblioteca</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>📖 Agregar Nuevo Libro</h1>
        
        <form action="<?php echo BASE_URL; ?>/book/store" method="POST" class="book-form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required>
            </div>
            
            <div class="form-group">
                <label for="año">Año de publicación:</label>
                <input type="number" id="año" name="año" min="1000" max="2024" required>
            </div>
            
            <button type="submit" class="btn btn-success">💾 Guardar Libro</button>
            <a href="<?php echo BASE_URL; ?>/book" class="btn btn-secondary">← Volver a la lista</a>
        </form>
    </div>
</body>
</html>