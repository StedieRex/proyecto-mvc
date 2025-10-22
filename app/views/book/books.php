<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros - Biblioteca</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>📚 Biblioteca Virtual</h1>
        
        <a href="<?php echo BASE_URL; ?>/book/add" class="btn btn-primary">➕ Agregar Nuevo Libro</a>
        
        <?php if (empty($books)): ?>
            <p class="no-books">No hay libros en la biblioteca.</p>
        <?php else: ?>
            <table class="books-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['id']); ?></td>
                        <td><?php echo htmlspecialchars($book['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($book['autor']); ?></td>
                        <td><?php echo htmlspecialchars($book['anio']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>