<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book['titulo']); ?> - Biblioteca</title>
    <link rel="stylesheet" href="/proyecto-mvc/public/css/style.css">
</head>
<body>
    <div class="container">
        <div class="book-header">
            <h1>📖 <?php echo htmlspecialchars($book['titulo']); ?></h1>
            <div class="book-meta">
                <span class="author">✍️ <?php echo htmlspecialchars($book['autor']); ?></span>
                <span class="year">📅 <?php echo htmlspecialchars($book['anio']); ?></span>
            </div>
        </div>

        <div class="book-content">
            <div class="book-details">
                <h2>Descripción</h2>
                <div class="description">
                    <?php if (!empty($book['descripcion'])): ?>
                        <p><?php echo nl2br(htmlspecialchars($book['descripcion'])); ?></p>
                    <?php else: ?>
                        <p class="no-description">Este libro no tiene descripción.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="book-actions">
                <a href="/proyecto-mvc/book" class="btn btn-secondary">← Volver a la lista</a>
                <a href="/proyecto-mvc/book/delete/<?php echo $book['id']; ?>" 
                   class="btn btn-danger" 
                   onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">
                   🗑️ Eliminar Libro
                </a>
            </div>
        </div>
    </div>
</body>
</html>