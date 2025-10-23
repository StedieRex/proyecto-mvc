<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro - Biblioteca</title>
    <link rel="stylesheet" href="/proyecto-mvc/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>📖 Agregar Nuevo Libro</h1>

        <!-- Mensajes de error -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                ❌ <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        
        <form action="/proyecto-mvc/book/store" method="POST" class="book-form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required maxlength="255" 
                       placeholder="Ingresa el título del libro">
            </div>
            
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required maxlength="255" 
                       placeholder="Ingresa el nombre del autor">
            </div>
            
            <div class="form-group">
                <label for="anio">Año de publicación:</label>
                <input type="number" id="anio" name="anio" min="1000" max="<?php echo date('Y'); ?>" required 
                       placeholder="Año de publicación">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="8" 
                          placeholder="Escribe una descripción detallada del libro..."></textarea>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success">💾 Guardar Libro</button>
                <a href="/proyecto-mvc/book" class="btn btn-secondary">← Volver a la lista</a>
            </div>
        </form>
    </div>
</body>
</html>